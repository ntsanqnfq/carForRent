<?php

namespace Sang\CarForRent\App;

use Sang\CarForRent\Exception\AuthenticationException;
use Sang\CarForRent\Exception\InvalidTokenException;
use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Service\TokenService;

class Acl
{
    private Request $request;
    private TokenService $tokenService;
    private UserLoginRepository $userLoginRepository;

    public function __construct(Request $request,TokenService $tokenService, UserLoginRepository $userLoginRepository)
    {
        $this->request  = $request;
        $this->tokenService= $tokenService;
        $this->userLoginRepository = $userLoginRepository;
    }

    /**
     * @throws InvalidTokenException
     * @throws AuthenticationException
     */
    public function verify(Route $route)
    {
        $role = $route->getRole();
        $uri = substr($this->request->getRequestUri(), 1,3);
        if ($uri === 'api'){
            $this->checkToken($role);
        }
        $this->checkSession($role);
    }

    /**
     * @param $role
     * @return array|string[]
     * @throws AuthenticationException
     * @throws InvalidTokenException
     */
    private function checkToken($role): array
    {
        $authorizationToken = $this->request->getTokenHeader();
        $tokenPayload = $this->tokenService->getTokenPayload($authorizationToken);
        $userId = $tokenPayload['sub'];
        $user = $this->userLoginRepository->searchById($userId);
        if (!$user){
            return [
                'error'=>'Invalid user'
            ];
        }
        if ($user->getRole() === $role){
            return [];
        }
        return [
            'error'=>'This user is not allowed'
        ];
    }

    /**
     * @param $role
     * @return array|string[]
     */
    private function checkSession($role): array
    {
        $session = $_SESSION['username'] ?? null;
        if($session === null){
            return [
                'error'=>'No user logged in'
            ];
        }
        $user = $this->userLoginRepository->searchByUserName($_SESSION['username']);
        if ($user->getRole()===$role){
            return [];
        }
        return [
            'error'=>'This user is not allowed'
        ];
    }
}