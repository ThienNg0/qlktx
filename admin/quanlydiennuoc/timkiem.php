			<div class="form-row m-auto">
				 <div class="form-group col-sm-1"></div>
                 <div class="form-group col-sm-4">
                   <form action="index.php?action=quanlydiennuoc&view=quanlydiennuoc" method="POST">
	                  <div class="input-group ">
	                       <input class="form-control py-2 border-left-0 border search " type="search" placeholder="Nhập Phòng Cần Tìm" id="example-search-input" name="tk"/>
	                    <span class="input-group-append">
	                        <button class="btn btn-outline-success border-left-0  search " name="btsearch" type="submit">Tìm kiếm</button>
	                    </span>
	                  </div>
             		</form>
              
            </div><hr>

<?php 
if(isset($_POST['btsearch'])){
	$tk=$_POST['tk'];
	$sql="select * from phong where MaPhong LIKE N'%$tk%' order by SoNguoiHienTai DESC,MaKhu ASC";
	$rs=mysqli_query($conn,$sql); ?>
		<table class="table-hover table text-center">
			<thead>
				<tr class="badge-info">
					<th>#</th><th>Phòng</th><th>Khu</th><th>Số người đang ở</th><th  class="badge-danger" ></th>
				</tr>
			</thead>
<?php $i=0; while ($row=mysqli_fetch_array($rs)) {$i=$i+1; ?>
		<tbody>
				<tr>
					<td><?php echo $i ;?></td><td><?php echo $row['MaPhong'] ;?></td><td><?php echo $row['MaKhu'] ;?></td><td><?php echo $row['SoNguoiHienTai'] ;?></td><td><a href="index.php?action=quanlydiennuoc&view=them&map=<?php echo $row['MaPhong'] ?>" ><i class="fas fa-location-arrow"></i> Thêm</a></td>
				</tr>
			</tbody>
	
<?php } ?>
		</table><?php 
}
else{
	$sql="select * from phong order by SoNguoiHienTai DESC,MaKhu ASC ";
	$rs=mysqli_query($conn,$sql); ?>
		<table class="table-hover table text-center">
			<thead>
				<tr class="badge-info">
					<th>#</th><th>Phòng</th><th>Khu</th><th>Số người đang ở</th><th  class="badge-danger" ></th>
				</tr>
			</thead>
<?php $i=0; while ($row=mysqli_fetch_array($rs)) {$i=$i+1; ?>
		<tbody>
				<tr>
					<td><?php echo $i ;?></td><td><?php echo $row['MaPhong'] ;?></td><td><?php echo $row['MaKhu'] ;?></td><td><?php echo $row['SoNguoiHienTai'] ;?></td><td><a href="index.php?action=quanlydiennuoc&view=them&map=<?php echo $row['MaPhong'] ?>" ><i class="fas fa-location-arrow"></i> Thêm</a></td>
				</tr>
			</tbody>
	
<?php } ?>
		</table>		
<?php
}
	?>
	
