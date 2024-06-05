<?php

$i=1;
while ($i <= 10) {
	echo $i;
	$i++;
	if($i===4){
		header('location:a.php');
	}
	
}
?>
