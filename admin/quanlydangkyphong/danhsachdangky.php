<?php
	$sql="select * from chitietdangky where TinhTrang='chưa duyệt' and NgayDangKy is not null and NgayTraPhong is null Order  by NgayDangKy DESC ";
	$rs=mysqli_query($conn,$sql);
	
?>
<table class="table table-hover m-auto text-center" style="font-size: 13px;">
	<thead class="badge-info">
		<tr>
			<th>Mã Đăng Ký</th> <th>Mã Sinh Viên</th><th>Mã Nhân Viên</th><th>Mã Phòng</th><th>Ngày Đăng Ký</th><th>Tình trạng</th><th>Chi Tiết</th><th colspan ="2" class="badge-danger"></th>
		</tr>
	</thead>
	<tbody>
 <?php $so=0;
	 while ($row=mysqli_fetch_array($rs)) {
	 	$masv=$row['MaSV'];$map=$row['MaPhong'];
	 	$sql2="select * from sinhvien where MaSV=$masv"; $rs2=mysqli_query($conn,$sql2);$row2=mysqli_fetch_array($rs2);
	 	$sql12="select * from phong where MaPhong='$map'"; $rs12=mysqli_query($conn,$sql12);$row12=mysqli_fetch_array($rs12);?>
		<tr>
			<td><?php echo $row['MaDK']; ?></td>
			<td title="<?php echo $row2['HoTen'];?>"><?php echo $row['MaSV']; ?></td>
			<td><?php echo $row['MaNV']; ?></td>
			<td title="<?php echo 'Phòng '.$row12['SoNguoiToiDa'].' Người';?>"><?php echo $row['MaPhong']; ?></td>
			<td><?php echo $row['NgayDangKy']; ?></td>
			<td><?php echo $row['TinhTrang']; ?></td>
			<td><a href="index.php?action=quanlydangkyphong&view=chitietdangky&madk=<?php echo $row['MaDK']; ?>" >Detail </a></td>
			<td><a href="quanlydangkyphong/xuly.php?action=duyet&madk=<?php echo  $row['MaDK']?>" >Duyệt <i class="fas fa-check"></i> </a></td>
			<!--<td><a href="danhmuc/main.php?view=ctdh&mahd=<?php echo $row['MaDK']; ?>" ><i class="fas fa-backspace"></i></a></td> -->
		</tr>
 <?php	} ?>
		
	</tbody>



<?php 


?>