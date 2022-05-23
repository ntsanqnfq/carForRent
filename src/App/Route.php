<?php

namespace Sang\CarForRent\App;

use Sang\CarForRent\Controller\ContactController;
use Sang\CarForRent\Controller\HomeController;
use Sang\CarForRent\Controller\LoginController;
use Sang\CarForRent\Http\Request;

class Route
{
    protected string $method;

    protected string $uri;

    protected string $controllerClassName;

    protected string $actionName;

    /**
     * @param string $method
     * @param string $uri
     * @param string $controllerClassName
     * @param string $actionName
     * @return void
     */
    private function setRoute(string $method, string $uri, string $controllerClassName, string $actionName): void
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->controllerClassName = $controllerClassName;
        $this->actionName = $actionName;
    }


    /**
     * @return void
     */
    public function getRoute()
    {
        $routes = array(
            array('GET', '/', HomeController::class, 'home'),
            array('GET', '/login', LoginController::class, 'login'),
            array('POST', '/login', LoginController::class, 'handleLogin'),
            array('GET', '/contact', ContactController::class, 'contact')
        );

        foreach ($routes as $route) {
            if ($route[0] == Request::requestMethod() && $route[1] == Request::requestUri()) {
                list($method, $uri, $controller, $action) = $route;
                $this->setRoute($method, $uri, $controller, $action);
            }
        }
    }

    /**
     * @return string
     */
    public function getControllerClassName(): string
    {
        return $this->controllerClassName;
    }

    /**
     * @param string $controllerClassName
     */
    public function setControllerClassName(string $controllerClassName): void
    {
        $this->controllerClassName = $controllerClassName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @param string $actionName
     */
    public function setActionName(string $actionName): void
    {
        $this->actionName = $actionName;
    }
}
