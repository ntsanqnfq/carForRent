<?php

namespace Sang\tests\Validation;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Request\UserRequest;
use Sang\CarForRent\Validation\UserRequestValidation;

class UserRequestValidationTest extends TestCase
{
    /**
     * @dataProvider userRequestDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testCheckUserNamePassword($param, $expected)
    {

        $userRequest = new UserRequest();
        $userRequest->setUserName($param['username']);
        $userRequest->setPassword($param['password']);
        $userRequestValidation = new UserRequestValidation();
        $result = $userRequestValidation->checkUserNamePassword($userRequest);
        $this->assertEquals($expected, $result);
    }

    public function userRequestDataProvider()
    {
        return [
            'happy_case' => [
                'param' => [
                    'username' => 'ntsang',
                    'password' => '123'
                ],
                'expected' => []
            ],
            'sad_case' => [
                'param' => [
                    'username' => '',
                    'password' => '123'
                ],
                'expected' => [
                    'login_error' => 'username or password is null'
                ]
            ]
        ];
    }
}