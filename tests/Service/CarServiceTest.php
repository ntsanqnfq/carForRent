<?php

namespace Sang\tests\Service;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Repository\CarRepository;
use Sang\CarForRent\Service\CarService;
use Sang\CarForRent\Transformer\CarTransformer;

class CarServiceTest extends TestCase
{
    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testCreateCar($param, $expected): void
    {
        $carRepository = new CarRepository();
        $carService = new CarService($carRepository);
        $carTransformer = new CarTransformer();
        $carTransformer->setName($param['name']);
        $carTransformer->setDescription($param['description']);
        $carTransformer->setImg($param['img']);
        $carTransformer->setColor($param['color']);
        $carTransformer->setBrand($param['brand']);
        $carTransformer->setPrice($param['price']);

        $car = $carService->createCar($carTransformer);
        $result = $car->getPrice();
        $this->assertEquals($expected['price'], $result);
    }



    /**
     * @return void
     */
    public function testCountCar()
    {
        $carRepository = $this->getMockBuilder(CarRepository::class)->disableOriginalConstructor()->getMock();
        $carRepository->expects($this->once())->method('listCar')->willReturn(['1','2','3']);
        $carService = new CarService($carRepository);
        $result = $carService->countCar();
        $this->assertEquals(3, $result);
    }


    public function carDataProvider()
    {
        return [
            'car-service-case' => [
                'param' => [
                    'name' => 'Mex-xx',
                    'color' => 'red',
                    'brand' => 'MB',
                    'description' => 'this is good car',
                    'img' => 'https://sdufsdfuuh.sdf.sf',
                    'price' => 210
                ],
                'expected' => [
                    'name' => 'Mex-xx',
                    'color' => 'red',
                    'brand' => 'MB',
                    'description' => 'this is good car',
                    'img' => 'https://sdufsdfuuh.sdf.sf',
                    'price' => 210
                ]

            ]
        ];
    }
}