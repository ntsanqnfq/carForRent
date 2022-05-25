<?php

namespace Sang\tests\App;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\App\Route;

class RouteTest extends TestCase
{
    /**
     * @dataProvider routeDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSetMethod($param, $expected){
        $route = new Route();
        $route->setMethod($param['method']);

        $result = $route->getMethod();
        $this->assertEquals($expected['method'],$result);
    }

    /**
     * @dataProvider routeDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetMethod($param, $expected){
        $route = new Route();
        $route->setActionName($param['method']);

        $result = $route->getActionName();
        $this->assertEquals($expected['method'],$result);
    }

    /**
     * @dataProvider routeDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSetUri($param, $expected){
        $route = new Route();
        $route->setUri($param['uri']);

        $result = $route->getUri();
        $this->assertEquals($expected['uri'],$result);
    }

    /**
     * @dataProvider routeDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetUri($param, $expected){
        $route = new Route();
        $route->setUri($param['uri']);

        $result = $route->getUri();
        $this->assertEquals($expected['uri'],$result);
    }

    /**
     * @dataProvider routeDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testSetControllerClassName($param, $expected){
        $route = new Route();
        $route->setControllerClassName($param['controllerClassName']);

        $result = $route->getControllerClassName();
        $this->assertEquals($expected['controllerClassName'],$result);
    }

    /**
     * @dataProvider routeDataProvider
     * @param $param
     * @param $expected
     * @return void
     */
    public function testGetControllerClassName($param, $expected){
        $route = new Route();
        $route->setControllerClassName($param['controllerClassName']);

        $result = $route->getControllerClassName();
        $this->assertEquals($expected['controllerClassName'],$result);
    }



    public function routeDataProvider(){
        return [
          'happycase'=>[
              'param'=>[
                  'method'=>'POST',
                  'uri'=>'/login',
                  'controllerClassName'=> 'LoginController::class',
                  'actionName'=>'login'
              ],
              'expected'=>[
                  'method'=>'POST',
                  'uri'=>'/login',
                  'controllerClassName'=> 'LoginController::class',
                  'actionName'=>'login'
              ]

          ]
        ];
    }
}