<?php

namespace Sang\CarForRent\App;


use Sang\CarForRent\Http\Response;

class View
{
    /**
     * @param $view
     * @param array $data
     * @return bool
     */
    public static function render($view, array $data = []): bool
    {
        require_once __DIR__ . "/../View/layouts/main.php";
        require_once __DIR__ . "/../View/" . $view . ".php";
        return true;
    }

    /**
     * @param $url
     * @return bool
     */
    public static function redirect($url): bool
    {
        header("Location: $url");
        return true;
    }

    /**
     * @param Response $response
     * @return bool
     */
    public function handle(Response $response) :bool
    {
        http_response_code($response->getStatusCode());
        if (!empty($response->getTemplate())) {
            return View::render($response->getTemplate(), $response->getOptions());
        }
        return true;
    }
}
