<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;
use Sang\CarForRent\Request\UserRequest;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginController
{
    private LoginService $loginService;
    private UserRequest $userRequest;
    private UserRequestValidation $userRequestValidation;

    /**
     * @param LoginService $loginService
     * @param UserRequest $userRequest
     * @param UserRequestValidation $userRequestValidation
     */
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

    /**
     * @return void
     */
    public function handleLogin()
    {
        $userRequest = $this->userRequest;
        $validate = $this->userRequestValidation->checkUserNamePassword($userRequest);
        if (!empty($validate)) {
            View::render('login', $validate);
        }
        var_dump($validate);
        $user = $this->loginService->login($this->userRequest);
        if ($user) {
            $_SESSION['username'] = $user->getUserName();
            View::redirect('/');
        } else {
            View::render('login', [
                'login_error' => 'user or password is incorrect'
            ]);
        }
    }

    /**
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['username']);
        View::redirect('/');
    }
}
