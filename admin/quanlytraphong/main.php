<?php 
	include_once('../config/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'quanlytraphong':
				?><h4>Quản Lý Đăng Ký Trả Phòng -> Xử Lý Trả Ký </h4><hr> <?php 
					include_once('quanlytraphong/danhsachdangky.php');
				break;
			case 'chitietdangky':
				?><h4>Quản Lý Đăng Ký Phòng -> Xử Lý Đăng Ký -> Chi Tiết Đăng Ký</h4><hr> <?php 
					include_once('quanlytraphong/chitietdangky.php');
				break;
				case 'danhsachall':
				?><h4>Quản Lý Đăng Ký Trả Phòng -> Danh Sách Đã Xử Lý</h4><hr> <?php 
					include_once('quanlytraphong/danhsachall.php');	
			default:
					
				break;
		}
	}
	else{
		include_once('dondathang/dondathang.php');
	}
	

?>