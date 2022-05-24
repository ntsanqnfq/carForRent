<?php

namespace Sang\CarForRent\Controller;


use PDO;
use Sang\CarForRent\App\Container;
use Sang\CarForRent\App\View;
use Sang\CarForRent\Request\UserRequest;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginController
{
    private LoginService $loginService;
    private UserRequest $userRequest;
    private UserRequestValidation $userRequestValidation;

    public function __construct(LoginService $loginService, UserRequest $userRequest, UserRequestValidation $userRequestValidation)
    {
        $this->loginService = $loginService;
        $this->userRequest = $userRequest;
        $this->userRequestValidation = $userRequestValidation;
    }

    /**
     * @return void
     */
    public function login(): void
    {
        View::render('login');
    }

    public function handleLogin()
    {
        //handle request
        $userRequest = $this->userRequest;
        // validation
        $validate = $this->userRequestValidation->checkUserNamePassword($userRequest); //check user request
        if ($validate != []){
            View::render('login', $validate);
        }
        // use service for logging
        $user = $this->loginService->login($this->userRequest); // check database
        // return view
        $_SESSION['username'] = $this->loginService->getUser()->getUserName();
        View::render('home');

    }

    public function logout(){
        unset($_SESSION['username']);
        View::redirect('/');
    }

}

