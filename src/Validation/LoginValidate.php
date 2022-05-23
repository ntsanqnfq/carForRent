<?php

namespace Sang\CarForRent\Validation;

use Exception;

class LoginValidate
{
    /**
     * @param $userName
     * @return void
     * @throws Exception
     */
    public static function checkUserName($userName)
    {
        if (empty($userName)) {
            throw new Exception('Username is empty');
        }
    }

    /**
     * @param $password
     * @return void
     * @throws Exception
     */
    public static function checkPassword($password)
    {
        if (empty($password)) {
            throw new Exception('Password is empty');
        }
    }
}
