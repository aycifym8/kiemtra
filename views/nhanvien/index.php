<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        .admin-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .admin-buttons a {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            background-color: green;
            color: white;
            border-radius: 5px;
        }

        .delete-btn {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2 style="text-align:center;">THÔNG TIN NHÂN VIÊN</h2>

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <div class="admin-buttons">
            <a href="add.php">Thêm Nhân Viên</a>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Giới tính</th>
                <th>Nơi Sinh</th>
                <th>Tên Phòng</th>
                <th>Lương</th>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <th>Hành Động</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nhanvienList as $row): ?>
                <tr>
                    <td><?= $row["Ma_NV"] ?></td>
                    <td><?= $row["Ten_NV"] ?></td>
                    <td>
                        <?php if ($row["Phai"] == "NU"): ?>
                            <img src="/kiemtra/images/woman.png" alt="Female" style="height: 50px;">
                        <?php elseif ($row["Phai"] == "NAM"): ?>
                            <img src="/kiemtra/images/man.png" alt="Male" style="height: 50px;">
                        <?php else: ?>
                            <?= $row["Phai"] ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $row["Noi_Sinh"] ?></td>
                    <td><?= $row["Ten_Phong"] ?></td>
                    <td><?= number_format($row["Luong"], 0, ',', '.') ?> VND</td>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <td>
                            <a href="edit.php?id=<?= $row['Ma_NV'] ?>">Sửa</a> |
                            <a href="delete.php?id=<?= $row['Ma_NV'] ?>" class="delete-btn" onclick="return confirm('Xác nhận xóa?')">Xóa</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">« Trước</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>">Sau »</a>
        <?php endif; ?>
    </div>

</body>

</html>