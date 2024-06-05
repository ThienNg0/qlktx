    <?php 
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);
    session_start();
    include_once('../../config/database.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date1 = getdate(); 
    $ngay1 = $date1['year'] . "-" . $date1['mon'] . "-" . ($date1['mday']);

    if(isset($_POST['action'])){
    $action = $_POST['action'];
    $mp = $_POST['mp'];
    $mk = $_POST['mk'];
    $sntd = $_POST['sntd'];
    $gia = str_replace(',', '', $_POST['gia']);
        echo "MaPhong: $mp, MaKhu: $mk, SoNguoiToiDa: $sntd, Gia: $gia";
        $sql = "";
        $redirect = 'location:../index.php?action=quanlyphong&view=quanlyphong&thongbao=';

        switch ($action) {
            case 'sua':
                $sql = "UPDATE phong SET MaPhong='$mp', MaKhu='$mk', SoNguoiToiDa=$sntd, Gia=$gia WHERE MaPhong='$mp'";
                $redirect .= 'sua';
                break;
                case 'xoa':
                    $stmt = $conn->prepare("DELETE FROM phong WHERE MaPhong = ?");
                    $stmt->bind_param("s", $mp);
                
                    if ($stmt->execute()) {
                        header("Location: ../index.php?action=quanlyphong&view=quanlyphong&thongbao=xoa");
                        exit(); // Exit to prevent further execution
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                
                    $stmt->close();
                    break;
            case 'them':
            $sql = "INSERT INTO phong (MaPhong, MaKhu, SoNguoiToiDa, Gia) VALUES ('$mp', '$mk', $sntd, $gia)";
                $redirect .= 'them';
                break;
        }

        $rs = mysqli_query($conn, $sql);
        if($rs){
            header($redirect);
        } else {
            echo "Error: " . mysqli_error($conn); // Output the MySQL error for debugging
        }
        
    }
    ?>