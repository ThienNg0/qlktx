<?php
	$map=$_GET['map'];
	$sql="select * from phong where MaPhong='$map'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($rs);

 ?>
 <div class="col-sm-12  m-auto">
        <div class="card card-signin my-5">
          <div class="card-body">

           <form class="col-md-12 m-auto" action="quanlyphong/xuly.php" method="GET">
              <div class="form-row">
                 <div class="form-group col-sm-3">
                    <label for="myEmail">Mã Phòng</label>
                    <input type="text" class="form-control" name="mp" value="<?php echo $row['MaPhong'] ?>">
                   
                 </div>
                 <div class="form-group col-sm-3">
                    <label for="myPassword">Mã Khu</label>
                    <select class="form-control" name="mk" ><?php $t=$row['MaKhu']; $s="select * from khu";$rs1=mysqli_query($conn,$s);
                    		while ($kq=mysqli_fetch_array($rs1)) { ?>
                    			<option <?php  if($kq['MaKhu']===$t){ echo 'selected="selected"' ;} ?> value="<?php  echo $kq['MaKhu']; ?>"> <?php echo $kq['MaKhu'].' ('.$kq['Sex'].')'; ?></option>
                    <?php	}

                    ?>
                    	
                    </select>
                 </div>
                 <div class="form-group col-sm-3">
                    <label for="phong">Sô Người Tối Đa</label>
                    <input type="text" class="form-control"  name="sntd" value="<?php echo $row['SoNguoiToiDa'] ?>">
                   
                 </div>
                 <div class="form-group col-sm-3">
                    <label for="phong">Giá</label>
                    <input type="text" class="form-control"  name="gia" value="<?php echo $row['Gia'] ?>">
                   
                 </div>
              </div><hr>
   
              <button type="sub" name="action" value="sua" class="btn btn-lg btn-primary btn-block text-uppercase col-3 m-auto">Cập Nhập</button>
           </form></div>
         </div>
       </div>