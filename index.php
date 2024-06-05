<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="css.css">
    <script src="jquery/jquery.js"></script>
    <script src="bootstrap4/js/bootstrap.js"> </script>


</head>
<body>
	<?php 
	session_start();
	  ob_start();
		include_once('config/database.php');
		include_once('include/header.php');
		include_once('include/main.php');
		
	?>
</body>
</html>