<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
 <div class="modal-body">
          <form action="index.php?page=simpan_member" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Username</label>
                  <input type="text" name="user_name"  class="form-control" placeholder="Username" required/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                      <label for="Modal Name">password</label>
					<input type="text" name="password" ="form-control" placeholder="Password" required/>    	
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Hak Akses</label>
					<input type="text" name="hak_akses" class="form-control" placeholder="Hak Akses" required/>
                </div>
								
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Nama Member</label>
                  <input type="text" name="nama_member"  class="form-control" placeholder="Nama Member" required/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Bagian Member</label>
                  <input type="text" name="bagian_member"  class="form-control" placeholder="Bagian Member" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Departemen Member</label>
                  <input type="text" name="departemen_member"  class="form-control" placeholder="Departemen Member" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Email Member</label>
                  <input type="text" name="email_member"  class="form-control" placeholder="Email Member" required/>
                </div>
				<div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Alamat Member</label>
                  <input type="text" name="alamat_member"  class="form-control" placeholder="Alamat Member" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Kota Member</label>
                  <input type="text" name="kota_member"  class="form-control" placeholder="Kota Member" required/>
                </div>
              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel                  </button>
              </div>
   </form>
            </div>
</body>
</html>