<?php

namespace Sang\CarForRent\Request;

class UserRequest
{
    private $userName;
    private  $password;

    public function __construct()
    {
        $this->userName = $_POST['userName']??'';
        $this->password = $_POST['password']??'';
    }

    public function getUserName(): mixed
    {
        return $this->userName;
    }

    public function getPassword(): mixed
    {
        return $this->password;
    }
}