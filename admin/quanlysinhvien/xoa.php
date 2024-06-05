<?php
include 'config.php'; // Include your database connection file

$masv = $_REQUEST['masv']; // Get the 'masv' value

$sql = "DELETE FROM sinhvien WHERE MaSV = '$masv'"; // SQL query to delete the record

$rs = mysqli_query($conn, $sql); // Execute the query

if ($rs) {
    header('Location: ../index.php?action=sinhvien&view=all&thongbao=xoa'); // Redirect if the deletion was successful
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Display an error message if the query failed
}

mysqli_close($conn); // Close the database connection
?>