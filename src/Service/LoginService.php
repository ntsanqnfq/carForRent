<?php

namespace Sang\CarForRent\Service;

use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Request\UserRequest;

class LoginService
{
    private UserLoginRepository $userLoginRepository;

    public function __construct(UserLoginRepository $userLoginRepository)
    {
        $this->userLoginRepository = $userLoginRepository;
    }

    /**
     * @param UserRequest $userRequest
     * @return UserModel|bool
     */
    public function login(UserRequest $userRequest): UserModel|bool
    {
        $userData = $this->userLoginRepository->searchByUserName($userRequest->getUserName());
        if ($userData && $this->verifyPassword($userRequest, $userData)) {
            return $userData;
        }
        return false;
    }


    public function verifyPassword(UserRequest $userRequest, UserModel $userData): bool
    {
        if (password_verify($userRequest->getPassword(), $userData->getPassword())) {
            return true;
        } else {
            return false;
        }
    }
}
