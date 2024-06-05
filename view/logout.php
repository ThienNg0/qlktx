<?php
	if(isset($_SESSION['sv_login'])){
		unset($_SESSION['sv_login']);
		header('location:index.php');
	}
?>