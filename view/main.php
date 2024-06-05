<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .student-info {
        width: 500px;
        border: 1px solid #ccc;
        padding: 30px;
        margin: 20px auto;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        background-color: #fff;
    }

    .student-info h6 {
        margin: 0;
        padding-bottom: 15px;
        border-bottom: 1px solid #ccc;
        color: #333;
    }

    .details p {
        margin: 15px 0;
        color: #666;
    }

    .student-image {
        text-align: center;
        padding-top: 20px;
    }

    .student-image img {
        max-width: 100%;
        height: auto;
    }
</style>

<?php 
if (isset($_SESSION['sv_login'])) {
    $sv = $_SESSION['sv_login'];
?>
    <div class="student-info">
        <h6>Xin chào sinh viên: <?php echo $sv['HoTen']; ?></h6>
        <div class="details">
            <p>MSSV: <?php echo $sv['MaSV']; ?></p>
            <p>Giới Tính: <?php echo $sv['GioiTinh']; ?></p>
            <p>Ngày Sinh: <?php echo $sv['NgaySinh']; ?></p>
            <p>Địa Chỉ: <?php echo $sv['DiaChi']; ?></p>
            <p>Số Điện Thoại: <?php echo $sv['SDT']; ?></p>
        </div>
        <div class="student-image">
            <?php 
            if (file_exists("images/".$sv['Anh'])) {
                echo '<img src="images/'.$sv['Anh'].'" alt="Hình ảnh sinh viên">';
            } else {
                echo "<p>Không có hình ảnh cho sinh viên này.</p>";
            }
            ?>
        </div>
    </div>
<?php 
} else {
    echo "<p>Vui lòng đăng nhập để xem thông tin sinh viên.</p>";
    
}
?>