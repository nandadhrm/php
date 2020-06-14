<?php
$host="localhost";
$user="root";
$pass="";
$con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());

$id =$_GET['id_member'];
$hapus="Delete FROM member WHERE id_member='$id'";
$modal=mysqli_query($con,$hapus);
echo "<script>window.location.href='index.php?page=member'</script>";
?>