<?php

namespace App\Models;

use PDO;

class Database
{
    private static $db;

    private function __construct() {}

    public static function getConnection()
    {
        if (self::$db === null) {
            try {
                $host = 'localhost';
                $dbName = 'ParkingLotDB';
                $username = 'root';
                $password = 'Mtoi2002.';
                $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8";

                self::$db = new PDO($dsn, $username, $password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return self::$db;
    }
}
