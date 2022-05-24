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
     * @return UserModel
     */
    public function login($userRequest): UserModel
    {
        $userData = $this->userLoginRepository->searchByUserName($userRequest->getUserName());

        $this->userLoginValidation->validate($userData, $userRequest);

        $this->userModel->setId($userData->getId());
        $this->userModel->setUserName($userData->getUserName());
        $this->userModel->setCustomerName($userData->getCustomerName());
        return $this->userModel;
    }

    /**
     * @return UserModel
     */
    public function getUser(): UserModel
    {
        return $this->userModel;
    }
}
