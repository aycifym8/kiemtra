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
    </style>
</head>

<body>

    <h2>THÔNG TIN NHÂN VIÊN</h2>

    <table>
        <thead>
            <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Giới tính</th>
                <th>Nơi Sinh</th>
                <th>Tên Phòng</th>
                <th>Lương</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nhanvienList as $row): ?>
                <tr>
                    <td><?= $row["Ma_NV"] ?></td>
                    <td><?= $row["Ten_NV"] ?></td>
                    <td>
                        <?php if ($row["Phai"] == "NU"): ?>
                            <img src='images/woman.jpg' alt='Nữ' style='height: 50px;'>
                        <?php elseif ($row["Phai"] == "NAM"): ?>
                            <img src='images/man.jpg' alt='Nam' style='height: 50px;'>
                        <?php else: ?>
                            <?= $row["Phai"] ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $row["Noi_Sinh"] ?></td>
                    <td><?= $row["Ten_Phong"] ?></td>
                    <td><?= $row["Luong"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>