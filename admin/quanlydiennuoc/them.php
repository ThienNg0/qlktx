 <?php $map=$_GET['map']; include_once('include/thungay.php');?>

      <div class="col-sm-12  m-auto">
        <div class="card card-signin my-5">
          <div class="card-body">

           <form class="col-md-12 m-auto" action="index.php?action=quanlydiennuoc&view=them&map=<?php echo $map ?>" method="POST">
              <div class="form-row">
                 <div class="form-group col-sm-4">
                    <label for="myEmail">Tiền Điện</label>
                    <input type="text" class="form-control" name="td">
                   
                 </div>
                 <div class="form-group col-sm-4">
                    <label for="myPassword">Tiền Nước</label>
                    <input type="text" class="form-control" name="tn">
                 </div>
                 <div class="form-group col-sm-4">
                    <label for="phong">Tháng</label>
                    <input type="text" class="form-control"  name="thang">
                   
                 </div>
              </div><hr>
   
              <button type="sub" name="themdn" class="btn btn-lg btn-primary btn-block text-uppercase col-3 m-auto">Thêm</button>
           </form></div>
         </div>
       </div><?php $a=sw_get_current_weekday();
echo $a;?>
        <table class="table text-center badge-light table-hover">
                  <thead class="badge-info">
                    <tr>
                      <th>Tháng</th><th>Tiền Điện</th><th>Tiền Nước</th><th>Tổng Tiền</th><th>Tình Trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  $sql123="select * from hoadondiennuoc where MaPhong ='$map' order by Thang DESC";
                        $rs123=mysqli_query($conn,$sql123);
                   while ( $row123=mysqli_fetch_array($rs123)) {
                        
                    ?>
                      <tr>
                       <td><?php echo $row123['Thang']; ?> </td><td> <?php echo number_format($row123['TienDien']).' đ' ?> </td><td><?php echo number_format($row123['TienNuoc']).' đ' ?></td>
                       <td><?php echo number_format(($row123['TienNuoc']+$row123['TienDien'])).' đ' ?></td>
                       <td><?php if($row123['TinhTrang']==='đã thu') {
                       				echo $row123['TinhTrang'];
                       			 }else{?>
									<a href="index.php?action=quanlydiennuoc&view=them&map=<?php echo $map; ?>&mahd=<?php echo $row123['MaHD']; ?>">chưa thu</a>
                       		<?php	 } ?> </td>
                    </tr>
                    
                 <?php   } ?>
                    
                  </tbody>
        </table>
<?php
	if(isset($_POST['themdn'])){
		$td=$_POST['td'];
		$tn=$_POST['tn'];
		$thang=$_POST['thang'];
		$sql="INSERT INTO `hoadondiennuoc` (`MaHD`, `MaPhong`, `TienDien`, `TienNuoc`, `Thang`) VALUES (NULL, '$map','$td', '$tn', '$thang')";
		$rs=mysqli_query($conn,$sql);
		if($rs){
			$link="index.php?action=quanlydiennuoc&view=them&tb=1&map=".$map;
			header('Location:'.$link);
			
		}else{
			$link="index.php?action=quanlydiennuoc&view=them&tb=2&map=".$map;
			header('Location:'.$link);
		}
	}
	if(isset($_GET['tb'])){
		switch ($_GET['tb']) {
			case '1':
				echo '<script>alert("success!!!")</script>';
				break;
			case '2':
				echo '<script>alert("Lỗi!!!")</script>';
				break;
			default:
				# code...
				break;
		}
	}
	if(isset($_GET['mahd'])){
		$mahd=$_GET['mahd'];
		$sql="UPDATE hoadondiennuoc set TinhTrang=N'đã thu' where MaHD='$mahd'";
		$rs=mysqli_query($conn,$sql);
		if($rs){
			$link="index.php?action=quanlydiennuoc&view=them&tb=1&map=".$map;
			header('Location:'.$link);
			
		}else{
			$link="index.php?action=quanlydiennuoc&view=them&tb=2&map=".$map;
			header('Location:'.$link);
		}
	}


?>

