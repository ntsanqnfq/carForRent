<?php

namespace Sang\CarForRent\App;

use ReflectionException;
use Sang\CarForRent\Controller\NotFoundController;
use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;

class Application
{
    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return false|Route
     */
    private function getRoute(): bool|Route
    {
        $method = $this->request->requestMethod();
        $uri = $this->request->requestUri();
        $routes = RouteConf::getRoute();
        foreach ($routes as $route) {
            if ($route->getMethod() !== $method || $route->getUri() !== $uri) {
                continue;
            }
            return $route;
        }
        return false;
    }

    /**
     * @throws ReflectionException
     */
    public function start()
    {
        $controllerClassName = NotFoundController::class;
        $actionName = NotFoundController::INDEX_ACTION;
        $route = $this->getRoute();
        $controllerClassName = $route->getControllerClassName();
        $actionName = $route->getActionName();
        $container = new Container();
        $controller = $container->make($controllerClassName);
        /**
         * @var Response $response
         */
        Response $response= $controller->{$actionName}();
        $view = new View();
        return $view->handle($response);
    }
}
