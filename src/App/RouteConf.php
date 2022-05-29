<?php

namespace Sang\CarForRent\App;

use Sang\CarForRent\Controller\AboutUsController;
use Sang\CarForRent\Controller\Api\CarApiController;
use Sang\CarForRent\Controller\Api\LoginApiController;
use Sang\CarForRent\Controller\HomeController;
use Sang\CarForRent\Controller\LoginController;

class RouteConf
{
    public static function getRoute(): array
    {
        return [
            Route::get('/', HomeController::class, 'home'),
            Route::get('/login', LoginController::class, 'login'),
            Route::post('/login', LoginController::class, 'handleLogin'),
            Route::post('/logout', LoginController::class, 'logout'),
            Route::get('/aboutus', AboutUsController::class, 'aboutUs'),

            Route::get('/api/cars', CarApiController::class, 'listCars'),
            Route::post('/api/login', LoginApiController::class, 'login'),
        ];
    }
}
