<?php
namespace Sang\CarForRent\App;

use Sang\CarForRent\Bootstrap\Application;

class View
{
    /**
     * @param string $view
     * @return array|false|string|string[]
     */
    public static function renderView(string $view, $params = [])
    {
        $layoutContent = static::layoutContent();
        $viewContent = static::renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public static function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/src/View/layouts/main.php";
        return ob_get_clean();
    }

    public static function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/src/View/$view.php";
        return ob_get_clean();
    }

    public static function redirect($url)
    {
        header("Location: $url");
    }
}