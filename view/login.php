
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Đăng nhập</h5>
                    <form action="" method="POST" class="form-signin">
                        <div class="form-group">
                            <label for="inputStudentID">Mã sinh viên</label>
                            <input type="text" id="inputStudentID" class="form-control" placeholder="Nhập mã sinh viên" name="masv" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Mật khẩu</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Nhập mật khẩu" name="pass" required>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="dangnhap">Đăng nhập</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
  //xử lý login
  #code...
  if (isset($_SESSION['sv_login'])) {
     header('location:index.php');
  }
  if(isset($_POST['dangnhap'])){
    $tk=$_POST['masv'];
    $mk=$_POST['pass'];
    $sql="select * from sinhvien where MaSV=$tk and MatKhau='$mk'";
    $rs=mysqli_query($conn,$sql);


      $dem=mysqli_num_rows($rs);
      if($dem==0){
        echo '<script>alert("Sai tài khoản hoặc mật khẩu ! Xin mời nhập lại .")</script>';
      }else{
        $row=mysqli_fetch_array($rs);
        $_SESSION['sv_login']=$row;

        header('location:index.php');
      }
  }
?>