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
	
	$id = $_POST['id_pemasok'];
	$nama = $_POST['nama_pemasok'];
	$alamat = $_POST['alamat_pemasok'];
	$kota = $_POST['kota_pemasok'];
	$tel = $_POST['telepon_pemasok'];
	$namap = $_POST['nama_perusahaan'];
	$alamatp = $_POST['alamat_perusahaan'];
	$kotap = $_POST['kota_perusahaan'];
	$telp = $_POST['telepon_perusahaan'];
	$email = $_POST['email_perusahaan'];
	
	$sql = "UPDATE pemasok SET
								id_pemasok = '$id',
								nama_pemasok = '$nama',
								alamat_pemasok = '$alamat',
								kota_pemasok = '$kota',
								telepon_pemasok = '$tel',
								nama_perusahaan = '$namap',
								alamat_perusahaan = '$alamatp',
								kota_perusahaan = '$kotap',
								telepon_perusahaan = '$telp',
								email_perusahaan = '$email'
								
								WHERE id_pemasok = '$id'";
	mysqli_query($con,$sql) or die(mysql_error());
	
	header("location:index.php?page=pemasok");
?>
</body>
</html>
