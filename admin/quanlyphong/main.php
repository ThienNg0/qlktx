<?php 
	include_once('../config/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		
			

		switch ($view) {
			case 'quanlyphong':
				?><h4>Quản Lý Phòng  </h4><hr> <?php 
				include_once('quanlyphong/them.php');
					include_once('quanlyphong/phong.php');
				break;
			case 'thongkephong':
					?><h4>Quản Lý Phòng -> Thống Kê Phòng</h4><hr><?php 
					include_once('quanlyphong/thongkephong.php'); // Tạo trang thống kê phòng và chỉnh sửa đường dẫn này nếu cần thiết
					break;
				
			
			case 'sua':
				?><h4>Quản Lý Phòng -> Cập nhập</h4><hr> <?php 
					include_once('quanlyphong/sua.php');
				break;		
			default:
					
				break;
		}
	}


?>