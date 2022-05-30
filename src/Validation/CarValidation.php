<?php

namespace Sang\CarForRent\Validation;

use Sang\CarForRent\Transformer\TransformerInterface;

class CarValidation implements ValidationInterface
{
    public function validate(TransformerInterface $transformer): array
    {
        $validateData = [
            'name' => $transformer->ge(),
            'price' => $transformer->getPrice(),
        ];
        $validateRules = [
            'name' => ["max:50"],
            'description' => ["required"],
            'price' => ["required"],
        ];
        return $this->handleValidate($validateData, $validateRules);
    }
}