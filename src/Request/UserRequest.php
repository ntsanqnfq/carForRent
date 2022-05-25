<?php

namespace Sang\CarForRent\Request;

class UserRequest
{
    private $userName;
    private $password;

    public function __construct()
    {
        $this->userName = $_POST['userName'] ?? '';
        $this->password = $_POST['password'] ?? '';
    }

    /**
     * @return mixed|string
     */
    public function getUserName(): mixed
    {
        return $this->userName;
    }

    /**
     * @param mixed|string $userName
     */
    public function setUserName(mixed $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed|string
     */
    public function getPassword(): mixed
    {
        return $this->password;
    }

    /**
     * @param mixed|string $password
     */
    public function setPassword(mixed $password): void
    {
        $this->password = $password;
    }

}
