<!DOCTYPE html>
    <html>
        <head>
            <title>Transaki Pembelian</title>
            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="js/jquery.js"></script>
            <script src="js/jquery.ui.datepicker.js"></script>
            <script>
                //mendeksripsikan variabel yang akan digunakan
                var nota;
                var tanggal;
                var kode_obat;
                var nama_obat;
                var harga_beli_obat;
                var jumlah_beli;
                var jumlah_obat;
                $(function(){
                    //meload file pk dengan operator ambil barang dimana nantinya
                    //isinya akan masuk di combo box
                    $("#kode_obat").load("pk.php","op=ambilbarang");
                    
                    //meload isi tabel
                    $("#obat").load("pk.php","op=barang");
                    
                    //mengkosongkan input text dengan masing2 id berikut
                    $("#nama_obat").val("");
                    $("#harga_beli_obat").val("");
                    $("#jumlah_beli").val("");
                    $("#jumlah_obat").val("");
                                
                    //jika ada perubahan di kode barang
                    $("#kode_obat").change(function(){
                        kode_obat=$("#kode_obat").val();
                        
                        //tampilkan status loading dan animasinya
                        $("#status").html("loading. . .");
                        $("#loading").show();
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"proses.php",
                            data:"op=ambildata&kode_obat="+kode_obat,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                                $("#nama_obat").val(data[0]);
                                $("#harga_beli_obat").val(data[1]);
                                $("#jumlah_obat").val(data[3]);
                                $("#jumlah_beli").focus();
                                //hilangkan status animasi dan loading
                                $("#status").html("");
                                $("#loading").hide();
                            }
                        });
                    });
                    
                    //jika tombol tambah di klik
                    $("#tambah").click(function(){
                        kode_obat=$("#kode_obat").val();
                        jumlah_obat=$("#jumlah_obat").val();
                        jumlah_beli=$("#jumlah_beli").val();
                        if(kode_obat=="Kode Obat"){
                            alert("Kode Obat Harus diisi");
                            exit();

                        }else if(jumlah_beli < 1){
                            alert("Jumlah beli tidak boleh 0");
                            $("#jumlah_beli").focus();
                            exit();
                        }
                        nama_obat=$("#nama_obat").val();
                        harga_beli_obat=$("#harga_beli_obat").val();
                        
                                                
                        $("#status").html("sedang diproses. . .");
                        $("#loading").show();
                        
                        $.ajax({
                            url:"pk.php",
                            data:"op=tambah&kode_obat="+kode_obat+"&nama_obat="+nama_obat+"&harga_beli_obat="+harga_beli_obat+"&jumlah_beli="+jumlah_beli,
                            cache:false,
                            success:function(msg){
                                if(msg=="sukses"){
                                    $("#status").html("Berhasil disimpan. . .");
                                }else{
                                    $("#status").html("ERROR. . .");
                                }
                                $("#loading").hide();
                                $("#nama_obat").val("");
                                $("#harga_beli_obat").val("");
                                $("#jumlah_beli").val("");
                                $("#jumlah_obat").val("");
                                $("#kode_obat").load("pk.php","op=ambilbarang");
                                $("#obat").load("pk.php","op=barang");
                            }
                        });
                    });
                    
                    //jika tombol proses diklik
                    $("#proses").click(function(){
                        nota=$("#nota").val();
                        tanggal=$("#tanggal").val();
                        
                        $.ajax({
                            url:"pk.php",
                            data:"op=proses&nota="+nota+"&tanggal="+tanggal,
                            cache:false,
                            success:function(msg){
                                if(msg=='sukses'){
                                    $("#status").html('Transaksi Pembelian berhasil');
                                    alert('Transaksi Berhasil');
                                    exit();
                                }else{
                                    $("#status").html('Transaksi Gagal');
                                    alert('Transaksi Gagal');
                                    exit();
                                }
                                $("#kode_obat").load("pk.php","op=ambilbarang");
                                $("#obat").load("pk.php","op=barang");
                                $("#loading").hide();
                                $("#nama_obat").val("");
                                $("#harga_beli_obat").val("");
                                $("#jumlah_beli").val("");
                                $("#jumlah_obat").val("");
                            }
                        })
                    })
                });
            </script>
        </head>
        <body>
            <div class="container">
                <?php
                $host="localhost";
                $user="root";
                $pass="";
                $con = mysqli_connect($host,$user,$pass,"a121705697") or die ("Error Connect DB ".mysql_error());

                $p=isset($_GET['act'])?$_GET['act']:null;
                switch($p){
                    default:
                        echo "<table class='table table-bordered'>
                            <tr>
                                <td colspan='3'><a href='?page=beli&act=tambah' class='btn btn-primary'>Input Transaksi</a></td>
                            </tr>
                                <tr>
                                    <td>No.Nota</td>
                                    <td>Tanggal</td>
                                    <td>Total</td>
                                    <td>Tools</td>
                                </tr>";
                                $query=mysqli_query($con,"select * from pembelian");
                                while($r=mysqli_fetch_array($query)){
                                    echo "<tr>
                                            <td><a href='?page=beli&act=detail&nota=$r[nonota]'>$r[nonota]</a></td>
                                            <td>$r[tanggal]</td>
                                            <td>$r[total]</td>
                                            <td><a href='?page=beli&act=detail&nota=$r[nonota]'>Cetak Nota</a></td>
                                        </tr>";
                                }
                                echo"</table>";
                        
                        break;
                    case "tambah":
                        $tgl=date('Y-m-d');
                        //untuk autonumber di nota
                        $auto=mysqli_query($con,"select * from pembelian order by nonota desc limit 1");
                        $no=mysqli_fetch_array($auto);
                        $angka=$no['nonota']+1;
                        echo "<div class='navbar-form pull-right'>
                                No. Nota : <input type='text' id='nota' value='$angka' readonly >
                                <input type='text' id='tanggal' value='$tgl' readonly>   
                            </div>";
                            
                            echo'<legend>Transaksi Pembelian</legend>
                            <label>Kode Barang</label>
                            <select id="kode_obat"></select>
                            <input type="text" id="nama_obat" placeholder="Nama Barang" readonly>
                            <input type="text" id="harga_beli_obat" placeholder="Harga" class="span2" readonly>
                            <input type="text" id="jumlah_obat" placeholder="stok" class="span1" readonly>
                            <input type="text" id="jumlah_beli" placeholder="Jumlah Beli" class="span1">
                            <button id="tambah" class="btn">Tambah</button>
                            
                            <span id="status"></span>
                            <table id="obat" class="table table-bordered">
                                    
                            </table>
                            <div class="form-actions">
                                <button id="proses">Proses</button>
                            </div>';
                        break;
                    case "detail":
                        echo "<legend>Nota Pembelian</legend>";
                        $nota=$_GET['nota'];
                        $query=mysqli_query($con,"select pembelian.nonota,detailpembelianbeli.kode_obat,obat.nama_obat,
                                           detailpembelianbeli.harga_beli_obat,detailpembelianbeli.jumlah_beli,detailpembelianbeli.subtotal
                                           from detailpembelianbeli,pembelian,obat
                                           where pembelian.nonota=detailpembelianbeli.nonota and obat.kode_obat=detailpembelianbeli.kode_obat
                                           and detailpembelianbeli.nonota='$nota'");
                        $nomor=mysqli_fetch_array(mysqli_query($con,"select * from pembelian where nonota='$nota'"));
                        echo "<div class='navbar-form pull-right'>
                                Nota : <input type='text' value='$nomor[nonota]' disabled>
                                <input type='text' value='$nomor[tanggal]' disabled>
                            </div>";
                        echo "<table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <td>Kode Obat</td>
                                        <td>Nama</td>
                                        <td>Harga</td>
                                        <td>Jumlah</td>
                                        <td>Subtotal</td>
                                    </tr>
                                </thead>";
                                while($r=mysqli_fetch_row($query)){
                                    echo "<tr>
                                            <td>$r[1]</td>
                                            <td>$r[2]</td>
                                            <td>$r[3]</td>
                                            <td>$r[4]</td>
                                            <td>$r[5]</td>
                                        </tr>";
                                }
                                echo "<tr>
                                        <td colspan='4'><h4 align='right'>Total</h4></td>
                                        <td colspan='5'><h4>$nomor[total]</h4></td>
                                    </tr>
                                    </table>";
                        break;
                }
                ?>
            </div>
        </body>
    </html>