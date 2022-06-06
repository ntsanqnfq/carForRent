<?php

namespace Sang\tests\Service;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Service\SessionService;
use Sang\CarForRent\Transformer\UserTransformer;

class LoginServiceTest extends TestCase
{

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testCheckExist($param, $expected)
    {
        $userLoginRepository = new UserLoginRepository();
        $sessionService = new SessionService();
        $loginService = new LoginService($userLoginRepository, $sessionService);
        $userTransformer = new UserTransformer();
        $userTransformer->setUsername($param['username']);
        $userTransformer->setPassword($param['password']);
        $user = $loginService->checkExist($userTransformer);
        $result = $user->getCustomerName();

        $this->assertEquals($expected['customer_name'], $result);
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
