<?php
    $host="localhost";
    $user="root";
    $pass="";
    $con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());

    $id = $_GET['kode_obat'];

    $query = "DELETE FROM obat WHERE kode_obat = '$id'";
    $sql = mysqli_query($con,$query);

    echo "<script>window.location.href='index.php?page=display_obat'</script>";
?>