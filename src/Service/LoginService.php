<?php

namespace Sang\CarForRent\Service;

use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Transformer\UserTransformer;

class LoginService
{
    private UserLoginRepository $userLoginRepository;
    private SessionService $sessionService;

    public function __construct(UserLoginRepository $userLoginRepository, SessionService $sessionService)
    {
        $this->userLoginRepository = $userLoginRepository;
        $this->sessionService = $sessionService;
    }

    /**
     * @param UserTransformer $transformer
     * @return UserModel|bool
     */
    public function checkExist(UserTransformer $transformer): UserModel|bool
    {
        $userData = $this->userLoginRepository->searchByUserName($transformer->getUserName());
        if ($userData && $this->verifyPassword($transformer, $userData)) {
            $this->sessionService->set('username', $userData->getUserName());
            return $userData;
        }
        return false;
    }

    /**
     * @param UserTransformer $transformer
     * @param UserModel $userData
     * @return bool
     */
    public function verifyPassword(UserTransformer $transformer, UserModel $userData): bool
    {
        if (password_verify($transformer->getPassword(), $userData->getPassword())) {
            return true;
        } else {
            return false;
        }
    }
}
