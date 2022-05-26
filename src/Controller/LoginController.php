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
     * @return bool
     */
    public function login(): bool
    {
        View::render('login');
        return true;
    }

    /**
     * @return bool
     */
    public function handleLogin(): bool
    {
        $this->userRequest->setUserName($_POST['userName']);
        $this->userRequest->setPassword($_POST['password']);

        $validate = $this->userRequestValidation->checkUserNamePassword($this->userRequest);

        if (!empty($validate)) {
            View::render('login', $validate);
            return false;
        }
        $user = $this->loginService->login($this->userRequest);

        if ($user == null) {
            View::render('login', [
                'login_error' => 'user or password is incorrect'
            ]);
            return false;
        }

        $_SESSION['username'] = $user->getUserName();
        View::redirect('/');

        return true;
    }

    /**
     * @return bool
     */
    public function logout(): bool
    {
        unset($_SESSION['username']);
        View::redirect('/');
        return true;
    }
}
