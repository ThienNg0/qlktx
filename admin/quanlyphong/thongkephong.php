<?php
// Khởi tạo biến để đếm tổng số sinh viên
$totalMaleStudents = 0;
$totalFemaleStudents = 0;
$totalRegisteredMaleStudents = 0;
$totalRegisteredFemaleStudents = 0;
$totalRegisteredStudents = 0;
$totalUnregisteredStudents = 0;

// Initialize the variables as arrays if not already set
$registeredStudents = $registeredStudents ?? [];
$unregisteredStudents = $unregisteredStudents ?? [];

// Truy vấn để lấy dữ liệu từ bảng 'sinhvien'
$sql2 = "SELECT * FROM sinhvien";
$rs2 = mysqli_query($conn, $sql2);
while ($row2 = mysqli_fetch_array($rs2)) {
    if (isset($row2['GioiTinh'])) {
        if ($row2['GioiTinh'] == 'Nam') {
            $totalMaleStudents++;
        } else {
            $totalFemaleStudents++;
        }
    }

    // Truy vấn để kiểm tra xem sinh viên đã đăng ký trong bảng 'chitietdangky'
    $sql3 = "SELECT COUNT(DISTINCT MaSV) AS total FROM chitietdangky WHERE MaSV = {$row2['MaSV']}";
    $rs3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($rs3);
    $totalRegistered = $row3['total'];

    if ($totalRegistered > 0) {
        $totalRegisteredStudents++;
        if ($row2['GioiTinh'] == 'Nam') {
            $totalRegisteredMaleStudents++;
        } else {
            $totalRegisteredFemaleStudents++;
        }
    } else {
        $totalUnregisteredStudents++;
    }
}
?>

<table class="table table-hover text-center" style="font-size: 90%">
    <thead class="badge-info">
        <tr>
            <th>Tổng số sinh viên đã đăng ký</th>
            <th>Nam</th>
            <th>Nữ</th>
            <th>Tổng số sinh viên chưa đăng ký</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="quanlyphong/sinhviendadangkyphong.php?type=registered"><?php echo $totalRegisteredStudents; ?></a></td>
            <td><?php echo $totalRegisteredMaleStudents; ?></td>
            <td><?php echo $totalRegisteredFemaleStudents; ?></td>
            <td><a href="quanlyphong/sinhvienchuadangkyphong.php?type=unregistered"><?php echo $totalUnregisteredStudents; ?></a></td>
        </tr>
    </tbody>
</table>