<?php
$host="localhost";
$user="root";
$pass="";
$con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());


$id = $_POST['id_member'];
$username = $_POST['user_name'];
$password= $_POST['password'];
$hakases = $_POST['hak_akses'];
$namamember = $_POST['nama_member'];
$bagmember = $_POST['bagian_member'];
$departemenmember = $_POST['departemen_member'];
$email = $_POST['email_member'];
$alamat = $_POST['alamat_member'];
$kota = $_POST['kota_member'];

$query = "INSERT INTO member VALUES('$id','$username','$password','$hakases','$namamember','$bagmember','$departemenmember','$email','$alamat','$kota')";
$sql = mysqli_query($con,$query); 
	echo "<script>window.location.href='index.php?page=member'</script>";
?>