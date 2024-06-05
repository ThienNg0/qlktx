<?php	
if(isset($_POST['dangkyphong'])){
	$masv=$_POST["masv"];
//check sinh viên đã đăng ký chưa.
	$sql="select MaSV from chitietdangky where MaSV=$masv   and ((NgayTraPhong is not null and TinhTrang='chưa duyệt') or (NgayTraPhong is null and (TinhTrang='đã duyệt'or TinhTrang='chưa duyệt')))";
	$rs=mysqli_query($conn,$sql);
    $dem=mysqli_num_rows($rs);

    if($dem ==0 ){	
    	$masv=$_POST["masv"]; 
		$sno=$_POST['sno'];
//check giới tính để tìm khu theo giới tính 
		$sql="select * from sinhvien where MaSV=$masv";
	    $rs=mysqli_query($conn,$sql);
	    $row=mysqli_fetch_array($rs); 
	    if($row['GioiTinh']==='Nam'){
//tìm khu theo giới tính Nam
	    	$sql1="select MaKhu from khu where Sex='Nam'";
	    	$rs1=mysqli_query($conn,$sql1); $loi=0;
	    	while ($row1=mysqli_fetch_array($rs1)) {
	    		$makhu=$row1['MaKhu'];
      			echo $makhu;
      			// Tìm phòng cho sinh viên   	
				$sql2="SELECT  MaPhong  from phong where MaKhu = '$makhu' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
				$rs2=mysqli_query($conn,$sql2);
		    	$row2=mysqli_fetch_array($rs2);
		    	$dem2=mysqli_num_rows($rs2);
		    	if($dem2 >= 1){
		    		$map=$row2['MaPhong'];
			    	echo $map;
// thêm sinh viên vào phòng
			    	$sql3="INSERT INTO `chitietdangky`(`MaSV`, `MaPhong`, `TinhTrang`) VALUES ($masv,'$map',N'chưa duyệt')";
			    	$rs3=mysqli_query($conn,$sql3);
			    	if($rs3){
						$sql4="UPDATE  `phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map'";
			    		$rs4=mysqli_query($conn,$sql4);
			    		break;
			    		
			    	}
			    	else{$loi=1;}
		    	}
		    	
	    	}
	    	if($loi==1){
		    		header('location:../index.php?action=&tb=loi3&sn='.$sno);
		    	}
		    	else{header('location:../index.php?action=&tb=ok1');}
	    	

			
	    }elseif ($row['GioiTinh']==='Nu') {
//tìm khu theo giới tính Nữ
	    	$sql1="select MaKhu from khu where Sex='Nu'";
	    	$rs1=mysqli_query($conn,$sql1); $loi=0;
	    	while ($row1=mysqli_fetch_array($rs1)) {
	    		$makhu=$row1['MaKhu'];
      			echo $makhu;
      			// Tìm phòng cho sinh viên   	
				$sql2="SELECT  MaPhong  from phong where MaKhu = '$makhu' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
				$rs2=mysqli_query($conn,$sql2);
		    	$row2=mysqli_fetch_array($rs2);
		    	$dem2=mysqli_num_rows($rs2);
		    	if($dem2 >= 1){
		    		$map=$row2['MaPhong'];
			    	echo $map;
// thêm sinh viên vào phòng
			    	$sql3="INSERT INTO `chitietdangky`(`MaSV`, `MaPhong`, `TinhTrang`) VALUES ($masv,'$map',N'chưa duyệt')";
			    	$rs3=mysqli_query($conn,$sql3);
			    	if($rs3){
						$sql4="UPDATE  `phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map'";
			    		$rs4=mysqli_query($conn,$sql4);
			    		break;
			    		
			    	}
			    	else{$loi=1;}
		    	}
		    	
	    	}
	    	if($loi==1){
		    		header('location:../index.php?action=&tb=loi3&sn='.$sno);
		    	}
		    	else{header('location:../index.php?action=&tb=ok1');}
	    	
	    }

    }   
   
else {
    echo "Bạn đã đăng kí phòng! Nếu muốn đăng kí, hãy trả phòng";
    header('location:../index.php?action=&tb=loi1');
}

}
