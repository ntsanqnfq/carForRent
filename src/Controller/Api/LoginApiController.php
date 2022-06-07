<?php

namespace Sang\CarForRent\Controller\Api;

use JsonException;
use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Service\SessionService;
use Sang\CarForRent\Service\TokenService;
use Sang\CarForRent\Transformer\UserTransformer;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginApiController extends AbstractApiController
{
    private UserRequestValidation $userRequestValidation;
    private LoginService $loginService;
    private TokenService $tokenService;
    private UserTransformer $userTransformer;

    public function __construct(Request $request, Response $response,
                                UserRequestValidation $userRequestValidation,
                                LoginService $loginService,
                                TokenService $tokenService,
                                UserTransformer $userTransformer
    )
    {
        parent::__construct($request, $response);
        $this->userRequestValidation = $userRequestValidation;
        $this->loginService = $loginService;
        $this->tokenService = $tokenService;
        $this->userTransformer = $userTransformer;
    }


    /**
     * @throws JsonException
     */
    public function login(): Response
    {
            $validate = $this->userRequestValidation->validate($this->getRequest());
            if ($validate) {
                return $this->reRenderViewLogin($validate);
            }
            $user = $this->loginService->checkExist($this->getRequest());
            if (!$user) {
                $validate = [
                    'login_error' => 'user or password is incorrect'
                ];
                return $this->response->error($validate);
            }
            $token = $this->tokenService->generate($user);
            return $this->response->success([
                'data' => [
                    'id' => $user->getId(),
                    'name' => $user->getCustomerName(),
                    'token'=>$token
                ]
            ]);
    }

    private function reRenderViewLogin(array $error): Response
    {
        return $this->response->view(
            'login',
            $error,
            "400"
        );
    }

    /**
     * @throws JsonException
     */
    private function getRequest(): UserTransformer
    {
        $params = $this->request->getRequestJsonBody();
        return $this->userTransformer->toObject($params);
    }
}