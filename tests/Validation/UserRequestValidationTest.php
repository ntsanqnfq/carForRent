<?php

namespace Sang\tests\Validation;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Validation\UserRequestValidation;

class UserRequestValidationTest extends TestCase
{
    /**
     * @dataProvider userRequestDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testCheckUserNamePassword($param, $expected){


        $userRequest = new UserRequestValidation();
        $result = $userRequest->checkUserNamePassword($param);
        $this->assertEquals($expected,$result);
    }

    public function userRequestDataProvider(){
        return [
            'happy_case'=>[
                'param'=>[
                    'username'=>'ntsang',
                    'password'=>'123'
                ],
                'expected'=>[
                    'username'=>'ntsang',
                    'password'=>'123'
                ]
            ]
        ];
    }
}