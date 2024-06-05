<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = getdate();
$ngay = $date['year'] . "-" . $date['mon'] . "-" . ($date['mday']);
if (isset($_POST['dangkychuyenphong'])) {
    $masv = $_POST["masv"];
    $sql1 = "SELECT MaSV, MaDK, MaPhong FROM chitietdangky WHERE MaSV = $masv AND (MaNV IS NOT NULL AND NgayDangKy IS NOT NULL AND TinhTrang = 'đã duyệt' AND NgayTraPhong IS NULL)";
    $rs1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($rs1);
    if ($row) {
        $madk = $row['MaDK'];
        $sql = "SELECT * FROM chitietchuyenphong WHERE MaSV = $masv AND (TinhTrang = 'đã duyệt' OR TinhTrang IS NULL)";
        $rs = mysqli_query($conn, $sql);
        $dem = mysqli_num_rows($rs);
        $map1 = $row['MaPhong'];
        if ($dem > 0) {
            // Tiếp tục xử lý đăng ký chuyển phòng
            $masv = $_POST["masv"];
            $sno = $_POST['sno'];
            $lydo = $_POST['lydo'];
            $pdo = $_POST['phongdo'];
            // Kiểm tra giới tính để tìm khu theo giới tính
            $sql = "SELECT * FROM sinhvien WHERE MaSV = $masv";
            $rs = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($rs);
            if ($row['GioiTinh'] === 'Nam') {
                // Tìm khu theo giới tính Nam
                $sql1 = "SELECT MaKhu FROM khu WHERE Sex = 'Nam'";
                $rs1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($rs1);
                $makhu = $row1['MaKhu'];
                // Tìm phòng cho sinh viên
                $sql2 = "SELECT MaPhong FROM phong WHERE MaKhu = '$makhu' AND MaPhong != '$pdo' AND SoNguoiToiDa = $sno AND (SoNguoiHienTai < SoNguoiToiDa) ORDER BY SoNguoiHienTai DESC LIMIT 1";
                $rs2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($rs2);
                $map = $row2['MaPhong'];
                // Thêm sinh viên vào phòng và cập nhật số người trong phòng
                $sql3 = "UPDATE chitietchuyenphong SET MaPhongO = '$map1', MaPhongChuyen = '$map', Lydo = '$lydo', TinhTrang = N'chưa duyệt', NgayDangKy = '$ngay', LanChuyen = (LanChuyen + 1) WHERE MaDK = '$madk'";
                $rs3 = mysqli_query($conn, $sql3);
                if ($rs3) {
                    $sql4 = "UPDATE phong SET SoNguoiHienTai = (SoNguoiHienTai + 1) WHERE MaPhong = '$map'";
                    $rs4 = mysqli_query($conn, $sql4);
                    header('location:../index.php?action=&tb=ok1');
                }
            } elseif ($row['GioiTinh'] === 'Nu') {
                // Tìm khu theo giới tính Nữ
                $sql1 = "SELECT MaKhu FROM khu WHERE Sex = 'Nu'";
                $rs1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($rs1);
                $makhu = $row1['MaKhu'];
                // Tìm phòng cho sinh viên
                $sql2 = "SELECT MaPhong FROM phong WHERE MaKhu = '$makhu' AND MaPhong != '$pdo' AND SoNguoiToiDa = $sno AND (SoNguoiHienTai < SoNguoiToiDa) ORDER BY SoNguoiHienTai DESC LIMIT 1";
                $rs2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($rs2);
                $map = $row2['MaPhong'];
                // Thêm sinh viên vào phòng và cập nhật số người trong phòng
                $sql3 = "UPDATE chitietchuyenphong SET MaPhongO = '$map1', MaPhongChuyen = '$map', Lydo = '$lydo', TinhTrang = N'chưa duyệt', NgayDangKy = '$ngay', LanChuyen = (LanChuyen + 1) WHERE MaDK = '$madk'";
                $rs3 = mysqli_query($conn, $sql3);
                if ($rs3) {
                    $sql4 = "UPDATE phong SET SoNguoiHienTai = (SoNguoiHienTai + 1) WHERE MaPhong = '$map'";
                    $rs4 = mysqli_query($conn, $sql4);
                    header('location:../index.php?action=&tb=ok1');
                }
            }
        } else {
            header('location:../index.php?action=&tb=loi');
        }
    } else {
        header('location:../index.php?action=&tb=loi2');
		
    }
}
?>