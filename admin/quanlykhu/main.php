<?php 
	include_once('../config/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'khu':
				?><h4>Quản Lý Khu  </h4><hr> <?php 
					include_once('quanlykhu/them.php');
					include_once('quanlykhu/khu.php');
				break;
			
			case 'sua':
				?><h4>Quản Lý Phòng -> Cập nhập</h4><hr> <?php 
					include_once('quanlykhu/sua.php');
				break;		
			default:
					
				break;
		}
	}


?>