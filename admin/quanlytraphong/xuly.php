<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
session_start();
include_once('../../config/database.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date1=getdate(); $ngay1=$date1['year']."-".$date1['mon']."-".($date1['mday']);
if(isset($_GET['action'])){
	$action=$_GET['action'];
	switch ($action) {
		case 'duyet':
			$madk=$_GET['madk'];
			$admin=$_SESSION['nv_admin'];$manv=$admin['MaNV'];
        $sql="update phong set SoNguoiHienTai=(SoNguoiHienTai -1) where MaPhong=(select MaPhong from chitietdangky where MaDK=$madk)";
        $rs=mysqli_query($conn,$sql);
        if($rs){
              $sql="update chitietdangky set TinhTrang='đã duyệt'";
              $rs=mysqli_query($conn,$sql);
              if($rs){
        				$sql1="select * from chitietdangky where MaDK=$madk";
        				$rs1=mysqli_query($conn,$sql1);
        				$row1=mysqli_fetch_array($rs1);
        				$masv=$row1['MaSV']; $manv=$row1['MaNV'];$map=$row1['MaPhong'];
        				date_default_timezone_set('Asia/Ho_Chi_Minh');
        				$date=getdate();
        				$ngay=$date['year']."-".$date['mon']."-".($date['mday']+3)." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
        				$td="Thông Báo Trả Phòng Ký Túc Xá";
        				$nd="Bạn đã Trả phòng thành công. Xin Cảm ơn !!!";
        				
        				$sql2="INSERT INTO `thongbao`(`MaSV`, `MaNV`, `TieuDe`, `NoiDung`, `LoaiTB`) VALUES ($masv,'$manv','$td','$nd',N'trả phòng')";
        				$rs2=mysqli_query($conn,$sql2);echo $masv.$manv.$map.$ngay;
        				if($rs2){
                  $sql="update chitietchuyenphong set TinhTrang='đã trả' where MaDK='$madk'";
                  $rs=mysqli_query($conn,$sql);
                  if($rs){
                    header('location:../index.php?action=quanlychuyenphong&view=quanlychuyenphong');
                  }
        						
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