<?php

namespace Sang\CarForRent\Validation;

class ImageValidation
{
    public function validate($img, $size): array
    {
        if ($img['size'] > $size) {
            return ['img' => 'Image size is too large'];
        }
        if ($img['size'] === 0) {
            return ['img' => 'Theres no image here'];
        }
        return [];
    }
}