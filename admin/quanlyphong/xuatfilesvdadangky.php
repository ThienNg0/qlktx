<?php
// Assuming you have established the database connection
include_once('../../config/database.php');

// Check if the 'type' parameter is set and valid
if (isset($_GET['type']) && ($_GET['type'] === 'registered')) {
    $title = 'Danh sách sinh viên đã đăng ký';
    $sql = "SELECT DISTINCT sinhvien.MaSV, sinhvien.HoTen, sinhvien.GioiTinh, sinhvien.NgaySinh, chitietdangky.MaPhong FROM sinhvien JOIN chitietdangky ON sinhvien.MaSV = chitietdangky.MaSV";
} else {
    // Invalid or missing 'type' parameter, redirect back to the previous page
    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=danhsachsvdadangky.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Output UTF-8 BOM to ensure proper encoding
echo "\xEF\xBB\xBF";

// Create the table headers
echo "Mã SV,";
echo "Tên SV,";
echo "Giới Tính,";
echo "Ngày Sinh,";
echo "Phòng Đang Ở\n";

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['MaSV'] . ",";
    echo $row['HoTen'] . ",";
    echo $row['GioiTinh'] . ",";
    echo $row['NgaySinh'] . ",";
    echo $row['MaPhong'] . "\n";
}

exit();
?>