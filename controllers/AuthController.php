<?php

namespace Controllers;

use Models\UserModel;

class AuthController
{
    public static function login()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = UserModel::getUserByUsername($username);

            if ($user && password_verify($password, $user["password"])) {
                $_SESSION["user"] = [
                    "id" => $user["id"],
                    "username" => $user["username"],
                    "role" => $user["role"]
                ];
                header("Location: /kiemtra/nhanvien/index");
                exit();
            } else {
                $error = "Sai tài khoản hoặc mật khẩu!";
            }
        }

        include 'views/auth/login.php';
    }

    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: /kiemtra/auth/login");
        exit();
    }
}
