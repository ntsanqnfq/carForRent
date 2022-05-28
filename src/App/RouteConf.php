<?php

namespace Sang\CarForRent\App;

//$routes = array(
//    array('GET', '/', HomeController::class, 'home'),
//    array('GET', '/login', LoginController::class, 'login'),
//    array('POST', '/login', LoginController::class, 'handleLogin'),
//    array('POST', '/logout', LoginController::class, 'logout')
//);

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
            Route::post('/logout', LoginController::class, 'logout')
        ];
    }
}