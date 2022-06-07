<?php

namespace Sang\CarForRent\Service;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Dotenv\Dotenv;

class UploadFileService
{
    private static Dotenv $loadEnv;

    private string $bucketName;
    private string $bucketRegion;
    private string $accessKey;
    private string $secretKey;

    public function __construct()
    {
        $this->bucketName = $_ENV['S3_BUCKET_NAME'];
        $this->bucketRegion = $_ENV['S3_BUCKET_REGION'];
        $this->accessKey = $_ENV['S3_ACCESS_KEY_ID'];
        $this->secretKey = $_ENV['S3_SECRET_ACCESS_KEY'];
    }

    public function upLoadFile($file)
    {
        self::$loadEnv = Dotenv::createImmutable('../src');
        self::$loadEnv->load();

        $s3Client = $this->s3init();


        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            return ['img-error' => 'Invalid request method'];
        }
        if (!isset($file) || $file["error"] != 0) {
            return ['img-error' => 'File upload does not exist'];
        }
        $allowed = [
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "gif" => "image/gif",
            "png" => "image/png"
        ];
        $path = "../public/img/";
        $filename = md5(date('Y-m-d H:i:s:u')) . $file["name"];
        $filetype = $file["type"];
        $filesize = $file["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            return ['img-error' => 'Please select a valid file format'];
        }
        $maxsize = 10 * 1024 * 1024;

        if ($filesize > $maxsize) {
            return ['img-error' => 'File size is larger than the allowed limit'];
        }
        if (!in_array($filetype, $allowed)) {
            return ['img-error' => 'Please select a valid file format'];
        }
        if (move_uploaded_file($file["tmp_name"], $path . $filename)) {
            $file_Path = $path . $filename;
            $key = basename($file_Path);
            try {
                $result = $s3Client->putObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $key,
                    'SourceFile' => $file_Path,
                ]);
                unlink($path . $filename);
                return $result->get('ObjectURL');
            } catch (S3Exception $e) {
                return ['img-error' => 'Error when upload image to S3!!!'];
            }
        } else {
            return ['img-error' => 'There was an error!!'];
        }
    }

    private function s3init()
    {
        return new S3Client([
            'version' => 'latest',
            'region' => $this->bucketRegion,
            'credentials' => ['key' => $this->accessKey, 'secret' => $this->secretKey]
        ]);
    }

    private function check(){
        $errorMethod = $this->checkMethod();

    }

    private function checkMethod(){
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            return ['Invalid request method'];
        }
    }

}