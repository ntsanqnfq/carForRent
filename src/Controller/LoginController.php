<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Service\SessionService;
use Sang\CarForRent\Transformer\UserTransformer;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginController extends BaseController
{
    private LoginService $loginService;
    private UserRequestValidation $userRequestValidation;
    private SessionService $sessionService;

    public function __construct(Request $request,
                                Response $response,
                                LoginService $loginService,
                                UserRequestValidation $userRequestValidation,
                                SessionService $sessionService
    )
    {
        parent::__construct($request, $response);
        $this->loginService = $loginService;
        $this->userRequestValidation = $userRequestValidation;
        $this->sessionService = $sessionService;
    }

    /**
     * @return Response
     */
    public function login(): Response
    {
        return $this->response->view('login');
    }

    public function handleLogin(): Response
    {
        $params = $this->request->formParams();
        $userTransfer = new UserTransformer();
        $userTransfer->formArray($params);
        $validate = $this->userRequestValidation->validate($userTransfer);
        if ($validate) {
            return $this->reRenderViewLogin($validate);
        }
        $user = $this->loginService->checkExist($userTransfer);
        if ($user == null) {
            $validate = [
                'username' => 'user or password is incorrect',
                'password' => 'user or password is incorrect'
            ];
            return $this->reRenderViewLogin($validate);
        }
        return $this->response->redirect('/');
    }

    /**
     * @return Response
     */
    public function logout(): Response
    {
            $this->sessionService->unset('username');
        return $this->response->redirect('/');
    }

    private function reRenderViewLogin(array $error): Response
    {
        return $this->response->view(
            'login',
            $error,
            "400"
        );
    }
}
