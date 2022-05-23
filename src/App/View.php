<?php

namespace Sang\CarForRent\App;


class View
{
    /**
     * @param $view
     * @param array $data
     * @return void
     */
    public static function render($view, array $data = []): void
    {
        require __DIR__ . "/../View/layouts/main.php";
        require __DIR__ . "/../View/" . $view . ".php";
    }

    /**
     * @param $url
     * @return void
     */
    public static function redirect($url): void
    {
        header("Location: $url");
    }
}
