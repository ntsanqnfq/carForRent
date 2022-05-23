<?php
namespace Sang\CarForRent\App;


class View
{
    public static function render($view, array $data=[]): void
    {
        require __DIR__ . "/../View/layouts/main.php";
        require __DIR__ . "/../View/" . $view . ".php";
    }

    public static function redirect($url): void
    {
        header("Location: $url");
    }
}