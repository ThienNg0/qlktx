<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
	if(isset($_POST['trap'])){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	  	$date=getdate(); $ngay=$date['year']."-".$date['mon']."-".($date['mday']);
		$masv=$_POST['masv'];
		$sql="select * from chitietdangky where MaSV='$masv' and NgayTraPhong is null and TinhTrang='đã duyệt'";
		$rs=mysqli_query($conn,$sql);
		$dem=mysqli_num_rows($rs);
		$row=mysqli_fetch_array($rs);
		$madk=$row['MaDK'];
		if($dem==1){
			$sql="update chitietdangky set NgayTraPhong ='$ngay', TinhTrang=N'chưa duyệt' where MaDK='$madk'";
			$rs=mysqli_query($conn,$sql);
			if(isset($rs)){
				header('location:../index.php?action=&tb=ok2');
			}
			else{
				header('location:../index.php?action=&tb=loi2');
			}
		}else{
				header('location:../index.php?action=&tb=loi2');
			}	
	}else {
		header('location:../index.php?action=&tb=loi2');
	}


?>