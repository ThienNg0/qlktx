<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
  if (isset($_SESSION['sv_login'])) {
       $sv=$_SESSION['sv_login'];
    $masv=$sv['MaSV'];
    $sql="select * from sinhvien where MaSV=$masv";
    $rs=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($rs);
    $sql2="select * from thongbao where MaSV=$masv order by NgayTB DESC , MaTB DESC";
    $rs2=mysqli_query($conn,$sql2);
    

?>
    <div class="cart">
      <div class="col-sm-12  mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
          <h5 class="card-title text-center">Thông Báo của bạn</h5><hr>

           <div class="col-md-12 m-auto" action="" method="">
              <div class="form-row ">
                 <div class="form-group col-sm-4 m-auto">
                    <label for="masv">Mã sinh viên</label>
                    <input type="text" class="form-control" id="masv" value="<?php echo $row['MaSV'] ?>" disabled>
                 </div>
                 <div class="form-group col-sm-4 m-auto">
                    <label for="hoten">Họ và tên</label>
                    <input type="text" class="form-control" id="hoten" value="<?php echo $row['HoTen'] ?>" disabled>
                 </div>
              </div><hr>
           </div>
<?php while ($row2=mysqli_fetch_array($rs2)) { ?>
           <div class="col-md-12 m-auto">

              <div class="form-row ">
                    <label class="badge-info col-md-12">-><?php echo $row2['TieuDe'] ;?></label>
                    <label class="badge-lightcol-md-6"><?php echo $row2['NoiDung'] ;?></label>

                 </div>
                 <div class="form-row ">
                    <h6 style="margin-left: 450px;"><?php echo 'Người gửi : '.$row2['MaNV'].' --- '.$row2['NgayTB'];?></h6>
                 </div>
                 <hr class="badge-danger">
         </div><br>
<?php } ?>
         </div>
       </div>
     </div>
   </div>

<?php }?>