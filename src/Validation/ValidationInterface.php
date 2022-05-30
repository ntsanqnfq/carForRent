<?php

namespace Sang\CarForRent\Validation;

use Sang\CarForRent\Transformer\TransformerInterface;

interface ValidationInterface
{
    public function validate(TransformerInterface $transformer): array;
}