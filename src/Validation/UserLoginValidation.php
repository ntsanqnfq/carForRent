<?php

namespace Sang\CarForRent\Validation;

class UserLoginValidation
{
    public function validate($userData, $userRequest)
    {
        $usernameValidate = $this->validateUserName($userData->getUserName());
        $passwordValidate = $this->validatePassword($userData->getPassword(), $userRequest->getPassword());
        if (!$usernameValidate || !$passwordValidate) {
            return [
                'login_error' => 'username or password is incorrect'
            ];
        }

    }

    /**
     * @param $dataUserName
     * @return bool
     */
    public function validateUserName($dataUserName): bool
    {
        if (empty($dataUserName)) {
            return false;
        }
        return true;
    }

    /**
     * @param $dataPassword
     * @param $passwordRequest
     * @return bool
     */
    private function validatePassword($dataPassword, $passwordRequest): bool
    {
        $passwordHash = password_hash($passwordRequest, PASSWORD_DEFAULT);
        if (!password_verify($passwordRequest, $dataPassword))
            return false;
        else
            return true;
    }
}
