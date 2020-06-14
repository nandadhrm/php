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
	$harga_beli = $_POST['harga_beli_obat'];
	$harga_jual = $_POST['harga_jual_obat'];
	$foto=$_FILES['foto_obat']['name'];

    $query = "INSERT INTO obat VALUES('$kode', '$nama', '$jenis','$satuan','$jumlah','$harga_beli','$harga_jual','$foto')";
    $sql = mysqli_query($con,$query);

    echo "<script>window.location.href='index.php?page=display_obat'</script>";
?>