<?php

namespace Sang\CarForRent\App;

use ReflectionException;

class Application
{

    /**
     * @throws ReflectionException
     */
    public function start(): void
    {
        $container = new Container();

        #get route
        $route = $container->make(Route::class);
        $route->getRoute();

        #call controller with action
        $actionName = $route->getActionName();
        $controllerClassName = $route->getControllerClassName();
        $controller = $container->make($controllerClassName);
        $controller->$actionName();
    }
}
