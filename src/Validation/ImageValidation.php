<?php

namespace Sang\CarForRent\Validation;

class ImageValidation
{
    public function validate($img, $size): array
    {
        return $this->validateImage($img, $size);
    }

    public function validateImage($image, $size): array
    {
        if ($image['size'] > $size) {
            return ['img' => 'Image size is too large'];
        }
        if ($image['size'] === 0) {
            return ['img' => 'Theres no image here'];
        }
        return [];
    }

}