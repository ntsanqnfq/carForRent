<?php

namespace Sang\CarForRent\Repository;

use PDO;
use Sang\CarForRent\Database\Database;

class UserLoginRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * @param $userName
     * @return mixed|void
     */
    public function searchByUserName($userName)
    {
        $query = $this->connection->prepare("SELECT * FROM customer WHERE username = ? ");
        $query->execute([$userName]);

        try {
            if ($row = $query->fetch()){
                return $row;
            }
        } finally {
            $query->closeCursor();
        }
    }
}
