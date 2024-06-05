<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['sv_login'])) {
    $sv = $_SESSION['sv_login'];
    $masv = $sv['MaSV'];
    $sql2 = "select * from chitietdangky where MaSV=$masv and NgayTraPhong is null and TinhTrang='đã duyệt'";
    $rs2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($rs2);

    if ($row2) {
        ?>
        <div class="row">
            <div class="col-sm-12 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Trả Phòng KÝ TÚC XÁ</h5>
                        <hr>
                        <form class="col-md-12 m-auto" action="xuly/main.php?action=traphong" method="POST">
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="masv">Mã sinh viên</label>
                                    <label class="form-control"><?php echo $sv['MaSV']; ?></label>
                                    <input hidden name="masv" value="<?php echo $sv['MaSV'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="hoten">Họ và tên</label>
                                    <label class="form-control"><?php echo $sv['HoTen']; ?> </label>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="phong">Phòng Đang Ở</label>
                                    <label class="form-control"><?php echo $row2['MaPhong']; ?></label>
                                </div>
                            </div>

                            <div class="form-group">

                                <label> <span style="color: red;font-size: 25px;">*</span>Lưu ý : Bạn sẽ không được nhận lại tiền dư khi trả phòng trước thời hạn. Nhân viên ký túc xá sẽ kiểm tra lại tài sản trước khi cho bạn trả phòng. Hệ thống sẽ gửi thông báo sau !</label>
                            </div>
                            <hr>
                            <button type="submit" name="trap" class="btn btn-lg btn-primary btn-block text-uppercase ">Trả Phòng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-warning text-center' role='alert'>Bạn chưa đăng ký phòng hoặc đăng ký của bạn chưa được duyệt</div>";
    }
}
?>