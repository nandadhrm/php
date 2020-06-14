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

	$id = $_GET['id_member'];
	$sql = "SELECT * FROM member WHERE id_member = $id";
	$query = mysqli_query($con,$sql);
	while ($r=mysqli_fetch_row($query)){
	
	echo "
<form action='edit_member.php' method='post'>

    <div class='form-group' style='padding-bottom: 20px;'>
    <label for='Modal Name'>ID Member</label>
    <input type='text' name='id_member'  value='$r[0]' class='form-control' readonly/>
  </div>

  <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Username</label>
                  <input type='text' name='user_name'  class='form-control' placeholder='Username' required/>
                </div>

                 <div class='form-group' style='padding-bottom: 20px;'>
                      <label for='Modal Name'>password</label>
					<input type='text' name='password' ='form-control' placeholder='Password' required/>    	
                </div>

                 <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Hak Akses</label>
					<input type='text' name='hak_akses' class='form-control' placeholder='Hak Akses' required/>
                </div>
								
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Nama Member</label>
                  <input type='text' name='nama_member'  class='form-control' placeholder='Nama Member' required/>
                </div>
                
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Bagian Member</label>
                  <input type='text' name='bagian_member'  class='form-control' placeholder='Bagian Member' required/>
                </div>
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Departemen Member</label>
                  <input type='text' name='departemen_member'  class='form-control' placeholder='Departemen Member' required/>
                </div>
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Email Member</label>
                  <input type='text' name='email_member'  class='form-control' placeholder='Email Member' required/>
                </div>
				<div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Alamat Member</label>
                  <input type='text' name='alamat_member'  class='form-control' placeholder='Alamat Member' required/>
                </div>
                <div class='form-group' style='padding-bottom: 20px;'>
                  <label for='Modal Name'>Kota Member</label>
                  <input type='text' name='kota_member'  class='form-control' placeholder='Kota Member' required/>
                </div>
              <div class='modal-footer'>
                  <button class='btn btn-success' type='submit'>
                      Confirm                  </button>

                  <button type='reset' class='btn btn-danger'  data-dismiss='modal' aria-hidden='true'>
                    Cancel                  </button>
              </div>
</form>
	";
	}
?>
</body>
</html>
