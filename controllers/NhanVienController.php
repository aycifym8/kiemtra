<?php

namespace Controllers;

use Models\NhanVienModel;

class NhanVienController
{
    public static function index()
    {
        $nhanvienList = NhanVienModel::getAllNhanVien();

        // Debug kiểm tra dữ liệu
        if (empty($nhanvienList)) {
            die("Lỗi: Không có dữ liệu nhân viên.");
        }

        // Load view
        include __DIR__ . '/../views/nhanvien/index.php';
    }
}
