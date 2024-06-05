<?php	
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
	session_start();
	ob_start();
	include_once('../config/database.php');
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		switch ($action) {
			case 'capnhapthongtin':
			    include_once('capnhapthongtin.php');
				break;
			case 'dangkyphong':
			    include_once('dangkyphong.php');
				break;
			case 'dangkychuyenphong':
			    include_once('dangkychuyenphong.php');
				break;
			case 'traphong':
			    include_once('traphong.php');
				break;
			
			default:
				// Handle default case if needed
				break;
		}
	}
?>
