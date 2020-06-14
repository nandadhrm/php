<?php
	$host="localhost";
	$user="root";
	$pass="";
	$con=mysqli_connect($host,$user,$pass) or die("Error Connect DB ".mysql_error());
	mysqli_select_db($con,"a121705697") or die("Database Tidak Ada. ".mysql_error());
?>