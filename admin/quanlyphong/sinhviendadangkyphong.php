<?php
// Assuming you have a database connection $conn
include_once('../../config/database.php');

// Check if the 'type' parameter is set and valid
if (isset($_GET['type']) && ($_GET['type'] === 'registered')) {
    $title = 'Danh sách sinh viên đã đăng ký';
    
    // If there's a search query, add it to the SQL query
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $sql = "SELECT DISTINCT sinhvien.MaSV, sinhvien.HoTen, sinhvien.GioiTinh, sinhvien.NgaySinh, chitietdangky.MaPhong 
                FROM sinhvien 
                JOIN chitietdangky ON sinhvien.MaSV = chitietdangky.MaSV
                WHERE sinhvien.MaSV LIKE '%$search%' OR sinhvien.HoTen LIKE '%$search%'";
    } else {
        $sql = "SELECT DISTINCT sinhvien.MaSV, sinhvien.HoTen, sinhvien.GioiTinh, sinhvien.NgaySinh, chitietdangky.MaPhong 
                FROM sinhvien 
                JOIN chitietdangky ON sinhvien.MaSV = chitietdangky.MaSV";
    }
} else {
    // Invalid or missing 'type' parameter, redirect back to the previous page
    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS if any -->
    <link rel="stylesheet" href="path/to/your/css/file.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center"><?php echo $title; ?></h1>

        <!-- Search Form -->
        <form method="GET" action="" class="form-inline justify-content-center mb-4">
    <input type="hidden" name="type" value="registered">
    <div class="form-group mx-sm-3 mb-2">
        <label for="search" class="sr-only">Search</label>
        <input type="text" class="form-control" id="search" name="search" placeholder="Nhập mã Sinh Viên muốn tìm" style="width: 250px;" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Search</button>
</form>


        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã SV</th>
                        <th>Tên SV</th>
                        <th>Giới Tính</th>
                        <th>Ngày Sinh</th>
                        <th>Phòng Đang Ở</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>

                <div class="text-right mb-3">
                    <a href="xuatfilesvdadangky.php?type=registered" class="btn btn-success">Export to Excel</a>
                </div>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['MaSV']; ?></td>
                            <td><?php echo $row['HoTen']; ?></td>
                            <td><?php echo $row['GioiTinh']; ?></td>
                            <td><?php echo $row['NgaySinh']; ?></td>
                            <td><?php echo $row['MaPhong']; ?></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5