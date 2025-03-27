<?php

namespace Models;

use Config\Database;

class NhanVienModel
{
    public static function getNhanVienWithPagination($limit, $offset)
    {
        $conn = Database::getConnection();
        $query = "SELECT nv.*, p.Ten_Phong 
                  FROM nhanvien nv
                  JOIN phongban p ON nv.Ma_Phong = p.Ma_Phong
                  LIMIT ?, ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Lấy tổng số nhân viên
        $total_query = "SELECT COUNT(*) AS total FROM nhanvien";
        $total_result = $conn->query($total_query);
        $total_row = $total_result->fetch_assoc();
        $total = $total_row['total'];

        return ["data" => $data, "total" => $total];
    }
}
