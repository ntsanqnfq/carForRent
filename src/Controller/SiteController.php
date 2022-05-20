<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Bootstrap\Controller;
use Sang\CarForRent\Bootstrap\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'NFQ ntsanq'
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {

        $params = [
        ];
        return $this->render('contact', $params);
    }


    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        die();
    }

    public function login(Request $request)
    {
        $body = $request->getBody();
    }
}
