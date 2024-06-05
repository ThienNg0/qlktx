<?php
require 'vendor/autoload.php';
include_once('../../config/database.php');

// Khởi tạo session
session_start();

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (isset($_POST['import'])) {
    $file_mimes = array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if (isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['excel_file']['name']);
        $extension = end($arr_file);
        
        if ('csv' == $extension) {
            $reader = IOFactory::createReader('Csv');
        } elseif ('xls' == $extension) {
            $reader = IOFactory::createReader('Xls');
        } else {
            $reader = IOFactory::createReader('Xlsx');
        }

        $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Bỏ qua hàng tiêu đề
        $header = true;

        foreach ($sheetData as $row) {
            if ($header) {
                $header = false;
                continue;
            }

            $masv = $row[0];
            $ten = $row[1];
            $ns = $row[2];
            $gt = $row[3];
            $dc = $row[4];
            $sdt = $row[5];
            $mk = $row[6];
            $anh = $row[7];

            // Chuyển đổi định dạng ngày sinh sang DATE
            $ns_date = DateTime::createFromFormat('d/m/Y', $ns);
            $ns_formatted = $ns_date ? $ns_date->format('Y-m-d') : null;

            $sql = "INSERT INTO sinhvien (MaSV, HoTen, NgaySinh, GioiTinh, DiaChi, SDT, MatKhau, Anh) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss", $masv, $ten, $ns_formatted, $gt, $dc, $sdt, $mk, $anh);
            $stmt->execute();
        }

        // Add success message and redirect back to the previous page
        $_SESSION['message'] = 'Thêm thành công!';
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?action=import_success');
        exit;
    }
}
?>
