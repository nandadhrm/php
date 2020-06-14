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
	  <p><?php echo "<a href='index.php?page=input_pemasok' class='btn btn-success'>Add Data</a>"; ?></p>
	 <table width="91%" class="table table-bordered" id="mytable">
   		 <thead>
	   		<th width="5%">Id</th>
     		<th width="13%">Name</th>
			<th width="13%">Alamat</th>
			<th width="13%">Kota</th>
      		<th width="5%">Telepon</th>
			<th width="8%">Perusahaan</th>
			<th width="8%">Alamat Perusahaan</th>
      <th width="8%">Kota Perusahaan</th>
			<th width="8%">Telepon Perusahaan</th>
      <th width="8%">Email</th>
      <th colspan="2">Action</th>

   		 </thead>
		<?php 
 		 //menampilkan data mysqli
  		$host="localhost";
      $user="root";
      $pass="";
      $con=mysqli_connect($host,$user,$pass,"a121705697") or die("Error Connect DB ".mysql_error());
      
      $modal=mysqli_query($con,"SELECT * FROM pemasok");
  		while($r=mysqli_fetch_row($modal)){
		?>
  <tr>
      <td><?php echo  $r[0];; ?></td>
      <td><?php echo  $r[1]; ?></td>
      <td><?php echo  $r[2]; ?></td>
	    <td><?php echo  $r[3]; ?></td>
	    <td><?php echo  $r[4]; ?></td>
	    <td><?php echo  $r[5]; ?></td>
	    <td><?php echo  $r[6]; ?></td>
      <td><?php echo  $r[7]; ?></td>
      <td><?php echo  $r[8]; ?></td>
      <td><?php echo  $r[9]; ?></td>
      
     <td width="3%">
         <!--<a href="#" class='open_modal' id='<?php echo  $r['modal_id']; ?>'>Edit</a>-->
		 <a href="index.php?page=edit_pemasok&amp;id_pemasok='<?php echo  $r[0]; ?>'"  class="open_modal">Edit</a>	  </td>
	  <td width="3%">	
		 <a href="#" onClick="confirm_modal('delete_pemasok.php?&id_pemasok=<?php echo  $r[0]; ?>')">Delete</a>      </td>
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
