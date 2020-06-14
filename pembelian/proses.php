<?php
	$host="localhost";
	$user="root";
	$pass="";
	$con = mysqli_connect($host,$user,$pass,"a121705697") or die ("Error Connect DB ".mysql_error());
    
$data=mysqli_query($con,"select * from obat");
$op=isset($_GET['op'])?$_GET['op']:null;

if($op=='kode_obat'){
    echo"<option>Kode Obat</option>";
    while($r=mysqli_fetch_array($data)){
        echo "<option value='$r[kode_obat]'>$r[kode_obat]</option>";
    }
}elseif($op=='barang'){
    echo'<table id="barang" class="table table-hover">
    <thead>
            <tr>
                <Td colspan="5"><a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Barang</a></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Jumlah Obat</td>
            </tr>
        </thead>';
	while ($b=mysqli_fetch_array($data)){
        echo"<tr>
                <td>$b[kode_obat]</td>
                <td>$b[nama_obat]</td>
                <td>$b[harga_beli_obat]</td>
                <td>$b[harga_jual_obat]</td>
                <td>$b[jumlah_obat]</td>
            </tr>";
        }
    echo "</table>";
}elseif($op=='ambildata'){
    $kode_obat=$_GET['kode_obat'];
    $dt=mysqli_query($con,"select * from obat where kode_obat='$kode_obat'");
    $d=mysqli_fetch_array($dt);
    echo $d['nama_obat']."|".$d['harga_beli_obat']."|".$d['harga_jual_obat']."|".$d['jumlah_obat'];
}elseif($op=='cek'){
    $kode_obat=$_GET['kode_obat'];
    $sql=mysqli_query($con,"select * from obat where kode_obat='$kode_obat'");
    $cek=mysqli_num_rows($sql);
    echo $cek;
}elseif($op=='update'){
    $kode_obat=$_GET['kode_obat'];
    $nama_obat=htmlspecialchars($_GET['nama_obat']);
    $harga_beli_obat=htmlspecialchars($_GET['harga_beli_obat']);
    $harga_jual_obat=htmlspecialchars($_GET['harga_jual_obat']);
    $jumlah_obat=htmlspecialchars($_GET['jumlah_obat']);
    
    $update=mysqli_query($con,"update obat set nama_obat='$nama_obat',
                        harga_beli_obat='$harga_beli_obat',
                        harga_jual_obat='$harga_jual_obat',
                        jumlah_obat='$jumlah_obat'
                        where kode_obat='$kode_obat'");
    if($update){
        echo "Sukses";
    }else{
        echo "ERROR. . .";
    }
}elseif($op=='delete'){
    $kode_obat=$_GET['kode_obat'];
    $del=mysqli_query($con,"delete from obat where kode_obat='$kode_obat'");
    if($del){
        echo "sukses";
    }else{
        echo "ERROR";
    }
}elseif($op=='simpan'){
    $kode_obat=$_GET['kode_obat'];
    $nama_obat=htmlspecialchars($_GET['nama_obat']);
    $harga_jual_obat=htmlspecialchars($_GET['harga_jual_obat']);
    $harga_beli_obat=htmlspecialchars($_GET['harga_beli_obat']);
    $jumlah_obat=htmlspecialchars($_GET['jumlah_obat']);
    
    $tambah=mysqli_query($con,"insert into obat (kode_obat,nama_obat,harga_jual_obat,harga_beli_obat,jumlah_obat)
                        values ('$kode_obat','$nama_obat','$harga_beli_obat','$harga_jual_obat','$jumlah_obat')");
    if($tambah){
        echo "sukses";
    }else{
        echo "error";
    }
}
?>