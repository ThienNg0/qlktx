
<?php
$sql = "SELECT * FROM khu";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($rs)) {
    $makhu = $row['MaKhu'];
?>
    <h4>Khu : <?php echo $row['MaKhu'] . ' (' . $row['Sex'] . ')'; ?></h4>
    <table class="table table-hover text-center" style="font-size: 90%">
        <thead class="badge-info">
            <tr>
                <th>Mã Phòng</th>
                <th>Mã Khu</th>
                <th>Số Người Tối Đa</th>
                <th>Số Người Đang Ở</th>
                <th>Giá</th>
                <th colspan="3" class="badge-danger"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql1 = "SELECT * FROM phong WHERE MaKhu ='$makhu'";
            $rs1 = mysqli_query($conn, $sql1);
            $totalOccupants = 0;
            $totalRooms = mysqli_num_rows($rs1);
            $rentedRooms = 0; // Biến đếm số phòng đã được thuê
            while ($row1 = mysqli_fetch_array($rs1)) {
                $totalOccupants += $row1['SoNguoiHienTai'];
                // Kiểm tra xem phòng đã được thuê (có người ở)
                if ($row1['SoNguoiHienTai'] > 0) {
                    $rentedRooms++;
                }
            ?>
                <tr>
                    <td><?php echo $row1['MaPhong'] ?></td>
                    <td><?php echo $row1['MaKhu'] ?></td>
                    <td><?php echo $row1['SoNguoiToiDa'] ?></td>
                    <td><?php echo $row1['SoNguoiHienTai'] ?></td>
                    <td><?php echo number_format($row1['Gia']) . 'đ' ?></td>
                    <td><a href="index.php?action=quanlyphong&view=sua&map=<?php echo  $row1['MaPhong'] ?>">Cập Nhật</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr class="badge-danger">
    <h4>Thống kê cho Khu <?php echo $makhu ?>:</h4>
    <table class="table table-hover text-center" style="font-size: 90%">
        <thead class="badge-info">
            <tr>
                <th>Tổng số người ở</th>
                <th>Tổng số phòng</th>
                <th>Số phòng đã được thuê</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $totalOccupants ?></td>
                <td><?php echo $totalRooms ?></td>
                <td><?php echo $rentedRooms ?></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>
