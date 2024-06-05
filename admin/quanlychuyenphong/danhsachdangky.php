<?php
	$sql="select * from chitietchuyenphong where TinhTrang='chưa duyệt' Order  by NgayDangKy DESC ";
	$rs=mysqli_query($conn,$sql);
	
?>
<table class="table table-hover m-auto text-center" style="font-size: 13px;">
	<thead class="badge-info">
		<tr>
			<th>Mã Đăng Ký</th> <th>Mã Sinh Viên</th><th>Phòng Đang Ở</th><th>Mã Phòng Chuyển</th><th>Lý Do</th><th>Tình trạng</th><th>Chi Tiết</th><th colspan ="2" class="badge-danger"></th>
		</tr>
	</thead>
	<tbody>
 <?php $so=0;
	 while ($row=mysqli_fetch_array($rs)) {
	 	$madk=$row['MaDK'];
	 	$sql3="select * from chitietdangky where MaDK=$madk";
		$rs3=mysqli_query($conn,$sql3);$row3=mysqli_fetch_array($rs3);
	 	$masv=$row['MaSV'];$map=$row['MaPhongChuyen'];$map2=$row3['MaPhong'];
	 	$sql2="select * from sinhvien where MaSV=$masv"; $rs2=mysqli_query($conn,$sql2);$row2=mysqli_fetch_array($rs2);
	 	$sql12="select * from phong where MaPhong='$map2'"; $rs12=mysqli_query($conn,$sql12);$row12=mysqli_fetch_array($rs12);
	 	$sql123="select * from phong where MaPhong='$map'"; $rs123=mysqli_query($conn,$sql123);$row123=mysqli_fetch_array($rs123);?>
		<tr>
			<td><?php echo $row['MaDK']; ?></td>
			<td title="<?php echo $row2['HoTen'];?>"><?php echo $row['MaSV']; ?></td>
			<td title="<?php echo 'Phòng '.$row12['SoNguoiToiDa'].' Người';?>"><?php echo $row3['MaPhong']; ?></td>
			<td title="<?php echo 'Phòng '.$row123['SoNguoiToiDa'].' Người';?>"><?php echo $row['MaPhongChuyen']; ?></td>
			<td><?php echo $row['Lydo']; ?></td>
			<td><?php echo $row['TinhTrang']; ?></td>
			<td><a href="index.php?action=quanlychuyenphong&view=chitietdangky&madk=<?php echo $row['MaDK']; ?>" >Detail </a></td>
			<td><a href="quanlychuyenphong/xuly.php?action=duyet&madk=<?php echo  $row['MaDK']?>" >Duyệt <i class="fas fa-check"></i> </a></td>
			<td><a href="quanlychuyenphong/xuly.php?action=xoa&madk=<?php echo $row['MaDK']; ?>" ><i class="fas fa-backspace"></i></a></td>
		</tr>
 <?php	} ?>
		
	</tbody>



<?php 


?>