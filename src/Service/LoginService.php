<?php

namespace Sang\CarForRent\Service;

use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Validation\UserLoginValidation;

class LoginService
{
    private UserLoginRepository $userLoginRepository;
    private UserModel $userModel;
    private UserLoginValidation $userLoginValidation;

    /**
     * @param UserLoginRepository $userLoginRepository
     * @param UserModel $userModel
     * @param UserLoginValidation $userLoginValidation
     */
    public function __construct(UserLoginRepository $userLoginRepository, UserModel $userModel, UserLoginValidation $userLoginValidation)
    {
        $this->userLoginRepository = $userLoginRepository;
        $this->userModel = $userModel;
        $this->userLoginValidation = $userLoginValidation;
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
