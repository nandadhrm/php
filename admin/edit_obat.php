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
	
	$kode = $_POST['kode_obat'];
	$nama = $_POST['nama_obat'];
	$jenis = $_POST['jenis_obat'];
	$satuan = $_POST['satuan_obat'];
	$jumlah = $_POST['jumlah_obat'];
	$hargab = $_POST['harga_beli_obat'];
	$hargaj = $_POST['harga_jual_obat'];
	$foto = $_FILES['foto_obat']['name'];
	$sql = "UPDATE obat SET
								kode_obat = '$kode',
								nama_obat = '$nama',
								jenis_obat = '$jenis',
								satuan_obat = '$satuan',
								jumlah_obat = '$jumlah',
								harga_beli_obat = '$hargab',
								harga_jual_obat = '$hargaj',
								foto_obat = '$foto'
								WHERE kode_obat = '$kode'";
	mysqli_query($con,$sql) or die(mysql_error());
	
	header("location:index.php?page=display_obat");
?>
</body>
</html>
