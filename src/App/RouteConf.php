<?php

namespace Sang\CarForRent\App;

use Sang\CarForRent\Controller\AboutUsController;
use Sang\CarForRent\Controller\Api\AddCarApiController;
use Sang\CarForRent\Controller\Api\CarApiController;
use Sang\CarForRent\Controller\Api\LoginApiController;
use Sang\CarForRent\Controller\CarController;
use Sang\CarForRent\Controller\HomeController;
use Sang\CarForRent\Controller\LoginController;
use Sang\CarForRent\Model\UserModel;

class RouteConf
{
    public static function getRoute(): array
    {
        return [
            #web
            Route::get('/', HomeController::class, 'index',''),
            Route::get('/login', LoginController::class, 'login',''),
            Route::post('/login', LoginController::class, 'handleLogin',''),
            Route::post('/logout', LoginController::class, 'logout',''),
            Route::get('/aboutus', AboutUsController::class, 'aboutUs',''),
            Route::get('/addcar', CarController::class, 'addCar',UserModel::ROLE_ADMIN),
            Route::post('/addcar', CarController::class, 'addCar',''),

            #api0
            Route::get('/api/cars', CarApiController::class, 'listCars',''),
            Route::post('/api/login', LoginApiController::class, 'login',UserModel::ROLE_USER),
            Route::post('/api/addcar', AddCarApiController::class, 'addCar',UserModel::ROLE_ADMIN),
        ];
    }
}
