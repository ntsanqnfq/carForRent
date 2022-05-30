<?php

namespace Sang\CarForRent\Transformer;

interface TransformerInterface
{
    public function formArray(array $params): TransformerInterface;
}
