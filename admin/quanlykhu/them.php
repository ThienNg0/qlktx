 <div class="col-sm-12  m-auto">
        <div class="card card-signin my-5">
          <div class="card-body">

           <form class="col-md-12 m-auto" action="quanlykhu/xuly.php" method="GET">
              <div class="form-row">
                 <div class="form-group col-sm-3">
                    <label for="myEmail">Mã Khu</label>
                    <input type="text" class="form-control" name="mk" value="">
                   
                 </div>
                 <div class="form-group col-sm-3">
                    <label for="myEmail">Tên Khu</label>
                    <input type="text" class="form-control" name="tk" value="">
                   
                 </div>
                 <div class="form-group col-sm-3">
                    <label for="myPassword">Giới Tính</label>
                    <select class="form-control" name="gt" ><?php $t=$row['Sex']; $s="select DISTINCT Sex from khu";$rs1=mysqli_query($conn,$s);
                        while ($kq=mysqli_fetch_array($rs1)) { ?>
                          <option <?php  if($kq['Sex']==$t){ echo 'selected="selected"' ;} ?> value="<?php  echo $kq['Sex']; ?>"> <?php echo $kq['Sex']; ?></option>
                    <?php }

                    ?>
                      
                    </select>
                 </div>
              </div><hr>
   
              <button type="sub" name="action" value="them" class="btn btn-lg btn-primary btn-block text-uppercase col-3 m-auto">Cập Nhập</button>
           </form></div>
         </div>
       </div>