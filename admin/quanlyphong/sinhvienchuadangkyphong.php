<?php
include_once('../../config/database.php');

if (isset($_GET['type']) && ($_GET['type'] === 'unregistered')) {
    $title = 'Danh sách sinh viên chưa đăng ký phòng';
    
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-4"><?php echo $title; ?></h1>

        <!-- Search Form -->
        <form method="GET" action="" class="form-inline justify-content-center mb-4">
            <input type="hidden" name="type" value="unregistered">
            <div class="form-group mx-sm-3 mb-2">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Nhập Mã SV hoặc tên SV" value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        </form>

        <!-- Export to Excel Button -->
        <div class="text-right mb-3">
            <a href="xuatfilesvchuadangky.php?type=unregistered&search=<?php echo urlencode($search); ?>" class="btn btn-success">Export to Excel</a>
        </div>

        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Mã SV</th>
                    <th>Tên SV</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['MaSV']; ?></td>
                            <td><?php echo $row['HoTen']; ?></td>
                            <td><?php echo $row['GioiTinh']; ?></td>
                            <td><?php echo $row['NgaySinh']; ?></td>
                        </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Không tìm thấy bản ghi nào phù hợp</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
