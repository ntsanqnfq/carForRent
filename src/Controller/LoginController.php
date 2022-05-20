<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Bootstrap\Request;

class LoginController
{
    public function handleLogin(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        die();
    }
}
