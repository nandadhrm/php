<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$host="localhost";
	$user="root";
	$pass="";
	$con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());
	
	$id = $_POST['id_member'];
	$user = $_POST['user_name'];
	$pass = $_POST['password'];
	$hak = $_POST['hak_akses'];
	$nama = $_POST['nama_member'];
	$bagian = $_POST['bagian_member'];
	$dept = $_POST['departemen_member'];
	$email = $_POST['email_member'];
	$alamat = $_POST['alamat_member'];
	$kota = $_POST['kota_member'];
	
	$sql = "UPDATE member SET
								id_member = '$id',
								user_name = '$user',
								password = '$pass',
								hak_akses = '$hak',
								nama_member = '$nama',
								bagian_member = '$bagian',
								departemen_member = '$dept',
								email_member = '$email',
								alamat_member = '$alamat',
								kota_member = '$kota'
								WHERE id_member = '$id'";
	mysqli_query($con,$sql) or die(mysql_error());
	
	header("location:index.php?page=member");
?>
</body>
</html>
