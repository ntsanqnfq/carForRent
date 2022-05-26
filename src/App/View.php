<?php

namespace Sang\CarForRent\App;


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
}
