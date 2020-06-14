<?php
    $host="localhost";
    $user="root";
    $pass="";
    $con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());

    $id = $_GET['id_pemasok'];

    $query = "DELETE FROM pemasok WHERE id_pemasok = '$id'";
    $sql = mysqli_query($con,$query);

    echo "<script>window.location.href='index.php?page=pemasok'</script>";
?>