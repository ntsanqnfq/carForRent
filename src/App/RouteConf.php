<?php

namespace Sang\CarForRent\App;

use Sang\CarForRent\Controller\AboutUsController;
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
        ];
    }
}
