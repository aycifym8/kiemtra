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
        if (!$stmt) {
            die("Lỗi truy vấn: " . $conn->error);
        }

        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $nhanvienList = [];
        while ($row = $result->fetch_assoc()) {
            $nhanvienList[] = $row;
        }

        $stmt->close();
        return $nhanvienList;
    }

    public static function getTotalNhanVien()
    {
        $conn = Database::getConnection();
        $sql = "SELECT COUNT(*) AS total FROM NHANVIEN";
        $result = $conn->query($sql);
        if (!$result) {
            die("Lỗi truy vấn: " . $conn->error);
        }
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public static function getNhanVienById($ma_nv)
    {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM NHANVIEN WHERE Ma_NV = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi truy vấn: " . $conn->error);
        }

        $stmt->bind_param("i", $ma_nv);
        $stmt->execute();
        $result = $stmt->get_result();
        $nhanvien = $result->fetch_assoc();

        $stmt->close();
        return $nhanvien;
    }

    public static function addNhanVien($ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $conn = Database::getConnection();
        $sql = "INSERT INTO NHANVIEN (Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi truy vấn: " . $conn->error);
        }

        $stmt->bind_param("sssii", $ten_nv, $phai, $noi_sinh, $ma_phong, $luong);
        $stmt->execute();

        $stmt->close();
    }

    public static function updateNhanVien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $conn = Database::getConnection();
        $sql = "UPDATE NHANVIEN SET Ten_NV = ?, Phai = ?, Noi_Sinh = ?, Ma_Phong = ?, Luong = ? WHERE Ma_NV = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi truy vấn: " . $conn->error);
        }

        $stmt->bind_param("sssiii", $ten_nv, $phai, $noi_sinh, $ma_phong, $luong, $ma_nv);
        $stmt->execute();

        $stmt->close();
    }

    public static function deleteNhanVien($ma_nv)
    {
        $conn = Database::getConnection();
        $sql = "DELETE FROM NHANVIEN WHERE Ma_NV = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi truy vấn: " . $conn->error);
        }

        $stmt->bind_param("i", $ma_nv);
        $stmt->execute();

        $stmt->close();
    }
}
