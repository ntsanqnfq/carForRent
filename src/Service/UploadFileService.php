<?php

namespace Sang\CarForRent\Service;

use Aws\Result;
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
        self::$loadEnv = Dotenv::createImmutable( '../src');
        self::$loadEnv->load();
        $this->bucketName = $_ENV['S3_BUCKET_NAME'];
        $this->bucketRegion = $_ENV['S3_BUCKET_REGION'];
        $this->accessKey = $_ENV['S3_ACCESS_KEY_ID'];
        $this->secretKey = $_ENV['S3_SECRET_ACCESS_KEY'];
    }

    /**
     * @param $file
     * @return Result
     */
    public function setS3Client($file): Result
    {
        $key = basename($this->getFilePath($file['name']));
        $result = new S3Client([
            'version' => 'latest',
            'region' => $this->bucketRegion,
            'credentials' => ['key' => $this->accessKey, 'secret' => $this->secretKey]
        ]);
        $result = $result->putObject([
            'Bucket' => $this->bucketName,
            'Key' => $key,
            'SourceFile' => $this->getFilePath($file['name']),
        ]);
        unlink($this->getFilePath($file['name']));
        return $result;
    }

    public function getFilePath($fileName): string
    {
        $path = "../public/img/";
        $filename = md5(date('Y-m-d H:i:s:u')) . $fileName;
        return $path . $filename;
    }

    public function handleUpload($file)
    {
        if (!move_uploaded_file($file["tmp_name"], $this->getFilePath($file['name']))) {
            return null;
        }
        try {
            $result = $this->setS3Client($file);
            return $result->get('ObjectURL');
        } catch (S3Exception $e) {
            return null;
        }
    }
}
