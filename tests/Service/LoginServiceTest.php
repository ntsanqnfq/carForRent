<?php

namespace Sang\tests\Service;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Request\UserRequest;
use Sang\CarForRent\Service\LoginService;

class LoginServiceTest extends TestCase
{

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testLogin($param, $expected): void
    {
        $userLoginRepository = new UserLoginRepository();
        $loginService = new LoginService($userLoginRepository);

        $userRequest = new UserRequest();
        $userRequest->setUserName($param['username']);
        $userRequest->setPassword($param['password']);
        $user = $loginService->login($userRequest);
        $this->assertNotNull($user);
    }

    public function userDataProvider()
    {
        return [
            'happy_case' => [
                'param' => [
                    'username' => 'ntsanq',
                    'password' => '123',
                    'customer_name' => 'Thanh Sang'
                ],
                'expected' => [
                    'username' => 'ntsanq',
                    'password' => '123',
                    'customer_name' => 'Thanh Sang'
                ]
            ]
        ];
    }
}
