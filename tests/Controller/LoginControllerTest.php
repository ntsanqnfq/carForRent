<?php

namespace Sang\tests\Controller;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\App\View;
use Sang\CarForRent\Controller\LoginController;
use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Request\UserRequest;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Validation\UserLoginValidation;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function testHandleLogin($param, $expected)
    {
        $userRequest = new UserRequest();
        $userRequest->setUserName($param['username']);
        $userRequest->setPassword($param['password']);
        $userModel = new UserModel();

        $userLoginRepository = new UserLoginRepository($userModel);
        $userLoginValidation = new UserLoginValidation();
        $loginService = new LoginService($userLoginRepository, $userModel, $userLoginValidation);
        $userRequestValidation = new UserRequestValidation();
        $loginController = new LoginController($loginService, $userRequest, $userRequestValidation);
        $result = $loginController->login();
        $this->assertNull($result);
    }

    /**
     * @return void
     */
    public function testLogin()
    {
        View::render('login');
    }

    public function loginDataProvider()
    {
        return [
            'param' => [
                'username' => 'ntsaq',
                'password' => '123'
            ],
            'expected' => [
                'username' => 'ntsaq',
                'password' => '123'
            ]

        ];
    }

}