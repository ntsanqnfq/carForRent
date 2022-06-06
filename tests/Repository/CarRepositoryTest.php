<?php

namespace Sang\tests\Repository;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Repository\CarRepository;
use Sang\CarForRent\Transformer\CarTransformer;

class CarRepositoryTest extends TestCase
{
    /**
     * @dataProvider carDataProvider
     * @param $param
     * @return void
     */
    public function testInsertCar($param): bool
    {
        $carRepository = new CarRepository();
        $tranformer = new CarTransformer();
        $tranformer->setName($param['name']);
        $tranformer->setDescription($param['description']);
        $tranformer->setImg($param['img']);
        $tranformer->setColor($param['color']);
        $tranformer->setBrand($param['brand']);
        $tranformer->setPrice($param['price']);

        $payload = [
            $tranformer->getName(),
            $tranformer->getImg(),
            $tranformer->getDescription(),
            $tranformer->getColor(),
            $tranformer->getBrand(),
            $tranformer->getPrice()
        ];

        $car = $carRepository->insertCar($payload);
        $this->assertTrue($car);
    }

//    /**
//     * @dataProvider listCarProvider
//     * @return void
//     */
//    public function testListCar(){
//        $carRepository = new CarRepository();
//        $carRepository->listCar();
//
//    }

    public function carDataProvider()
    {
        return [
            'car-repo-case' => [
                'param' => [
                    'name' => 'Mexxx',
                    'color' => 'red',
                    'brand' => 'MB',
                    'description' => 'this is good car',
                    'img' => 'https://sdufsdfuuh.sdf.sf',
                    'price' => 21
                ],

                'expected' => [
                    'name' => 'Mexxx',
                    'color' => 'red',
                    'brand' => 'MB',
                    'description' => 'this is good car',
                    'img' => 'https://sdufsdfuuh.sdf.sf',
                    'price' => 21
                ]
            ]
        ];
    }

}