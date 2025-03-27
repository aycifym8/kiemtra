<?php

namespace Config;

class Database
{
    private static $servername = "127.0.0.1";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "QL_NhanSu";
    private static $conn = null;

    public static function getConnection()
    {
        if (self::$conn === null) {
            // Create connection
            self::$conn = new \mysqli(self::$servername, self::$username, self::$password, self::$dbname);

            // Check connection
            if (self::$conn->connect_error) {
                die("Connection failed: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }

    public static function closeConnection()
    {
        if (self::$conn !== null) {
            self::$conn->close();
            self::$conn = null;
        }
    }
}
