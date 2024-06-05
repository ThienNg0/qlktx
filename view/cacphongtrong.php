<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
// Database connection
 header("Content-type: text/html; charset=utf-8");
 $tenmaychu='localhost';
 $tentaikhoan='root';
 $pass='';
 $csdl='qlktx';
 $conn=mysqli_connect($tenmaychu, $tentaikhoan, $pass, $csdl);
 mysqli_select_db($conn,$csdl);
 mysqli_query($conn,"SET NAMES 'UTF8'");



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT MaPhong, MaKhu FROM phong WHERE SoNguoiHienTai < SoNguoiToiDa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Phòng: " . $row["MaPhong"]. " - Khu: " . $row["MaKhu"]. "<br>";
    }
} else {
    echo "No available rooms";
}
$conn->close();
?>