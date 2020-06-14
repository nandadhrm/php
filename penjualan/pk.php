<?php
	$host="localhost";
	$user="root";
	$pass="";
    $con = mysqli_connect($host,$user,$pass,"a121705697") or die ("Error Connect DB ".mysql_error());
    
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='ambilbarang'){
    $data=mysqli_query($con,"select * from obat");
    echo"<option>Kode Obat</option>";
    while($r=mysqli_fetch_array($data)){
        echo "<option value='$r[kode_obat]'>$r[kode_obat]</option>";
    }
}elseif($op=='ambildata'){
    $kode_obat=$_GET['kode_obat'];
    $dt=mysqli_query($con,"select * from obat where kode_obat='$kode_obat'");
    $d=mysqli_fetch_array($dt);
    echo $d['nama_obat']."|".$d['harga_jual_obat']."|".$d['jumlah_obat'];
}elseif($op=='barang'){
    $brg=mysqli_query($con,"select * from tblsementarajual");
    echo "<thead>
            <tr>
                <td>Kode Obat</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Jumlah Beli</td>
                <td>Subtotal</td>
                <td>Tools</td>
            </tr>
        </thead>";
    $total=mysqli_fetch_array(mysqli_query($con,"select sum(subtotal) as total from tblsementarajual"));
    while($r=mysqli_fetch_array($brg)){
        echo "<tr>
                <td>$r[kode_obat]</td>
                <td>$r[nama_obat]</td>
                <td>$r[harga_jual_obat]</td>
                <td><input type='text' name='jum' value='$r[jumlah_jual]' class='span2'></td>
                <td>$r[subtotal]</td>
                <td><a href='pk.php?op=hapus&kode_obat=$r[kode_obat]' id='hapus'>Hapus</a></td>
            </tr>";
    }
    echo "<tr>
        <td colspan='3'>Total</td>
        <td colspan='4'>$total[total]</td>
    </tr>";
}elseif($op=='tambah'){
    $kode_obat=$_GET['kode_obat'];
    $nama_obat=$_GET['nama_obat'];
    $harga_jual_obat=$_GET['harga_jual_obat'];
    $jumlah_jual=$_GET['jumlah_jual'];
    $subtotal=$harga_jual_obat*$jumlah_jual;
    
    $tambah=mysqli_query($con,"INSERT into tblsementarajual (kode_obat,nama_obat,harga_jual_obat,jumlah_jual,subtotal)
                        values ('$kode_obat','$nama_obat','$harga_jual_obat','$jumlah_jual','$subtotal')");
    
    if($tambah){
        echo "sukses";
    }else{
        echo "ERROR";
    }
}elseif($op=='hapus'){
    $kode_obat=$_GET['kode_obat'];
    $del=mysqli_query($con,"delete from tblsementarajual where kode_obat='$kode_obat'");
    if($del){
        echo "<script>window.location='index.php?page=jual&act=tambah';</script>";
    }else{
        echo "<script>alert('Hapus Data Berhasil');
            window.location='index.php?page=jual&act=tambah';</script>";
    }
}elseif($op=='proses'){
    $nota=$_GET['nota'];
    $tanggal=$_GET['tanggal'];
    $to=mysqli_fetch_array(mysqli_query($con,"select sum(subtotal) as total from tblsementarajual"));
    $tot=$to['total'];
    $simpan=mysqli_query($con,"insert into penjualan(nonota,tanggal,total)
                        values ('$nota','$tanggal','$tot')");
    if($simpan){
        $query=mysqli_query($con,"select * from tblsementarajual");
        while($r=mysqli_fetch_row($query)){
            mysqli_query($con,"insert into detailpenjualanjual(nonota,kode_obat,harga_jual_obat,jumlah_jual,subtotal)
                        values('$nota','$r[0]','$r[2]','$r[3]','$r[4]')");
            mysqli_query($con,"update obat set jumlah_obat=jumlah_obat-'$r[3]'
                        where kode_obat='$r[0]'");
        }
        //hapus seluruh isi tabel sementara
        mysqli_query($con,"truncate table tblsementarajual");
        echo "sukses";
    }else{
        echo "ERROR";
    }
}
?>