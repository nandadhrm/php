<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="Aguzrybudy" name="author"/>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<title>Untitled Document</title>
</head>

<body>
<div class="container">
	  <h2>Laporan Penjualan</h2>
	 <table width="91%" class="table table-bordered" id="mytable">
   		 <thead>
	   	<th width="5%">Nomor Nota</th>
     	<th width="13%">Tanggal</th>
			<th width="13%">Total</th>
   		 </thead>
		<?php 
 		 //menampilkan data mysqli
      $host="localhost";
      $user="root";
      $pass="";
      $con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());

  		$modal=mysqli_query($con,"SELECT * FROM penjualan");
  		while($r=mysqli_fetch_row($modal)){
		?>
  <tr>
    <td><?php echo  $r[0];; ?></td>
    <td><?php echo  $r[1]; ?></td>
    <td><?php echo  $r[2]; ?></td>
  </tr>
 

<?php } ?>
</table>
</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>	
</body>
</html>
