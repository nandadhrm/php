<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ujian | Ganjil 2018/2019 | Dosen : MY Teguh S, M.Kom</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<div class="fly">
		<div class="content"><!-- <span class="flying-books"><img src="../../LAP_PRAKTEK/image/books.png" alt=""></span> -->
			<ul>
				<li><a class="active" href="index.php?page=masuk">Home</a></li>
				<li><a href="index.php?page=obat">Laporan Obat</a></li>
				<li><a href="index.php?page=member">Laporan Member</a></li>
				<li><a href="index.php?page=pemasok">Laporan Pemasok</a></li>
				<li><a href="index.php?page=jual">Laporan Penjualan</a></li>
				<li><a href="index.php?page=beli">Laporan Pembelian</a></li>
				<li><a href="index.php?page=logout">Logout</a></li>
			</ul>
	  </div>
	</div> <!-- /.fly -->
	<!-- <div class="flying-books"></div> -->
		<div class="main">
			<div class="content">
			<h1>TUGAS UAS | Genap 2018/2019</h1>
			<p>Dosen : MY Teguh Sulistyono, M.Kom | <strong>NIM : A12.2017.05697 | NAMA : OEI ANANDA DHARMA</a></strong></p> 
			<center> 
			<!-- <img src="image/hr.png"> -->
			</center>
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) 
				{
				case 'masuk': include "home.php"; break;
				case 'obat': include "laporan_obat.php"; break;
				case 'pemasok': include "laporan_pemasok.php"; break;
				case 'member': include "laporan_member.php"; break;
				case 'jual': include "laporan_penjualan.php"; break;
				case 'beli': include "laporan_pembelian.php"; break;
				case 'logout': include "logout.php"; break;
				case 'main' :
				default : include 'home.php';
				}
			?>
			</div>
		</div>
	<div class="footer">
		<div class="content">
			<p>
				Copyright &copy; 2016 | Ujian UAS Genap 2015/2016 | MY Teguh Sulistyono, M.Kom
			</p>
		</div>
	</div> <!-- /.footer -->
	
</body>
</html>