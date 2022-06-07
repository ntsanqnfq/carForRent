<?php

namespace Sang\CarForRent\App;

use ReflectionException;
use Sang\CarForRent\Controller\NotFoundController;
use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;

class Application
{
    private Request $request;
    private Container $container;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }



    /**
     * @throws ReflectionException
     */
    public function start()
    {
        $this->container = new Container();

        $controllerClassName = NotFoundController::class;
        $actionName = NotFoundController::INDEX_ACTION;
        $route = $this->getRoute();
        if ($route) {
            //acl
            $acl = $this->container->make(Acl::class);
            $acl->verify($route);

            $controllerClassName = $route->getControllerClassName();
            $actionName = $route->getActionName();
        }
        $controller = $this->container->make($controllerClassName);

        /**
         * @var Response $response
         */
        $response = $controller->{$actionName}();
        $view = $this->container->make(View::class);
        return $view->handle($response);
    }

    /**
     * @return false|Route
     */
    private function getRoute(): bool|Route
    {
        $method = $this->request->getRequestMethod();
        $uri = $this->request->getRequestUri();
        $routes = RouteConf::getRoute();
        foreach ($routes as $route) {
            if ($route->getMethod() !== $method || $route->getUri() !== $uri) {
                continue;
            }
            return $route;
        }
        return false;
    }
}
