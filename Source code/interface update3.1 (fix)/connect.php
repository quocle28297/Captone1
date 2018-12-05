<?php
	$username="root";
	$password="root";
	$database="qlphongtro";
	$connection=mysqli_connect ('localhost',"root","",$database);
	mysqli_set_charset($connection, 'utf8');
	if (!$connection) {
		die('Not connected : ' . mysqli_error());
	}

?>