<?php

namespace Sang\CarForRent\Controller;

use Dotenv\Exception\ValidationException;
use Sang\CarForRent\App\View;
use Sang\CarForRent\Bootstrap\Controller;
use Sang\CarForRent\Bootstrap\Request;
use Sang\CarForRent\Database\Database;
use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Validation\LoginValidation;

class LoginController extends Controller
{
    protected $connect;
    protected $request;
    private $loginService;
    protected UserModel $user;

    public function __construct()
    {
        $this->connect = Database::getConnection();
        $this->request = new Request();
        $this->loginService = new LoginService();
        $this->user = new UserModel();
    }

    public function login()
    {
        $login = new LoginValidation();
        return View::renderView('login', [
            'model' => $login
        ]);
    }

    public function loginCheck()
    {
        $login = new LoginValidation();
        if (!$this->request->isPost()) {
            return View::renderView('login', [
                'model' => $login
            ]);
        }
        $login->loadData($this->request->getBody());

        if (!$login->validate()) {


            return View::renderOnlyView('login', [
                'model' => $login
            ]);
        }
        try {
            $this->user->setUsername($login->username);
            $this->user->setPassword($login->password);
            $userSession = $this->loginService->login($this->user);
            $_SESSION["user_id"] = $userSession->getUser()->getId();
            $_SESSION["username"] = $userSession->getUser()->getUsername();
            $_SESSION["customerName"] = $userSession->getUser()->getUsername();
            View::redirect('/');
        } catch (ValidationException $e) {
            return View::renderOnlyView('login', [
                'model' => $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        if (!$this->request->isPost()) {
            View::redirect('/');
        }
        unset($_SESSION["user_id"], $_SESSION["username"]);
        View::redirect('/');
    }



}


