<?php
include_once('../../config/database.php');

if (isset($_GET['type']) && ($_GET['type'] === 'unregistered')) {
    // Initialize search variable
    $search = "";

    // If there's a search query, modify the SQL query
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $search_condition = "(MaSV LIKE '%$search%' OR HoTen LIKE '%$search%')";
    } else {
        $search_condition = "1"; // No search query, include all records
    }

    // Construct SQL query
    $sql = "SELECT * FROM sinhvien WHERE MaSV NOT IN (SELECT MaSV FROM chitietdangky) AND $search_condition";
} else {
    // Redirect if 'type' parameter is missing or invalid
    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Set headers for Excel file download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=danhsachsvchuadangky.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Output UTF-8 BOM to ensure proper encoding
echo "\xEF\xBB\xBF";

// Create the table headers
echo "Mã SV\t";
echo "Tên SV\t";
echo "Giới Tính\t";
echo "Ngày Sinh\n";

// Loop through the data and output each row
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['MaSV'] . "\t" . $row['HoTen'] . "\t" . $row['GioiTinh'] . "\t" . $row['NgaySinh'] . "\n";
}

exit();
?>
