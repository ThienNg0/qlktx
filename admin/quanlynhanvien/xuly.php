<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
session_start();
include_once('../../config/database.php');
if(isset($_GET['action'])){
	$action=$_GET['action'];
	switch ($action) {
    case 'them':
        $manv=$_GET['manv'];
        $ten=$_GET['ten'];
        $ns=$_GET['ns'];
        $dc=$_GET['dc'];
        $sdt=$_GET['sdt'];
        $mk=$_GET['pass'];
        $q=$_GET['q'];
        $sql="insert into nhanvien(MaNV,HoTen,NgaySinh,DiaChi,SDT,MatKhau,Quyen) value('$manv','$ten','$ns','$dc','$sdt','$mk','$q')" ;
        $rs=mysqli_query($conn,$sql);
          if($rs){
                    header('location:../index.php?action=nhanvien&view=all&thongbao=them');
          }
        break;
		case 'capnhap':
  			$manv=$_GET['manv'];
        $ten=$_GET['ten'];
        $ns=$_GET['ns'];
        $dc=$_GET['dc'];
        $sdt=$_GET['sdt'];
        $q=$_GET['q'];
        $sql="update nhanvien set HoTen='$ten', NgaySinh='$ns',DiaChi='$dc',SDT='$sdt',Quyen='$q' where MaNV='$manv'" ;
        $rs=mysqli_query($conn,$sql);
          if($rs){
          					header('location:../index.php?action=nhanvien&view=all&thongbao=sua');
          }
  			break;  
    case 'xoa':
        $manv=$_GET['manv'];
        $sql="delete from nhanvien where MaNV='$manv'";
        $rs=mysqli_query($conn,$sql);
        if($rs){

               header('location:../index.php?action=nhanvien&view=all&thongbao=xoa');
        }
      break;

		default:
			# code...
			break;
	}
}


?>