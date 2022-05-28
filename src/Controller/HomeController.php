<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;
use Sang\CarForRent\Http\Response;

class HomeController extends BaseController
{

    public function home(): Response
    {
        $view = 'home';
        return $this->response->view($view);
    }
}
