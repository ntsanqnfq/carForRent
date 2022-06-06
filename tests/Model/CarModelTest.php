<?php

namespace Sang\tests\Model;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Model\CarModel;

class CarModelTest extends TestCase
{
    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetId($param, $expected)
    {
        $carModel = new CarModel();
        $carModel->setId($param['id']);
        $result = $carModel->getId();
        $this->assertEquals($expected['id'], $result);
    }

    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetName($param, $expected)
    {
        $carModel = new CarModel();
        $carModel->setName($param['name']);
        $result = $carModel->getName();
        $this->assertEquals($expected['name'], $result);
    }


    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetBrand($param, $expected)
    {
        $carModel = new CarModel();
        $carModel->setBrand($param['brand']);
        $result = $carModel->getBrand();
        $this->assertEquals($expected['brand'], $result);
    }


    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetColor($param, $expected)
    {
        $carModel = new CarModel();
        $carModel->setColor($param['color']);
        $result = $carModel->getColor();
        $this->assertEquals($expected['color'], $result);
    }


    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetDescription($param, $expected)
    {
        $carModel = new CarModel();
        $carModel->setDescription($param['description']);
        $result = $carModel->getDescription();
        $this->assertEquals($expected['description'], $result);
    }


    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetPrice($param, $expected)
    {
        $carModel = new CarModel();
        $carModel->setPrice($param['price']);
        $result = $carModel->getPrice();
        $this->assertEquals($expected['price'], $result);
    }

    /**
     * @dataProvider carDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetImg($param, $expected)
    {
        $carModel = new CarModel();
        $carModel->setImg($param['img']);
        $result = $carModel->getImg();
        $this->assertEquals($expected['img'], $result);
    }

    public function carDataProvider()
    {
        return [
            'happy-case1' => [
                'param' => [
                    'id' => '1',
                    'name' => 'Mexxx',
                    'color' => 'red',
                    'brand' => 'MB',
                    'description' => 'this is good car',
                    'img' => 'https://sdufsdfuuh.sdf.sf',
                    'price' => 21
                ],

                'expected' => [
                    'id' => '1',
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