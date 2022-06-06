<?php

namespace Sang\CarForRent\Controller\Api;

use JsonException;
use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\LoginService;
use Sang\CarForRent\Service\SessionService;
use Sang\CarForRent\Transformer\UserTransformer;
use Sang\CarForRent\Validation\UserRequestValidation;

class LoginApiController extends AbstractApiController
{
    private UserRequestValidation $userRequestValidation;
    private LoginService $loginService;

    public function __construct(Request $request, Response $response,
                                UserRequestValidation $userRequestValidation,
                                LoginService $loginService
    )
    {
        parent::__construct($request, $response);
        $this->userRequestValidation = $userRequestValidation;
        $this->loginService = $loginService;
    }

    /**
     * @throws JsonException
     */
    public function login(): Response
    {
        if ($this->request->isPost()) {
            $params = $this->request->getRequestJsonBody();
            $userTransfer = new UserTransformer();
            $userTransfer->toObject($params);
            $validate = $this->userRequestValidation->validate($userTransfer);
            if (!empty($validate)) {
                return $this->response->error($validate);
            }
            $user = $this->loginService->checkExist($userTransfer);
            if (!$user) {
                $validate = [
                    'login_error' => 'user or password is incorrect'
                ];
                return $this->response->error($validate);
            }
            return $this->response->success([
                "user" => [
                    "user" => $user->getCustomerName(),
                ]
            ]);
        }
    }
}