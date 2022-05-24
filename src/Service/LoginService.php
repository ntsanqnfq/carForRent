<?php

namespace Sang\CarForRent\Service;

use http\Client\Curl\User;
use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Validation\UserLoginValidation;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginService
{
    private UserLoginRepository $userLoginRepository;
    private UserModel $userModel;
    private UserLoginValidation $userLoginValidation;

    public function __construct(UserLoginRepository $userLoginRepository, UserModel $userModel, UserLoginValidation $userLoginValidation)
    {
        $this->userLoginRepository = $userLoginRepository;
        $this->userModel = $userModel;
        $this->userLoginValidation = $userLoginValidation;
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function login($userRequest): UserModel
    {
        $userData = $this->userLoginRepository->searchByUserName($userRequest->getUserName());

        $this->userLoginValidation->validate($userData,$userRequest);

        $this->userModel->setId($userData['id_customer']);
        $this->userModel->setUserName($userData['username']);
        $this->userModel->setCustomerName($userData['customer_name']);
        return  $this->userModel;
    }

    /**
     * @return UserModel
     */
    public function getUser()
    {
        return $this->userModel;
    }
}
