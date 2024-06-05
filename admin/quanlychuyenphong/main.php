<?php 
	include_once('../config/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'quanlychuyenphong':
				?><h4>Quản Lý Đăng Ký chuyển Phòng -> Xử Lý Đăng Ký </h4><hr> <?php 
					include_once('quanlychuyenphong/danhsachdangky.php');
				break;
			case 'chitietdangky':
				?><h4>Quản Lý Đăng Ký Phòng -> Xử Lý Đăng Ký -> Chi Tiết Đăng Ký</h4><hr> <?php 
					include_once('quanlychuyenphong/chitietdangky.php');
				break;	
			case 'danhsachall':
				?><h4>Quản Lý Đăng Ký chuyển Phòng -> Danh Sách Đã Xử Lý</h4><hr> <?php 
					include_once('quanlychuyenphong/danhsachall.php');
				break;
			default:
					
				break;
		}
	}
	else{
		include_once('dondathang/dondathang.php');
	}
	

?>