<?php

namespace Sang\CarForRent\Validation;

use Sang\CarForRent\Request\UserRequest;

class UserRequestValidation
{
    public function checkUserNamePassword( UserRequest $userRequest): array
    {

        if ($userRequest->getUserName()=='' || $userRequest->getPassword()=='') {
            return [
                'login_error' => 'username or password is null'
            ];
        } else
            return [];
    }
}
