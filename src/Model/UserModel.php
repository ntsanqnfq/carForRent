<?php

namespace Sang\CarForRent\Model;

class UserModel
{
    public const ROLE_USER = 'USER';
    public const ROLE_ADMIN = 'ADMIN';

    private mixed $id;
    private mixed $userName;
    private mixed $password;
    private mixed $customerName;
    private mixed $role;

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserName(): mixed
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName(mixed $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword(): mixed
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(mixed $password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCustomerName(): mixed
    {
        return $this->customerName;
    }

    /**
     * @param mixed $customerName
     */
    public function setCustomerName(mixed $customerName): void
    {
        $this->customerName = $customerName;
    }

    /**
     * @return mixed
     */
    public function getRole(): mixed
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole(mixed $role): void
    {
        $this->role = $role;
    }

}
