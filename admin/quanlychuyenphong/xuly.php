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
        $sql1="select * from chitietchuyenphong where madk=$madk";
        $rs1=mysqli_query($conn,$sql1);
        $kq=mysqli_fetch_array($rs1);
        if($rs){
            $mapc=$kq['MaPhongChuyen'];
      			$sql="update chitietdangky set MaPhong='$mapc' where MaDK=$madk";
      			$rs=mysqli_query($conn,$sql);
      			if($rs){
              $sql="update chitietchuyenphong set TinhTrang='đã duyệt', NgayChuyen='$ngay1' where MaDK=$madk";
              $rs=mysqli_query($conn,$sql);
              if($rs){
        				$sql1="select * from chitietdangky where MaDK=$madk";
        				$rs1=mysqli_query($conn,$sql1);
        				$row1=mysqli_fetch_array($rs1);
        				$masv=$row1['MaSV']; $manv=$row1['MaNV'];$map=$row1['MaPhong'];
        				date_default_timezone_set('Asia/Ho_Chi_Minh');
        				$date=getdate();
        				$ngay=$date['year']."-".$date['mon']."-".($date['mday']+3)." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
        				$td="Thông Báo Chuyển Phòng Ký Túc Xá";
        				$nd="Bạn đã chuyển phòng thành công ! Phòng : ".$map.". Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày ".$ngay. ". Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!";
        				
        				$sql2="INSERT INTO `thongbao`(`MaSV`, `MaNV`, `TieuDe`, `NoiDung`, `LoaiTB`) VALUES ($masv,'$manv','$td','$nd',N'chuyển phòng')";
        				$rs2=mysqli_query($conn,$sql2);echo $masv.$manv.$map.$ngay;
        				if($rs2){
        					header('location:../index.php?action=quanlychuyenphong&view=quanlychuyenphong');

        				}		
        			}
            }
        }
			break;
		  
      case 'xoa':
      $madk=$_GET['madk'];
      $admin=$_SESSION['nv_admin'];$manv=$admin['MaNV'];
        $sql="update phong set SoNguoiHienTai=(SoNguoiHienTai -1) where MaPhong=(select MaPhongChuyen from chitietchuyenphong where MaDK=$madk)";
        $rs=mysqli_query($conn,$sql);
        echo "ok";
        if($rs){

            $sql="update chitietchuyenphong set MaPhongChuyen=NULL ,TinhTrang=NULL, LanChuyen=(LanChuyen-1) where MaDK=$madk";
            $rs=mysqli_query($conn,$sql);echo 'ok';
            if($rs){
              echo "ok";
              $sql1="select * from chitietdangky where MaDK=$madk";
              $rs1=mysqli_query($conn,$sql1);
              $row1=mysqli_fetch_array($rs1);
              $masv=$row1['MaSV']; $manv=$row1['MaNV'];$map=$row1['MaPhong'];
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $date=getdate();
              $ngay=$date['year']."-".$date['mon']."-".($date['mday']+3)." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
              $td="Thông Báo Chuyển Phòng Ký Túc Xá";
              $nd="Chuyển Phòng của bạn đã bị hủy. vui lòng lên gặp Nhân viên Ký túc xá để biết thêm chi tiết. Xin cảm ơn !!!";
              
              $sql2="INSERT INTO `thongbao`(`MaSV`, `MaNV`, `TieuDe`, `NoiDung`, `LoaiTB`) VALUES ($masv,'$manv','$td','$nd',N'chuyển phòng')";
              $rs2=mysqli_query($conn,$sql2);echo $masv.$manv.$map.$ngay;
              if($rs2){
                header('location:../index.php?action=quanlychuyenphong&view=quanlychuyenphong');

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