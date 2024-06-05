<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
session_start();
include_once('../../config/database.php');
if(isset($_GET['action'])){
	$action=$_GET['action'];
	switch ($action) {
		case 'sua':
			$mk=$_GET['mk'];
      $tk=$_GET['tk'];
      $gt=$_GET['gt'];
        $sql="update Khu set TenKhu='$tk', Sex='$gt' where MaKhu='$mk'" ;
        $rs=mysqli_query($conn,$sql);
        if($rs){
        					header('location:../index.php?action=khu&view=khu&thongbao=sua');
        }
			break;
		  
      case 'xoa':
     $mk=$_GET['mk'];;
        $sql="delete from khu where MaKhu='$mp'";
        $rs=mysqli_query($conn,$sql);
        if($rs){

               header('location:../index.php?action=khu&view=khu&thongbao=xoa');
        }
      break;

    case 'them':
      $mk=$_GET['mk'];
      $tk=$_GET['tk'];
      $gt=$_GET['gt'];
        $sql="insert into khu( MaKhu, TenKhu, Sex ) values('$mk','$tk','$gt')" ;
        $rs=mysqli_query($conn,$sql);
        if($rs){
                  header('location:../index.php?action=khu&view=khu&thongbao=them');
        }
      break;  
		default:
			# code...
			break;
	}
}


?>