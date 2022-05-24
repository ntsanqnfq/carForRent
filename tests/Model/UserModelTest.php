<?php

namespace Sang\tests\Model;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Model\UserModel;

class UserModelTest extends TestCase
{
    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetId($param, $expected)
    {
        $user = new UserModel();
        $user->setId($param['id']);
        $result = $user->getId();
        $this->assertEquals($expected['id'], $result);
    }

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSetId($param, $expected)
    {
        $user = new UserModel();
        $user->setId($param['id']);
        $result = $user->getId();
        $this->assertEquals($expected['id'], $result);
    }

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetUserName($param, $expected)
    {
        $user = new UserModel();
        $user->setUserName($param['username']);
        $result = $user->getUserName();
        $this->assertEquals($expected['username'], $result);
    }

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSetUserName($param, $expected)
    {
        $user = new UserModel();
        $user->setUserName($param['username']);
        $result = $user->getUserName();
        $this->assertEquals($expected['username'], $result);
    }

    /**
     * @dataProvider userDataProvider
     * @return mixed
     */
    public function testGetPassword($param, $expected)
    {
        $user = new UserModel();
        $user->setPassword($param['password']);
        $result = $user->getPassword();
        $this->assertEquals($expected['password'], $result);
    }

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSetPassword($param, $expected)
    {
        $user = new UserModel();
        $user->setPassword($param['password']);
        $result = $user->getPassword();
        $this->assertEquals($expected['password'], $result);
    }

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetCustomerName($param, $expected)
    {
        $user = new UserModel();
        $user->setCustomerName($param['customer']);
        $result = $user->getCustomerName();
        $this->assertEquals($expected['customer'], $result);
    }

    /**
     * @dataProvider userDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSetCustomerName($param, $expected)
    {
        $user = new UserModel();
        $user->setCustomerName($param['customer']);
        $result = $user->getCustomerName();
        $this->assertEquals($expected['customer'], $result);
    }

    public function userDataProvider()
    {
        return [
            'happy-case1' => [
                'param' => [
                    'id' => '1',
                    'username' => 'ntsanqqq',
                    'password' => '123',
                    'customer' => 'Thanh Sang'
                ],

                'expected' => [
                    'id' => '1',
                    'username' => 'ntsanqqq',
                    'password' => '123',
                    'customer' => 'Thanh Sang'
                ]
            ]
        ];
    }
}