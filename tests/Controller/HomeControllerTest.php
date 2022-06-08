<?php

namespace Sang\tests\Controller;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Controller\HomeController;
use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\CarService;

class HomeControllerTest extends TestCase
{

    /**
     * @param $param
     * @return void
     */
    public function testHome($param): void
    {
        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $response = new Response();
        $carServiceMock = $this->getMockBuilder(CarService::class)->disableOriginalConstructor()->getMock();
        $arrayCar = [];

        $home = new HomeController($requestMock, $response, $carServiceMock);
        $carServiceMock->expects($this->once())->method('listCar')->willReturn($param);
        $result = $home->index();
        $this->assertTrue($result);
    }


    public function carListProvider()
    {
        return [
            'carlist'=>[
                'param'=>[
                    'name'=>'Vios',
                    'description'=>'dont buy this car',
                    'img'=>'http://dsfdsufdsfdso.com',
                    'color'=>'red',
                    'brand'=>'vi',
                    'price'=>121
                ],
                'expected'=>[
                    'name'=>'Vios',
                    'description'=>'dont buy this car',
                    'img'=>'http://dsfdsufdsfdso.com',
                    'color'=>'red',
                    'brand'=>'vi',
                    'price'=>121
                ]
            ]
        ];
    }
}
