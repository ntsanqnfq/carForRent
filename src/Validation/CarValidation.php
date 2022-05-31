<?php

namespace Sang\CarForRent\Validation;

use Sang\CarForRent\App\AbstractValidation;
use Sang\CarForRent\Transformer\TransformerInterface;

class CarValidation extends AbstractValidation
{
    public string $name = '';
    public string $color = '';
    public string $brand = '';
    public int $price = 0;
    public string $img = '';

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'color' => [self::RULE_REQUIRED],
            'brand' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'img' => [self::RULE_REQUIRED],
        ];
    }
}