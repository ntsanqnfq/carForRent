<?php

namespace Sang\CarForRent\Database;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class Database
{

    public static PDO $connection;
    protected static $dotenv;

    public static function getConnection(): PDO
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        self::$dotenv = $dotenv->load();

        if (empty(self::$connection)) {
            $host = $_ENV['DB_HOST'];

            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];
            $database = $_ENV['DB_DATABASE'];

            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                echo "Connected successfully";
            } catch (PDOException $e) {
//                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$connection;
    }
}
