<?php

namespace Models;

use Config\Database;

class UserModel
{
    public static function getUserByUsername($username)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        Database::closeConnection();
        return $user;
    }
}
