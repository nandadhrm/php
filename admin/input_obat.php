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
          <form action="index.php?page=simpan_obat" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Kode Obat</label>
                  <input type="text" name="kode_obat"  class="form-control" placeholder="Kode Obat" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Nama Obat</label>
                  <input type="text" name="nama_obat"  class="form-control" placeholder="Nama Obat" required/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Selection">Jenis Obat</label>
					<select name="jenis_obat" class="form-control" placeholder="Jenis Obat" required/>
                    	<option>Biasa</option>
						<option>Sedang</option>
                        <option>Keras</option>
                    </select>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Selection">Satuan Obat</label>
					<select name="satuan_obat" class="form-control" placeholder="Satuan Obat" required/>
                    	<option>Tablet</option>
						<option>Botol</option>
                        <option>Ampul</option>
                    </select>
                </div>
								
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Jumlah Obat</label>
                  <input type="text" name="jumlah_obat"  class="form-control" placeholder="Jumlah Obat" required/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Harga Beli Obat</label>
                  <input type="text" name="harga_beli_obat"  class="form-control" placeholder="Harga Beli Obat" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Harga Jual Obat</label>
                  <input type="text" name="harga_jual_obat"  class="form-control" placeholder="Harga Jual Obat" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Foto Produk</label>
                  <input type="file" name="foto_obat"  class="form-control" placeholder="Foto Obat" required/>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>
              </form>
            </div>
</body>
</html>