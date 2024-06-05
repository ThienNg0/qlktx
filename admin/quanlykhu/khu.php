
<?php
	$sql="select * from khu ";
	$rs=mysqli_query($conn,$sql);
	
?>
<table class="table table-hover text-center " style="font-size: 90%">
	<thead class="badge-info">
		<tr>
			<th>Mã Khu</th><th>Tên Khu</th><th>Giới Tính</th><th colspan ="3" class="badge-danger"></th>
		</tr>
	</thead>
<?php
	
	while ($row=mysqli_fetch_array($rs)) { ?>
	<tbody>
		<tr>
			<td><?php echo $row['MaKhu'] ?></td><td><?php echo $row['TenKhu'] ?></td><td><?php echo $row['Sex'] ?></td>
			<td><a href="index.php?action=khu&view=sua&map=<?php echo  $row['MaKhu']?>" >Cập Nhập  </a></td>
			<td><a href="quanlyphong/xuly.php?action=xoa&mp=<?php echo $row['MaKhu']; ?>" ><i class="fas fa-backspace"></i></a></td>
		</tr>
	</tbody>
<?php }?>
</table>
<hr class="badge-danger">
<?php 


?>