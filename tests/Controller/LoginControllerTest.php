<?php

namespace Sang\tests\Controller;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Controller\LoginController;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Request\UserRequest;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginControllerTest extends TestCase
{
    /**
     * @dataProvider logloginDataProviderTrue
     * @runInSeparateProcess
     * @param $param
     * @return void
     */
    public function testHandleLoginTrue($param): void
    {
        $_POST['userName'] = $param['username'];
        $_POST['password'] = $param['password'];

        $userRequest = new UserRequest();

        $userLoginRepository = new UserLoginRepository();
        $loginService = new LoginService($userLoginRepository);
        $userRequestValidation = new UserRequestValidation();
        $loginController = new LoginController($loginService, $userRequest, $userRequestValidation);
        $result = $loginController->handleLogin();
        $this->assertTrue($result);

    }

    /**
     * @dataProvider loginDataProviderFalse
     * @runInSeparateProcess
     * @return void
     */
    public function testHandleLoginFalse($param)
    {

        $_POST['userName'] = $param['username'];
        $_POST['password'] = $param['password'];
        $userRequest = new UserRequest();

        $userLoginRepository = new UserLoginRepository();
        $loginService = new LoginService($userLoginRepository);
        $userRequestValidation = new UserRequestValidation();
        $loginController = new LoginController($loginService, $userRequest, $userRequestValidation);
        $result = $loginController->handleLogin();
        $this->assertFalse($result);

    }

    /**
     * @dataProvider loginDataProviderNull
     * @runInSeparateProcess
     * @return void
     */
    public function testHandleLoginNull($param)
    {

        $_POST['userName'] = $param['username'];
        $_POST['password'] = $param['password'];
        $userRequest = new UserRequest();

        $userLoginRepository = new UserLoginRepository();
        $loginService = new LoginService($userLoginRepository);
        $userRequestValidation = new UserRequestValidation();
        $loginController = new LoginController($loginService, $userRequest, $userRequestValidation);
        $result = $loginController->handleLogin();
        $this->assertFalse($result);

    }

    /**
     * @runInSeparateProcess
     * @return void
     */
    public function testLogin()
    {
        $userRequest = new UserRequest();

        $userLoginRepository = new UserLoginRepository();
        $loginService = new LoginService($userLoginRepository);
        $userRequestValidation = new UserRequestValidation();
        $loginController = new LoginController($loginService, $userRequest, $userRequestValidation);
        $result = $loginController->login();

        $this->assertTrue($result);
    }

    /**
     * @runInSeparateProcess
     * @return void
     */
    public function testLogout()
    {
        $userRequest = new UserRequest();

        $userLoginRepository = new UserLoginRepository();
        $loginService = new LoginService($userLoginRepository);
        $userRequestValidation = new UserRequestValidation();
        $loginController = new LoginController($loginService, $userRequest, $userRequestValidation);

        $result = $loginController->logout();
        $this->assertTrue($result);
    }


    public function logloginDataProviderTrue()
    {
        return [
            'happy_case' => [
                'param' => [
                    'username' => 'ntsanq',
                    'password' => '123'
                ]
            ]
        ];
    }


    public function loginDataProviderFalse()
    {
        return [
            'wrong_case' => [
                'param' => [
                    'username' => 'ntsanq',
                    'password' => '2313'
                ]
            ]
        ];
    }

    public function loginDataProviderNull()
    {
        return [
            'null_case' => [
                'param' => [
                    'username' => 'ntsanq',
                    'password' => ''
                ]
            ]
        ];
    }
}
