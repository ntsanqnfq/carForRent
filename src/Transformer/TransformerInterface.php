<?php

namespace Sang\CarForRent\Transformer;

interface TransformerInterface
{
    public function toObject(array $params): TransformerInterface;
}
