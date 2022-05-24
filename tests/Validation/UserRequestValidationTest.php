<?php

namespace Sang\tests\Validation;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Validation\UserRequestValidation;

/**
 * @dataProvider
 */
class UserRequestValidationTest extends TestCase
{
    public function testCheckUserNamePassword($param, $expected){


        $userRequest = new UserRequestValidation();
        $userRequest->checkUserNamePassword($param);
        $this->assertEquals($expected,$userRequest);
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