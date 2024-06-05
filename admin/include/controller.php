
  <div class="col-10">
    <?php
      if(isset($_GET['action'])){
          $action=$_GET['action'];
          switch ($action) {
                    case 'logout':  
                        header('location:logout.php');
                    case 'quanlydangkyphong':
                        include('quanlydangkyphong/main.php');
                        break;
                    case 'quanlychuyenphong':
                        include('quanlychuyenphong/main.php');
                        break;  
                    case 'quanlydiennuoc':
                        include('quanlydiennuoc/main.php');
                        break;
                    case 'quanlyphong':
                        include('quanlyphong/main.php');
                        break; 
                     case 'quanlytraphong':
                        include('quanlytraphong/main.php');
                        break;  
                    case 'khu':
                        include('quanlykhu/main.php');
                        break;
                    case 'nhanvien':
                        include('quanlynhanvien/main.php');
                        break;
                    case 'sinhvien':
                        include('quanlysinhvien/main.php');
                        break;                           
                  
                    default:
                         
                        break;
                }
      }
      else {
          include_once('a.php');
      }

    ?>
  </div>
