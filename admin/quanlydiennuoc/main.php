<?php 
	include_once('../config/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'quanlydiennuoc':
				?><h4>Quản Lý Điện Nước </h4><hr> <?php 
					include_once('quanlydiennuoc/timkiem.php');
				break;
			case 'them':
				?><h4>Quản Lý  Phòng -> Thêm Tiền Điện + Nước </h4><hr> <?php 
					include_once('quanlydiennuoc/them.php');
				break;	
			default:
					
				break;
		}
	}
?>