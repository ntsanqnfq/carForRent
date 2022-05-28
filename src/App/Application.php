<?php

namespace Sang\CarForRent\App;

use ReflectionException;

class Application
{

    /**
     * @throws ReflectionException
     */
    public function start(): bool
    {
        $container = new Container();

        $route = $container->make(Route::class);
        $route->getRoute();

        $actionName = $route->getActionName();
        $controllerClassName = $route->getControllerClassName();
        $controller = $container->make($controllerClassName);
        $controller->$actionName();
        return true;
    }
}
