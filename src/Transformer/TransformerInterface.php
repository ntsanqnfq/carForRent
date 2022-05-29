<?php

namespace Sang\CarForRent\Transformer;

use Sang\CarForRent\Model\ModelInterface;

interface TransformerInterface
{
    public function transform(ModelInterface $model): array;
}
