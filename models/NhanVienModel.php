<?php

namespace Models;

use Config\Database;

class NhanVienModel
{
    public static function getNhanVienByPage($limit, $offset)
    {
        $conn = Database::getConnection();

        $sql = "SELECT NHANVIEN.*, PHONGBAN.Ten_Phong 
                FROM NHANVIEN 
                INNER JOIN PHONGBAN ON NHANVIEN.Ma_Phong = PHONGBAN.Ma_Phong
                LIMIT ? OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $nhanvienList = [];
        while ($row = $result->fetch_assoc()) {
            $nhanvienList[] = $row;
        }

        Database::closeConnection();
        return $nhanvienList;
    }

    public static function getTotalNhanVien()
    {
        $conn = Database::getConnection();

        $sql = "SELECT COUNT(*) AS total FROM NHANVIEN";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        Database::closeConnection();
        return $row['total'];
    }
}
