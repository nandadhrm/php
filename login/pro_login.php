<?php
	session_start(); 

	$host="localhost";
	$user="root";
	$pass="";
	$con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());

	$user_name=$_POST['user_name'];
	$password=$_POST['password'];

	$qry="select user_name,hak_akses,password from member where user_name='$user_name' && password='$password'";
	$sql=mysqli_query($con,$qry);

	while ($fld=mysqli_fetch_row($sql))
	{
		if ($fld[1]=="1" )
		{
			$reg=mysqli_fetch_array($sql);
			$_SESSION['user_name'] = $reg['user_name'];
			$_SESSION["password"] = $reg['password'];	  
			$_SESSION["hak_akses"] = 1;
			echo "<script>window.location.href='../admin/'</script>";
		}
		else if ($fld[1]=="2" )
			{ 
			$reg=mysqli_fetch_array($sql);
			$_SESSION['user_name'] = $reg['user_name'];
			$_SESSION["password"] = $reg['password'];	  
			$_SESSION["hak_akses"] = 2;
			echo "<script>window.location.href='../pimpinan/'</script>";
		}
		else if ($fld[1]=="3" )
			{ 
			$reg=mysqli_fetch_array($sql);
			$_SESSION['user_name'] = $reg['user_name'];
			$_SESSION["password"] = $reg['password'];	  
			$_SESSION["hak_akses"] = 3;
			echo "<script>window.location.href='../penjualan/'</script>";
		}
		else if ($fld[1]=="4" )
			{ 
			$reg=mysqli_fetch_array($sql);
			$_SESSION['user_name'] = $reg['user_name'];
			$_SESSION["password"] = $reg['password'];	  
			$_SESSION["hak_akses"] = 4;
			echo "<script>window.location.href='../pembelian/'</script>";
		}
		else
		{	
			//echo "<script>window.location.href='../pesan/'</script>";
		}
		//echo "<script>window.location.href='../pesan/'</script>";
	}
	echo "<script>window.location.href='../pesan/'</script>";
?>