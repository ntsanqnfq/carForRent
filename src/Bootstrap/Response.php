<?php

namespace Sang\CarForRent\Bootstrap;

class Response
{
    public $user;
    public $message = [];

    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }


    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getMessage(): array
    {
        return $this->message;
    }

    public function setMessage(array $message)
    {
        $this->message = $message;
    }
}
