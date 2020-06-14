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

	$id = $_GET['kode_obat'];
	$sql = "SELECT * FROM obat WHERE kode_obat = $id";
	$query = mysqli_query($con,$sql);
	while ($r=mysqli_fetch_row($query)){
	
	echo "
<form action='edit_obat.php' method='post'>

    <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Modal Name'>Kode Obat</label>
    <input type='text' name='kode_obat'  value='$r[0]' class='form-control' placeholder='Kode Obat' required/>
  </div>

  <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Modal Name'>Nama Obat</label>
    <input type='text' name='nama_obat'  class='form-control' placeholder='Nama Obat' required/>
  </div>

   <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Selection'>Jenis Obat</label>
<select name='jenis_obat' class='form-control' placeholder='Jenis Obat' required/>
        <option>Biasa</option>
<option>Sedang</option>
          <option>Keras</option>
      </select>
  </div>

   <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Selection'>Satuan Obat</label>
<select name='satuan_obat' class='form-control' placeholder='Satuan Obat' required/>
        <option>Tablet</option>
<option>Botol</option>
          <option>Ampul</option>
      </select>
  </div>
  
  <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Modal Name'>Jumlah Obat</label>
    <input type='text' name='jumlah_obat'  class='form-control' placeholder='Jumlah Obat' required/>
  </div>
  
  <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Modal Name'>Harga Beli Obat</label>
    <input type='text' name='harga_beli_obat'  class='form-control' placeholder='Harga Beli Obat' required/>
  </div>
  <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Modal Name'>Harga Jual Obat</label>
    <input type='text' name='harga_jual_obat'  class='form-control' placeholder='Harga Jual Obat' required/>
  </div>
  <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Modal Name'>Foto Produk</label>
    <input type='file' name='foto_obat'  class='form-control' placeholder='Foto Obat' required/>
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
