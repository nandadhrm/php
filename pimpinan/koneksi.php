<?php
    $host="localhost";
    $user="root";
    $pass="";
    $con=mysqli_connect($host,$user,$pass) or die("Error Connect DB ".mysql_error());
    mysql_select_db("a121705697") or die("Database Tidak Ada".mysql_error());
?>