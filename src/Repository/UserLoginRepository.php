<?php

namespace Sang\CarForRent\Repository;

use PDO;
use Sang\CarForRent\Database\Database;
use Sang\CarForRent\Model\UserModel;

class UserLoginRepository
{
    private PDO $connection;
    private UserModel $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->connection = Database::getConnection();
        $this->userModel = $userModel;
    }

    /**
     * @param $userName
     * @return UserModel|void
     */
    public function searchByUserName($userName)
    {
        $query = $this->connection->prepare("SELECT * FROM customer WHERE username = ? ");
        $query->execute([$userName]);

        try {
            if ($row = $query->fetch()) {
                $this->userModel->setUserName($row['username']);
                $this->userModel->setPassword($row['password']);
                return $this->userModel;
            }
        } finally {
            $query->closeCursor();
        }
    }
}
