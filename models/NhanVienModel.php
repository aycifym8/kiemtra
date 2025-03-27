<?php

namespace Models;

use Config\Database;

class NhanVienModel
{
    public static function getAllNhanVien()
    {
        $conn = Database::getConnection();

        $sql = "SELECT NHANVIEN.*, PHONGBAN.Ten_Phong
FROM NHANVIEN
INNER JOIN PHONGBAN ON NHANVIEN.Ma_Phong = PHONGBAN.Ma_Phong";

        $result = $conn->query($sql);

        if (!$result) {
            die("Lỗi truy vấn SQL: " . $conn->error);
        }

        $nhanvienList = [];
        while ($row = $result->fetch_assoc()) {
            $nhanvienList[] = $row;
        }

        Database::closeConnection();
        return $nhanvienList;
    }
}
