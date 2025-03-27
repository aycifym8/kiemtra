<?php

namespace Controllers;

use Models\NhanVienModel;

class NhanVienController
{
    public static function index()
    {
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location: /kiemtra/login.php");
            exit;
        }

        $limit = 5; // Số nhân viên trên mỗi trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // Gọi Model để lấy dữ liệu
        $result = NhanVienModel::getNhanVienWithPagination($limit, $offset);

        if (!$result) {
            die("Lỗi lấy dữ liệu nhân viên!");
        }

        // Truyền dữ liệu ra View
        $nhanvienList = $result['data'];
        $total_rows = $result['total'];
        $total_pages = ceil($total_rows / $limit);

        include 'views/nhanvien/index.php';
    }
}
