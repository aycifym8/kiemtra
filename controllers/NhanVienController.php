<?php

namespace Controllers;

use Models\NhanVienModel;

class NhanVienController
{
    public static function index()
    {
        // Lấy số trang hiện tại, mặc định là 1 nếu không có tham số
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5; // Số nhân viên hiển thị trên mỗi trang
        $offset = ($page - 1) * $limit;

        // Lấy danh sách nhân viên theo trang
        $nhanvienList = NhanVienModel::getNhanVienByPage($limit, $offset);

        // Lấy tổng số trang để phân trang
        $total_pages = ceil(NhanVienModel::getTotalNhanVien() / $limit);

        // Load view và truyền dữ liệu
        include 'views/nhanvien/index.php';
    }
}
