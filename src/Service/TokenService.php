<?php

namespace Sang\CarForRent\Service;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Sang\CarForRent\Exception\AuthenticationException;
use Sang\CarForRent\Exception\InvalidTokenException;
use Sang\CarForRent\Model\Token;
use Sang\CarForRent\Model\UserModel;

class TokenService
{
    protected string $secret = 'this token is secret';

    public function generate(UserModel $user): string
    {
        $userId = $user->getId();
        $iat = time();
        $token = new Token();
        $payload = [
            'tid' => $token->getId(),
            'sub' => $userId,
            'iat' => $iat
        ];
        return JWT::encode($payload, $this->secret, 'HS256');
    }

    public function checkToken($token): array
    {
        $decoded = JWT::decode($token, new Key($this->secret, 'HS256'));
        return (array)$decoded;
    }

    /**
     * @throws InvalidTokenException
     * @throws AuthenticationException
     */
    public function getTokenPayload($authorizationToken): array
    {
        $bearerToken = explode('Bearer ', $authorizationToken);
        if (count($bearerToken) !== 2 || empty($bearerToken[1])) {
            throw new InvalidTokenException('invalid token');
        }
        $token = $bearerToken[1];
        $payload = $this->checkToken($token);
        if ($payload) {
            return $payload;
        }

        throw new AuthenticationException('unauthorized');
    }
}