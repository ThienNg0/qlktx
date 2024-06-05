<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
    if (isset($_SESSION['sv_login'])) {
        $sv = $_SESSION['sv_login'];
        $masv = $sv['MaSV'];
        $sql = "SELECT * FROM sinhvien WHERE MaSV=$masv";
        $rs = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($rs);
    
        // Kiểm tra xem form đã được gửi đi chưa
        if (isset($_POST['sv_capnhaptt'])) {
            // Nếu form đã được gửi đi, hiển thị mật khẩu và ẩn trường nhập mật khẩu
            $pass_visibility = "block";
            $pass_input_visibility = "none";
        } else {
            // Nếu form chưa được gửi đi, ẩn mật khẩu và hiển thị trường nhập mật khẩu
            $pass_visibility = "none";
            $pass_input_visibility = "block";
        }
?>
<div class="cart">
    <div class="col-sm-10  mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Cập nhập thông tin cá nhân</h5>
                <form class="form-signin" action="xuly/main.php?action=capnhapthongtin" method="POST">
                    <div class="form-label-group">
                        <span>Mã sinh viên </span>
                        <input type="text" id="inputText" class="form-control" value="<?php echo $row['MaSV'] ?>" disabled>
                        <input hidden id="inputText" class="form-control" name="masv" value="<?php echo $row['MaSV'] ?>">
                    </div>
                    <hr>
                    <span>Họ và tên </span>
                    <div class="form-label-group">
                        <input type="text" id="inputText" class="form-control" placeholder="Họ và Tên" value="<?php echo $row['HoTen'] ?>" disabled required>
                    </div>
                    <hr>
                    <span>Giới Tính </span>
                    <div class="form-label-group">
                        <input type="text" id="inputText" class="form-control" placeholder="Họ và Tên" value="<?php echo $row['GioiTinh']?>" disabled required>
                    </div>
                    <hr>
                    <span>Ngày sinh </span>
                    <div class="form-label-group">
                        <input type="date" name="ns" max="3000-12-31" min="1000-01-01" class="form-control" value="<?php echo $row['NgaySinh']?>">
                    </div>
                    <hr>
                    <span>Quê quán </span>
                    <div class="form-label-group">
                        <input type="text" id="inputText" class="form-control" name="dc" value="<?php echo $row['DiaChi']?>" required>
                    </div>
                    <hr>
                    <span>Số điện thoại </span>
                    <div class="form-label-group">
                        <input type="text" id="inputText" class="form-control" name="sdt" value="<?php echo $row['SDT']?>" required>
                    </div>
                    <hr>
                    <span>Password </span>
                    <div class="form-label-group" style="display: <?php echo $pass_visibility; ?>;">
                        <input type="text" class="form-control" name="pass" value="<?php echo $row['MatKhau']; ?>" disabled>
                    </div>
                    <div class="form-label-group" style="display: <?php echo $pass_input_visibility; ?>;">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                    
                   
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" name="sv_capnhaptt" type="submit">Cập Nhập</button>
                    <hr class="my-4">
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
    } else {
        header('location:index.php?action=login');
    }
?>
