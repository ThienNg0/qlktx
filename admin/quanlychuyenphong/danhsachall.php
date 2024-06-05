<?php
$sql = "SELECT * FROM chitietchuyenphong WHERE TinhTrang='đã duyệt' ORDER BY NgayDangKy DESC";
$rs = mysqli_query($conn, $sql);
if (!$rs) {
    echo "Query execution failed: " . mysqli_error($conn);
} else {
    $numRows = mysqli_num_rows($rs);
    echo "Số phòng đã duyệt: " . $numRows;
}
?>
<table class="table table-hover m-auto text-center" style="font-size: 13px;">
    <thead class="badge-info">
        <tr>
            <th>Mã Chuyển Phòng</th>
            <th>Mã Sinh Viên</th>
            <th>Mã Phòng Cũ</th>
            <th>Mã Phòng Mới</th>
            <th>Lý do</th>
            <th>Ngày Chuyển</th>
            <th>Tình trạng</th>
            <th>Chi Tiết</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        while ($row = mysqli_fetch_array($rs)) {
            $masv = $row['MaSV'];
            $mapCu = $row['MaPhongChuyen'];
            $mapMoi = $row['MaPhongO'];

            // Query to get student details
            $sql2 = "SELECT * FROM sinhvien WHERE MaSV='$masv'";
            $rs2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($rs2);

            // Query to get old room details
            $sql12 = "SELECT * FROM phong WHERE MaPhong='$mapCu'";
            $rs12 = mysqli_query($conn, $sql12);
            $row12Cu = mysqli_fetch_array($rs12);

            // Query to get new room details
            $sql13 = "SELECT * FROM phong WHERE MaPhong='$mapMoi'";
            $rs13 = mysqli_query($conn, $sql13);
            $row12Moi = mysqli_fetch_array($rs13);
        ?>
        <tr>
            <td><?php echo $row['MaDK']; ?></td>
            <td title="<?php echo $row2['HoTen']; ?>"><?php echo $row['MaSV']; ?></td>
            <td title="<?php echo 'Phòng '.$row12Cu['SoNguoiToiDa'].' Người'; ?>"><?php echo $row['MaPhongChuyen']; ?></td>
            <td title="<?php echo 'Phòng '.$row12Moi['SoNguoiToiDa'].' Người'; ?>"><?php echo $row['MaPhongO']; ?></td>
            <td><?php echo $row['Lydo']; ?></td>
            <td><?php echo $row['NgayDangKy']; ?></td>
            <td><?php echo $row['TinhTrang']; ?></td>
            <td><a href="index.php?action=quanlychuyenphong&view=chitietchuyenphong&machuyenphong=<?php echo $row['MaDK']; ?>">Detail</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>