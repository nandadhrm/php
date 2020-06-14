<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
<?php
	$host="localhost";
  $user="root";
  $pass="";
  $con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());

	$id = $_GET['id_pemasok'];
	$sql = "SELECT * FROM pemasok WHERE id_pemasok = $id";
	$query = mysqli_query($con,$sql);
	while ($r=mysqli_fetch_row($query)){
	
	echo "
<form action='edit_pemasok.php' method='post'>

  <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>ID Pemasok</label>
                  <input type='text' name='id_pemasok'  value='$r[0]' class='form-control' placeholder='ID Pemasok' readonly/>
                </div>

                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Nama</label>
                  <input type='text' name='nama_pemasok'  class='form-control' placeholder='Nama Pemasok' required/>
                </div>

                 <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Alamat Pemasok</label>
                  <input type='text' name='alamat_pemasok'  class='form-control' placeholder='Alamat Pemasok' required/>
                </div>

                 <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Kota Pemasok</label>
                  <input type='text' name='kota_pemasok'  class='form-control' placeholder='Kota Pemasok' required/>
                </div>

                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Telepon Pemasok</label>
                  <input type='text' name='telepon_pemasok'  class='form-control' placeholder='Telepon Pemasok' required/>
                </div>
								
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Perusahaan</label>
                  <input type='text' name='nama_perusahaan'  class='form-control' placeholder='Nama Perusahaan' required/>
                </div>
                
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Alamat Perusahaan</label>
                  <input type='text' name='alamat_perusahaan'  class='form-control' placeholder='Alamat Perusahaan' required/>
                </div>
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Kota Perusahaan</label>
                  <input type='text' name='kota_perusahaan'  class='form-control' placeholder='Kota Perusahaan' required/>
                </div>
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Telepon Perusahaan</label>
                  <input type='text' name='telepon_perusahaan'  class='form-control' placeholder='Telepon Perusahaan' required/>
                </div>
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Email</label>
                  <input type='text' name='email_perusahaan'  class='form-control' placeholder='Email Perusahaan' required/>
                </div>

              <div class='modal-footer'>
                  <button class='btn btn-success' type='submit'>
                      Confirm
                  </button>

                  <button type='reset' class='btn btn-danger'  data-dismiss='modal' aria-hidden='true'>
                    Cancel
                  </button>
              </div>
</form>
	";
	}
?>
</body>
</html>
