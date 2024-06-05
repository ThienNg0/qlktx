<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
session_start();
include_once('../../config/database.php');

if(isset($_GET['action'])){
	$action=$_GET['action'];
	switch ($action) {
		case 'duyet':
			$madk=$_GET['madk'];
			$admin=$_SESSION['nv_admin'];$manv=$admin['MaNV'];
  			$sql="update chitietdangky set MaNV = '$manv', TinhTrang='Đã duyệt' where MaDK=$madk";
  			$rs=mysqli_query($conn,$sql);
  			if($rs){
  				$sql1="select * from chitietdangky where MaDK=$madk";
  				$rs1=mysqli_query($conn,$sql1);
  				$row1=mysqli_fetch_array($rs1);
  				$masv=$row1['MaSV']; $manv=$row1['MaNV'];$map=$row1['MaPhong'];
  				date_default_timezone_set('Asia/Ho_Chi_Minh');
  				$date=getdate();
  				$ngay=$date['year']."-".$date['mon']."-".($date['mday']+3)." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
  				$td="Thông Báo Đăng Ký Phòng Ký Túc Xá";
  				$nd="Bạn đã đăng ký thành công ! Phòng : ".$map.". Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày ".$ngay. ". Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!";
  				
  				$sql2="INSERT INTO `thongbao`(`MaSV`, `MaNV`, `TieuDe`, `NoiDung`, `LoaiTB`) VALUES ($masv,'$manv','$td','$nd',N'đăng ký')";
  				$rs2=mysqli_query($conn,$sql2);echo $masv.$manv.$map.$ngay;
  				if($rs2){
            $sql="INSERT INTO `chitietchuyenphong`(`MaDK`, `MaSV`,MaPhongO,`LanChuyen`) VALUES($madk,$masv,'$map',0)";
            $rs=mysqli_query($conn,$sql);
            if($rs){
  					 header('location:../index.php?action=quanlydangkyphong&view=quanlydangkyphong');
            }
  				}		
  			}
			break;
		
		default:
			# code...
			break;
	}
}


?>