<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Response;

class AboutUsController extends BaseController
{
    public function aboutUs(): Response
    {
        $view = 'aboutus';
        return $this->response->view($view);
    }
}
