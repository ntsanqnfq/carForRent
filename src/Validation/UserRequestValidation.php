<?php

namespace Sang\CarForRent\Validation;

use Sang\CarForRent\Transformer\UserTransformer;

class UserRequestValidation
{
    public function checkUserNamePassword(UserTransformer $transformer): array
    {

        if ($transformer->getUserName() == '' || $transformer->getPassword() == '') {
            return [
                'login_error' => 'username or password is null'
            ];
        } else
            return [];
    }
}
