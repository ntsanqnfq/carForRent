<?php

namespace Sang\CarForRent\Request;

class UserRequest
{
    private string $userName;
    private string $password;

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(mixed $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
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
