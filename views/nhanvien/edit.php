<form action="?controller=nhanvien&action=edit" method="post">
    <input type="hidden" name="Ma_NV" value="<?= $nhanvien['Ma_NV'] ?>">

    <label>Tên nhân viên:</label>
    <input type="text" name="Ten_NV" value="<?= $nhanvien['Ten_NV'] ?>" required><br>

    <label>Giới tính:</label>
    <select name="Phai">
        <option value="NAM" <?= $nhanvien['Phai'] == 'NAM' ? 'selected' : '' ?>>Nam</option>
        <option value="NU" <?= $nhanvien['Phai'] == 'NU' ? 'selected' : '' ?>>Nữ</option>
    </select><br>

    <label>Nơi sinh:</label>
    <input type="text" name="Noi_Sinh" value="<?= $nhanvien['Noi_Sinh'] ?>" required><br>

    <label>Mã phòng:</label>
    <input type="text" name="Ma_Phong" value="<?= $nhanvien['Ma_Phong'] ?>"><br>

    <label>Lương:</label>
    <input type="number" name="Luong" value="<?= $nhanvien['Luong'] ?>" required><br>

    <button type="submit">Cập nhật</button>
</form>