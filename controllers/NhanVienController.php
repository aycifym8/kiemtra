<?php

namespace Controllers;

use Models\NhanVienModel;

class NhanVienController
{
    public static function index()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $nhanvienList = NhanVienModel::getNhanVienByPage($limit, $offset);
        $total_pages = ceil(NhanVienModel::getTotalNhanVien() / $limit);

        include 'views/nhanvien/index.php';
    }

    public static function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_nv = $_POST['Ten_NV'];
            $phai = $_POST['Phai'];
            $noi_sinh = $_POST['Noi_Sinh'];
            $ma_phong = $_POST['Ma_Phong'];
            $luong = $_POST['Luong'];

            NhanVienModel::addNhanVien($ten_nv, $phai, $noi_sinh, $ma_phong, $luong);
            header("Location: index.php?controller=nhanvien");
            exit();
        }
        include 'views/nhanvien/create.php';
    }

    public static function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ma_nv = $_POST['Ma_NV'];
            $ten_nv = $_POST['Ten_NV'];
            $phai = $_POST['Phai'];
            $noi_sinh = $_POST['Noi_Sinh'];
            $ma_phong = $_POST['Ma_Phong'];
            $luong = $_POST['Luong'];

            NhanVienModel::updateNhanVien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong);
            header("Location: index.php");
        }
    }

    public static function delete()
    {
        if (isset($_GET['id'])) {
            $ma_nv = $_GET['id'];
            NhanVienModel::deleteNhanVien($ma_nv);
            header("Location: index.php");
        }
    }
}
