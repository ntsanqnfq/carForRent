<?php

namespace Sang\CarForRent\Validation;

use Sang\CarForRent\Transformer\UserTransformer;

class UserRequestValidation
{
    public function validate(UserTransformer $transformer): array
    {
        $requireValidate = $this->requiredValidate($transformer);
        if ($requireValidate) {
            return $requireValidate;
        }
        $lengthValidate = $this->lengthValidate($transformer);
        if ($lengthValidate) {
            return $lengthValidate;
        }
        return [];
    }

    protected function requiredValidate(UserTransformer $transformer): array
    {
        $error = array();
        if (empty($transformer->getUsername())) {
            $error = array_merge($error, array('username' => "Username is required!"));
        }
        if (empty($transformer->getPassword())) {
            $error = array_merge($error, array('password' => "Password is required!"));
        }
        return $error;
    }

    protected function lengthValidate(UserTransformer $transformer): array
    {
        $error = [];
        if (strlen($transformer->getUserName()) > 10) {
            $error = array_merge($error, array('username' => "User name must not exceed 10 characters!"));
        }
        if (strlen($transformer->getPassword()) > 10) {
            $error = array_merge($error, array('password' => "Password must not exceed 10 characters!"));
        }
        return $error;
    }

}
