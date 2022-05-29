<?php

namespace Sang\CarForRent\Transformer;

use Sang\CarForRent\Model\ModelInterface;

class CarTransformer implements TransformerInterface
{

    public function transform(ModelInterface $model): array
    {
       return [
       ];
    }
}