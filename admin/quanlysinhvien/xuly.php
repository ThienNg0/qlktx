<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once('../../config/database.php');

// Hàm đảm bảo thư mục tồn tại
function ensure_directory_exists($dir) {
    if (!is_dir($dir)) {
        if (!mkdir($dir, 0777, true)) {
            die("Không thể tạo thư mục...");
        }
    }
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'them':
            $masv = $_POST['masv'];
            $ten = $_POST['ten'];
            $ns = $_POST['ns'];
            $gt = $_POST['gt'];
            $dc = $_POST['dc'];
            $sdt = $_POST['sdt'];
            $mk = $_POST['mk'];

            // Xử lý tải ảnh lên
            $target_dir = "images/";
            ensure_directory_exists($target_dir);
            $target_file = $target_dir . basename($_FILES["anh"]["name"]);

            if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                $target_file_with_folder = basename($_FILES["anh"]["name"]);
                $sql = "INSERT INTO sinhvien (MaSV, HoTen, NgaySinh, GioiTinh, DiaChi, SDT, MatKhau, Anh) VALUES ('$masv', '$ten', '$ns', '$gt', '$dc', '$sdt', '$mk', '$target_file_with_folder')";
                $rs = mysqli_query($conn, $sql);
                if ($rs) {
                    header('Location: ../index.php?action=sinhvien&view=all&thongbao=them');
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            } else {
                echo "Xin lỗi, đã xảy ra lỗi khi tải tệp của bạn.";
            }
            break;

        case 'capnhap':
            $masv = $_REQUEST['masv'];
            $ten = $_POST['ten'];
            $ns = $_POST['ns'];
            $gt = $_POST['gt'];
            $dc = $_POST['dc'];
            $sdt = $_POST['sdt'];

            // Xử lý tải ảnh lên
            $target_dir = "images/";
            ensure_directory_exists($target_dir);
            $target_file = $target_dir . basename($_FILES["anh"]["name"]);

            if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                $target_file_with_folder = basename($_FILES["anh"]["name"]);
                $sql = "UPDATE sinhvien SET HoTen='$ten', NgaySinh='$ns', DiaChi='$dc', SDT='$sdt', GioiTinh='$gt', Anh='$target_file_with_folder' WHERE MaSV='$masv'";
            } else {
                $sql = "UPDATE sinhvien SET HoTen='$ten', NgaySinh='$ns', DiaChi='$dc', SDT='$sdt', GioiTinh='$gt' WHERE MaSV='$masv'";
            }

            $rs = mysqli_query($conn, $sql);
            if ($rs) {
                header('Location: ../index.php?action=sinhvien&view=all&thongbao=sua');
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
            break;

        case 'xoa':
            $masv = $_POST['masv'];
            $sql = "DELETE FROM sinhvien WHERE MaSV = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $masv);

            if ($stmt->execute()) {
                header('Location: ../index.php?action=sinhvien&view=all&thongbao=xoa');
            } else {
                echo "Lỗi: " . $stmt->error;
            }

            $stmt->close();
            break;

        default:
            echo "Hành động không hợp lệ: $action";
            break;
    }
} else {
    echo "Không có hành động nào được chỉ định";
}
?>
