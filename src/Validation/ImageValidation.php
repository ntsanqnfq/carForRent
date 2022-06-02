<?php

namespace Sang\CarForRent\Validation;

class ImageValidation
{

    public function validate($img, $size, $param):array
    {
        $checkImage = $this->validateImage($img, $size);
        $checkCar = $this->validateCar($param);
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

    public function validateCar($param): array
    {
        if(empty($param['brand']) || empty($param['price'])){
            return ['imgerrors' => 'brand and price can not be empty'];
        }
        return [];
    }

}