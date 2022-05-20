<?php

namespace Sang\CarForRent\Bootstrap;

class Controller
{
    public string $layout = 'main';

    public function setLayOut($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function redirect(string $url): void
    {
        header("location: $url");
    }
}
