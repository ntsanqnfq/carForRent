<?php

namespace Sang\CarForRent\Validation;

use Sang\CarForRent\App\AbstractValidation;

class CarValidation extends AbstractValidation
{
    public string $name = '';
    public string $description = '';
    public string $color = '';
    public string $brand = '';
    public string $price = '';

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'color' => [self::RULE_REQUIRED],
            'brand' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
        ];
    }

}
