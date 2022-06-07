<?php

namespace Sang\CarForRent\Repository;

use Sang\CarForRent\Model\UserModel;

class UserLoginRepository extends AbstractRepository
{
    /**
     * @param $userName
     * @return UserModel|null
     */
    public function searchByUserName($userName): UserModel|null
    {
        $query = $this->getConnection()->prepare("SELECT * FROM customer WHERE username = ? ");
        $query->execute([$userName]);

        $row = $query->fetch();
        $query->closeCursor();

        if (!$row) return null;
        return $this->setUser($row);
    }

    public function searchById($id):  UserModel|null
    {
        $query = $this->getConnection()->prepare("SELECT * FROM customer WHERE id_customer = ? ");
        $query->execute([$id]);
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
        $user->setRole($row['role']);
        return $user;
    }
}
