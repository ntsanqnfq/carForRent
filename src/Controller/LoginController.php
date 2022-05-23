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

    public function login(): void
    {
        View::render('login');
    }

//    public function logout(): void
//    {
//        View::render('login');
//        session_unset();
//        session_destroy();
//    }

    public function handleLogin(){
        $this->loginService->login();
        //add session
        $_SESSION['username']= $this->loginService->getUser()->getUserName();
        //render view
        View::render('home');

    }

}


