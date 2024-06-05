
<?php 
	if(isset($_GET['tb'])){
			$tb = $_GET['tb'];
			switch ($tb) {
				case 'ok':
				     echo '<script>alert("success!!!")</script>';
					break;
				case 'loi':
				     echo '<script>alert("Lỗi!!!")</script>';
					break;	
				case 'ok1':
				     echo '<script>alert("Đăng ký thành công. Nhân viên sẽ thông báo sau!!!")</script>';
					break;
				case 'ok2':
				     echo '<script>alert("Đăng ký trả phòng thành công. Nhân viên sẽ kiểm tra và thông báo sau!!!")</script>';
					break;	
				case 'loi1':
				     echo '<script>alert("Vui lòng trả phòng đang ở trước khi đăng ký... Nếu bạn đã đăng ký trước đó vui lòng đợi, nhân viên sẽ thông báo sau !!!")</script>';
					break;
					
				case 'loi2':
				     echo '<script>alert("Lỗi!!!")</script>';
					break;
				case 'loi3':
						$sn=$_GET['sn'];
				     echo '<script>alert("Phòng ('.$sn.' người) đã hết. Vui lòng chọn phòng khác !!!")</script>';
					break;									
				default:
				 
				break;
		}
	}
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		switch ($action) {
			case 'login':
			    include_once('view/login.php');
				break;
			case 'capnhapthongtin':
			    include_once('view/capnhapthongtin.php');
				break;
			case 'dkphong':
			    include_once('view/dangkyphong.php');
				break;
			case 'chuyenphong':
			    include_once('view/dangkychuyenphong.php');
				break;
			case 'traphong':
			    include_once('view/traphong.php');
				break;
			case 'tracucphong':
			    include_once('view/tracuuphong.php');
				break;
			case 'phongdango':
			    include_once('view/phongdango.php');
				break;
			case 'xemthongbao':
			    include_once('view/thongbao.php');
				break;
			case 'logout':
			    include_once('view/logout.php');
				break;
			default:
				 include_once('view/main.php');
				break;
		}
	}
	else
	{
		include_once('view/main.php');
	}
	
?>