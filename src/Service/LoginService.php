<?php

namespace Sang\CarForRent\Service;

use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Request\UserRequest;
use Sang\CarForRent\Validation\LoginValidate;

class LoginService
{
    private UserLoginRepository $userLoginRepository;
    private UserRequest $userRequest;
    private UserModel $userModel;

    public function __construct(UserLoginRepository $userLoginRepository, UserRequest $userRequest, UserModel $userModel)
    {
        $this->userLoginRepository = $userLoginRepository;
        $this->userRequest = $userRequest;
        $this->userModel= $userModel;
    }

    public function login()
    {
        LoginValidate::checkPassword($this->userRequest->getPassword());
        LoginValidate::checkUserName($this->userRequest->getUserName());



        $userData = $this->userLoginRepository->searchByUserName($this->userRequest->getUserName());
        $this->userModel->setId($userData['id_customer']);
        $this->userModel->setUserName($userData['username']);
        $this->userModel->setCustomerName($userData['customer_name']);
        var_dump($userData);
    }

    public function getUser(){
        return $this->userModel;
    }
}