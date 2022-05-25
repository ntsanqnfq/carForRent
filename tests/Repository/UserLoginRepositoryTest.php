<?php

namespace Sang\tests\Repository;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\App\Application;
use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;

class UserLoginRepositoryTest extends TestCase
{
    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSearchByUserName($param, $expected)
    {
        $userModel = new UserModel();
        $userLoginRepository = new UserLoginRepository($userModel);
        $user = $userLoginRepository->searchByUserName($param['username']);
        $result = $user->getCustomerName();
        $this->assertEquals($expected['customer_name'],$result);
    }

    public function userDataProvider()
    {
        return [
            'happy-case' => [
                'param' => [
                    'username' => 'ntsanq'
                ],
                'expected' => [
                    'username' => 'ntsanq',
                    'customer_name' => 'Thanh Sang'
                ]
            ]
        ];
    }
}
