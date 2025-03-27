<form action="?controller=nhanvien&action=create" method="post">
    <label>Tên nhân viên:</label>
    <input type="text" name="Ten_NV" required><br>

    <label>Giới tính:</label>
    <select name="Phai">
        <option value="NAM">Nam</option>
        <option value="NU">Nữ</option>
    </select><br>

    <label>Nơi sinh:</label>
    <input type="text" name="Noi_Sinh" required><br>

    <label>Mã phòng:</label>
    <input type="number" name="Ma_Phong" required><br>

    <label>Lương:</label>
    <input type="number" name="Luong" required><br>

    <button type="submit">Thêm nhân viên</button>
</form>