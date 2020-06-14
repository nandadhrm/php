<?php
    $host="localhost";
    $user="root";
    $pass="";
    $con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());

    $kode = $_POST['id_pemasok'];
    $namap = $_POST['nama_pemasok'];
	$alamatp = $_POST['alamat_pemasok'];
	$kotap = $_POST['kota_pemasok'];
	$telp = $_POST['telepon_pemasok'];
	$namac = $_POST['nama_perusahaan'];
    $alamatc = $_POST['alamat_perusahaan'];
    $kotac = $_POST['kota_perusahaan'];
    $telpc = $_POST['telepon_perusahaan'];
    $email = $_POST['email_perusahaan'];
	

    $query = "INSERT INTO pemasok VALUES('$kode','$namap','$alamatp','$kotap','$telp','$namac','$alamatc','$kotac','$telpc','$email')";
    $sql = mysqli_query($con,$query);

    echo "<script>window.location.href='index.php?page=pemasok'</script>";
?>