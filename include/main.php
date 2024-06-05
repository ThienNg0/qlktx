<div class="container-fluid">
    <div class="row">
            <div class="col-md-3 nenbac" style="padding-left: 0;">
                <nav id="menu">
                    <ul>
                        <h3> Sinh Viên </h3>
                        <li><a href="index.php?action=login">Đăng nhập</a></li>
                        <li><a href="index.php?action=capnhapthongtin">Cập Nhập Thông Tin</a></li>
                        <li><a href="index.php?action=dkphong">Đăng Ký Phòng</a></li>
                        <li><a href="index.php?action=chuyenphong">Đăng Ký Chuyển Phòng</a></li>
                        <li><a href="index.php?action=traphong">Trả Phòng</a></li>
                        <li><a href="index.php?action=tracucphong">Tra cứu Phòng</a></li>
                        <li><a href="index.php?action=phongdango">Xem Phòng Đang Ở</a></li>
                        <li><a href="index.php?action=xemthongbao">Xem Thông Báo</a></li>
                        <li><a href="index.php?action=logout">Đăng Xuất</a></li>
                    </ul>
                </nav>
            </div>
        <div class="col-md-7">
            <?php include_once('include/content.php'); ?>
        </div>
        <div class="col-md-2 nenbac">
            <div>
                <img src="images/logo.png" width="200" alt="Activities Board">
                <center>
                    <h2><a href="https://huit.edu.vn/" class="no_underline">Tin tức HUIT</a></h2>
                </center>
                <p class="news_item">Vào Gruop để nhận thêm tin tức từ Khu ....</p>
                <!-- Thêm phần danh sách liên kết nhanh -->
                <ul class="quick-links">
                    <li><a href="#"> Nhóm Khu A</a></li>
                    <li><a href="#"> Nhóm Khu B</a></li>
                    <li><a href="#"> Nhóm Khu C</a></li>
                    <li><a href="#"> Nhóm Khu D</a></li>
                </ul>
                <!-- Hoặc thêm phần thông tin liên hệ -->
                <div class="contact-info">
                    <h3>Thông tin liên hệ</h3>
                    <p>Địa chỉ: 140 Lê Trọng Tấn</p>
                    <p>Email: admin@gmail.com</p>
                    <p>Điện thoại: 0123-456-789</p>
                </div>
            </div>
        </div>
    </div>
</div>
