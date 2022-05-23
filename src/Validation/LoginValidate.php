<?php

namespace Sang\CarForRent\Validation;

use Exception;

class LoginValidate
{
    public static function checkUserName($userName)
    {
        if (empty($userName)){
            throw new Exception('Username is empty');
        }
    }

    public static function checkPassword($password)
    {
        if (empty($password)){
            throw new Exception('Password is empty');
        }
    }
}
