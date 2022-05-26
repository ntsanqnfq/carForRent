<?php

namespace Sang\CarForRent\Repository;

use PDO;
use Sang\CarForRent\Database\Database;
use Sang\CarForRent\Model\UserModel;

class UserLoginRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * @param $userName
     * @return UserModel|null
     */
    public function searchByUserName($userName): UserModel|null
    {
        $query = $this->connection->prepare("SELECT * FROM customer WHERE username = ? ");
        $query->execute([$userName]);

        $row = $query->fetch();
        $query->closeCursor();

        if (!$row) return null;
        return $this->setUser($row);
    }

    private function setUser(mixed $row): UserModel
    {
        $user = new UserModel();
        $user->setUserName($row['username']);
        $user->setPassword($row['password']);
        $user->setCustomerName($row['customer_name']);
        $user->setId($row['id_customer']);
        return $user;
    }
}
