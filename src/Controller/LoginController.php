<?php

namespace Sang\CarForRent\Controller;


use PDO;
use Sang\CarForRent\App\Container;
use Sang\CarForRent\App\View;
use Sang\CarForRent\Service\LoginService;

class LoginController
{
    private LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * @return void
     */
    public function login(): void
    {
        View::render('login');
    }

    /**
     * @return void
     */
    public function handleLogin(){
        $this->loginService->login();
        $_SESSION['username']= $this->loginService->getUser()->getUserName();
        View::render('home');

    }

}

