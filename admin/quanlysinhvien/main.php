<?php 
	include_once('../config/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'all':
				?><h4>Quản Lý Nhân Viên  </h4><hr> <?php 
					include_once('quanlysinhvien/them.php');
					include_once('quanlysinhvien/hoso.php');
				break;
			
			case 'sua':
				?><h4>Quản Lý Phòng -> Cập nhập</h4><hr> <?php 
					include_once('quanlysinhvien/sua.php');
				break;		
			default:
					
				break;
		}
	}


?>