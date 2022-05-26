<?php

namespace Sang\CarForRent\Service;

use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;

class LoginService
{
    private UserLoginRepository $userLoginRepository;

    public function __construct(UserLoginRepository $userLoginRepository)
    {
        $this->userLoginRepository = $userLoginRepository;
    }

    /**
     * @param $userRequest
     * @return UserModel|bool
     */
    public function login($userRequest): UserModel|bool
    {
        $userData = $this->userLoginRepository->searchByUserName($userRequest->getUserName());
        if ($userData and password_verify($userRequest->getPassword(), $userData->getPassword())) {
            return $userData;
        }
        return false;
    }


}
