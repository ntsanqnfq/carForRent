<?php

namespace Sang\CarForRent\Validation;

class ImageValidation
{
    /**
     * @param $file
     * @return array
     */
    public function check($file): array
    {
        $errorMethod = $this->checkImgMethod();
        $errorEmpty = $this->checkImgEmpty($file);
        $errorFormat = $this->checkImgFormat($file);
        $errorSize = $this->checkSize($file);
        return array_merge($errorMethod, $errorEmpty, $errorFormat, $errorSize);
    }

    /**
     * @return array
     */
    private function checkImgMethod(): array
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            return ['Invalid request method'];
        }
        return [];
    }

    /**
     * @return array
     */
    private function checkImgEmpty($file): array
    {
        if (!isset($file) || $file["error"] != 0) {
            return ['img-error' => 'File upload does not exist'];
        }
        return [];
    }

    /**
     * @param $file
     * @return array
     */
    private function checkImgFormat($file): array
    {
        $allowed = [
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "gif" => "image/gif",
            "png" => "image/png"
        ];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            return ['img-error' => 'Please select a valid file format'];
        }
        return [];
    }

    /**
     * @param $file
     * @return array
     */
    private function checkSize($file): array
    {
        $maxsize = 1024*1024;
        if ($file['size'] > $maxsize) {
            return ['img-error' => 'File size is larger than the allowed limit'];
        }
        return [];
    }
}
