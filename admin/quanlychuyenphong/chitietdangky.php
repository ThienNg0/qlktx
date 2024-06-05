<?php
	$madk=$_GET['madk'];
	$sql="SELECT * FROM `sinhvien` WHERE MaSV =(SELECT MaSV from chitietdangky WHERE MaDK=$madk)";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);
	$sql1="SELECT * FROM `phong` WHERE MaPhong =(SELECT MaPhong from chitietdangky WHERE MaDK=$madk)";
	$rs1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_array($rs1); $map=$row1['MaKhu'];
	$sql2="SELECT * FROM `khu` WHERE MaKhu ='$map'";
	$rs2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_array($rs2);
?>
	<div class="row m-auto" >
		<div class="card col-6">
			<table class="table">
				<thead>
					<tr class="badge-info text-center"><td colspan="2"><h3>Thông tin sinh viên đăng ký</h3> </td></tr>
					<tr>
						<th>Mã sinh viên</th><th> <?php echo $row['MaSV'] ?></th>
					</tr>
					<tr>
						<th>Họ và Tên </th><th> <?php echo $row['HoTen'] ?></th>
					</tr>
					<tr>
						<th>Giới Tính </th><th> <?php if($row['GioiTinh']==='Nu'){echo 'Nữ';}else{echo 'Nam';} ?></th>
					</tr>
					<tr>
						<th>Ngày sinh</th><th> <?php echo $row['NgaySinh'] ?></th>
					</tr>
					<tr>
						<th>Địa Chỉ </th><th> <?php echo $row['DiaChi'] ?></th>
					</tr>
					<tr>
						<th>SĐT</th><th> <?php echo $row['SDT'] ?></th>
					</tr>
				</thead>
			</table>
			
		</div>
		<div class="card col-6">
			<table class="table">
				<thead>
					<tr class="badge-info text-center"><td colspan="2"><h3>Thông tin Phòng</h3> </td></tr>
					<tr>
						<th>Mã Phòng</th><th> <?php echo $row1['MaPhong'] ?></th>
					</tr>
					<tr>
						<th>Mã Khu</th><th> <?php echo $row1['MaKhu'].' (Khu '.$row2['Sex'].')'; ?></th>
					</tr>
					<tr>
						<th>Số Người Tối Đa</th><th> <?php echo $row1['SoNguoiToiDa'] ?></th>
					</tr>
					<tr>
						<th>số Người hiện tại</th><th> <?php if($row1['SoNguoiHienTai']>=1){echo $row1['SoNguoiHienTai']-1;}else{echo $row1['SoNguoiHienTai'];} ?></th>
					</tr>
					<tr>
						<th>Giá</th><th> <?php echo number_format($row1['Gia']).' đ' ?></th>
					</tr>
					<tr>
						<th> &emsp;</th><th> &emsp;</th>
					</tr>
				</thead>
			</table>
			
		</div>
	</div><hr class="badge-danger"><br>
