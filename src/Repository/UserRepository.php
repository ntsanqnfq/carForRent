<?php

namespace Sang\CarForRent\Repository;

use PDO;
use Sang\CarForRent\Model\UserModel;

class UserRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findUserByName($username)
    {
        $userWasFound = $this->connection->prepare("SELECT * FROM customer WHERE username = '$username' ");
        $userWasFound->execute();
        $user = new UserModel();
        if ($row = $userWasFound->fetch()) {
            $user->setId($row['id_customer']);
            $user->setUsername($row['username']);
            $user->setPassword($row['password']);
            $user->setCustomerName($row['customer_name']);
            return $user;
        } else {
            return null;
        }
    }
}