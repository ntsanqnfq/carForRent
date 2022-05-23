<?php

namespace Sang\CarForRent\Bootstrap;

use Sang\CarForRent\App\View;

class Controller
{

    public function render($view, $params = [])
    {
        return View::renderView($view, $params);
    }

}
