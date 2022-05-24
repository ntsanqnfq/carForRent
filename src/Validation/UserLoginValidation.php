<?php

namespace Sang\CarForRent\Validation;

class UserLoginValidation
{
    public function validate($userData, $userRequest){
        $usernameValidate = $this->validateUserName($userData['username']);
        $passwordValidate = $this->validatePassword($userData['password'], $userRequest->getPassword());
        if(!$usernameValidate || $passwordValidate){
            return [
                'login_error' => 'username or password is incorrect'
            ];
        }

    }


    public function validateUserName($dataUserName): bool
    {
        if (empty($dataUserName)){
            return false;
        }
        return true;
    }

    private function validatePassword($dataPassword, $passwordRequest): bool
    {
        $passwordHash = password_hash($passwordRequest, PASSWORD_DEFAULT);
        if(!password_verify($passwordRequest,$dataPassword))
            return false;
        else
            return true;
    }
}