<?php
$srvr="localhost"; //SESUAIKAN DENGAN WEBSERVER ANDA
$db="a121705697"; //SESUAIKAN DENGAN WEBSERVER ANDA
$usr="root"; //SESUAIKAN DENGAN WEBSERVER ANDA
$pwd="";//SESUAIKAN DENGAN WEBSERVER ANDA

$con = mysqli_connect($srvr,$usr,$pwd);
mysqli_select_db($con,$db);
?>