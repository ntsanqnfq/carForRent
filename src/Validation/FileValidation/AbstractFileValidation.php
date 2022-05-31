<?php

namespace Sang\CarForRent\Validation;

abstract class AbstractFileValidation
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function checkFileExist(string $targetPath)
    {
        if (file_exists($targetPath)) {
            return "Sorry, file already exists!";
        }
        return "";
    }

    public function checkFileSize(int $expectSize)
    {
        if ($this->file['size'] > $expectSize) {
            return "Sorry, your file is too large!";
        }
        return "";
    }

    abstract public function checkFileFormat(string $targetPath);
}