<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
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

        .pagination a {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            text-decoration: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
        }

        .pagination a.active {
            background: #0056b3;
        }

        .dark-mode {
            background-color: #222;
            color: #fff;
        }

        .dark-mode table {
            background: #333;
            color: #fff;
        }

        .dark-mode th {
            background-color: #444;
        }

        .dark-mode .pagination a {
            background: #444;
        }

        .dark-mode .pagination a.active {
            background: #666;
        }

        #toggle-dark-mode {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 8px 15px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <button id="toggle-dark-mode">Dark Mode</button>

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
                            <img src='/kiemtra/images/woman.jpg' alt='👩' style='height: 50px;'>
                        <?php elseif ($row["Phai"] == "NAM"): ?>
                            <img src='/kiemtra/images/man.jpg' alt='👨' style='height: 50px;'>
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

    <script>
        const toggleBtn = document.getElementById('toggle-dark-mode');
        toggleBtn.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode') ? 'enabled' : 'disabled');
        });

        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
        }
    </script>

</body>

</html>