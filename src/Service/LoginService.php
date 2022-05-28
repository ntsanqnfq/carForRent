<?php

namespace Sang\CarForRent\Service;

use Sang\CarForRent\Model\UserModel;
use Sang\CarForRent\Repository\UserLoginRepository;
use Sang\CarForRent\Transformer\UserTransformer;

class LoginService
{
    private UserLoginRepository $userLoginRepository;

    public function __construct(UserLoginRepository $userLoginRepository)
    {
        $this->userLoginRepository = $userLoginRepository;
    }

    /**
     * @param UserTransformer $transformer
     * @return UserModel|bool
     */
    public function login(UserTransformer $transformer): UserModel|bool
    {
        $userData = $this->userLoginRepository->searchByUserName($transformer->getUserName());
        if ($userData && $this->verifyPassword($transformer, $userData)) {
            return $userData;
        }
        return false;
    }


    public function verifyPassword(UserTransformer $transformer, UserModel $userData): bool
    {
        if (password_verify($transformer->getPassword(), $userData->getPassword())) {
            return true;
        } else {
            return false;
        }
    }
}
