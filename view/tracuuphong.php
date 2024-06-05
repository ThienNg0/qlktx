<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
    // Create SQL query to get all areas
    $sql = "SELECT * FROM khu";
    $result = mysqli_query($conn, $sql);

    // Loop through each area
    while ($area = mysqli_fetch_array($result)) {
        $areaCode = $area['MaKhu'];
        $sex = $area['Sex'];
        
        echo "<h4>Khu: {$areaCode} ({$sex})</h4>";
        echo "<table class='table table-hover text-center' style='font-size: 90%'>";
        echo "<thead class='badge-info'>";
        echo "<tr>";
        echo "<th>Mã Phòng</th>";
        echo "<th>Mã Khu</th>";
        echo "<th>Số Người Tối Đa</th>";
        echo "<th>Số Người Hiện Tại</th>";
        echo "</tr>";
        echo "</thead>";

        // Create SQL query to get the rooms in the area that can be registered
        $sql1 = "SELECT * FROM phong WHERE MaKhu = '{$areaCode}' AND SoNguoiHienTai < SoNguoiToiDa";
        $result1 = mysqli_query($conn, $sql1);

        // Loop through the rooms in the area
        while ($room = mysqli_fetch_array($result1)) {
            $roomCode = $room['MaPhong'];
            $maxOccupancy = $room['SoNguoiToiDa'];
            $currentOccupancy = $room['SoNguoiHienTai'];

            echo "<tbody>";
            echo "<tr>";
            echo "<td>{$roomCode}</td>";
            echo "<td>{$areaCode}</td>";
            echo "<td>{$maxOccupancy}</td>";
            echo "<td>{$currentOccupancy}</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    }
?>