<?php

namespace Sang\CarForRent\Validation;

class ImageValidation
{

    public function validate($img, $size):array
    {
        $checkImage = $this->validateImage($img, $size);
        if(!empty($checkCar)){
            return $checkCar;
        }
        if(!empty($checkImage)){
            return $checkImage;
        }
        return [];
    }

    public function validateImage($image, $size): array
    {
        $checkType = getimagesize($image["tmp_name"]);
        if(!$checkType){
            return ['imgerrors' => 'please upload an image'];
        }
        if($image['size'] > $size){
            return ['imgerrors' => 'image size is too large'];
        }
        return [];
    }

}