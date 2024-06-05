<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
    if(isset($_POST['sv_capnhaptt'])){
        $masv = $_POST['masv'];
        $ns = $_POST['ns'];
        $dc = $_POST['dc'];
        $sdt = $_POST['sdt'];
        $pass = $_POST['pass'];
        
        // Kiểm tra nếu mật khẩu được nhập
        if(!empty($pass)){
            // Cập nhật thông tin sinh viên và mật khẩu
            $sql = "UPDATE `sinhvien` SET NgaySinh='$ns', DiaChi='$dc', SDT=$sdt, MatKhau='$pass' WHERE MaSV=$masv";
            $rs = mysqli_query($conn, $sql);

            if($rs){
                header('location: ../index.php?action=capnhapthongtin&tb=ok');
                exit; // Dừng việc thực thi mã PHP sau khi chuyển hướng trang
            } else {
                header('location: ../index.php?action=capnhapthongtin&tb=loi');
                exit;
            }
        } else {
            // Nếu mật khẩu không được nhập, chỉ cập nhật thông tin sinh viên
            $sql = "UPDATE `sinhvien` SET NgaySinh='$ns', DiaChi='$dc', SDT=$sdt WHERE MaSV=$masv";
            $rs = mysqli_query($conn, $sql);

            if($rs){
                header('location: ../index.php?action=capnhapthongtin&tb=ok');
                exit;
            } else {
                header('location: ../index.php?action=capnhapthongtin&tb=loi');
                exit;
            }
        }
    }
?>