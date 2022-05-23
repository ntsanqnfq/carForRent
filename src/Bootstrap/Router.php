<?php

namespace Sang\CarForRent\Bootstrap;

use Sang\CarForRent\App\View;

class Router
{
    protected static array $routes = [];

    public static Request $request;

    public static Response $response;

    public function __construct(Request $request, Response $response)
    {
        static::$request = $request;
        static::$response = $response;
    }

    public static function get($path, $callback): void
    {
        static::$routes['GET'][$path] = $callback;
    }

    public static function post($path, $callback): void
    {
        static::$routes['POST'][$path] = $callback;
    }


    public static function resolve()
    {
        $path = static::$request->getPath();
        $method = static::$request->getMethod();
        $callback = static::$routes[$method][$path] ?? false;
        if ($callback === false) {
            static::$response->setStatusCode(404);
            return View::renderView('notfound');
        }
        if (is_string($callback)) {
            return View::renderView($callback);
        }
        return call_user_func($callback);
    }
}