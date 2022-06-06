<?php

namespace Sang\CarForRent\Repository;

use PDO;
use Sang\CarForRent\Database\Database;

abstract class AbstractRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * @param PDO $connection
     */
    public function setConnection(PDO $connection): void
    {
        $this->connection = $connection;
    }
}
