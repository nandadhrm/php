<!DOCTYPE html>
    <html>
        <head>
            <title>Form Barang</title>
            <script src="js/jquery.js"></script>
            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="js/jquery.js"></script>
            <script src="js/jquery.ui.datepicker.js"></script>
            <script>
                //mengidentifikasikan variabel yang kita gunakan
                var kode_obat;
                var nama_obat;
                var harga_beli_obat;
                var harga_jual_obat;
                var jumlah_obat;
                $(function(){
                    $("#kode_obat").load("proses.php","op=kode_obat");
                    $("#obat").load("proses.php","op=barang");
                    
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
                                $("#harga_jual_obat").val(data[2]);
                                $("#jumlah_obat").val(data[3]);
                                
                                
                                //hilangkan status animasi dan loading
                                $("#status").html("");
                                $("#loading").hide();
                            }
                        });
                    });
                    
                    //cek kode barang yang sudah ada
                    $("#kode2").change(function(){
                        var kd=$("#kode2").val();
                        
                        $.ajax({
                            url:"proses.php",
                            data:"op=cek&kode_obat="+kd,
                            success:function(data){
                                if(data==0){
                                    $("#pesan").html('Kode Barang Bisa digunakan');
                                    $("#kode2").css('border','3px #090 solid');
                                }else{
                                    $("#pesan").html('Kode Barang sudah ada');
                                    $("#kode2").css('border','3px #c33 solid');
                                }
                            }
                        });
                    });
                    
                    //ketika tombol update di klik
                    $("#update").click(function(){
                        //cek apakah kode barang kosong atau tidak
                        kode_obat=$("#kode_obat").val();
                        if(kode_obat=="Kode Obat"){
                            alert("Pilih Kode Obat dulu");
                            exit();
                        }
                        nama_obat=$("#nama_obat").val();
                        harga_beli_obat=$("#harga_beli_obat").val();
                        harga_jual_obat=$("#harga_jual_obat").val();
                        jumlah_obat=$("#jumlah_obat").val();
                        
                        //tampilkan status update
                        $("#status").html('sedang diupdate. . .');
                        $("#loading").show();
                        
                        $.ajax({
                            url:"proses.php",
                            data:"op=update&kode_obat="+kode_obat+"&nama_obat="+nama_obat+"&harga_beli_obat="+harga_beli_obat+"&harga_jual_obat="+harga_jual_obat+"&jumlah_obat="+jumlah_obat,
                            cache:false,
                            success:function(msg){
                                if(msg=='Sukses'){
                                    $("#status").html('Update Berhasil. . .');
                                }else{
                                    $("#status").html('ERROR. . .')
                                }
                                $("#loading").hide();
                                $("#nama_obat").val("");
                                $("#harga_jual_obat").val("");
                                $("#harga_beli_obat").val("");
                                $("#jumlah_obat").val("");
                                $("#obat").load("proses.php","op=barang");
                                $("#kode_obat").load("proses.php","op=kode");
                            }
                        });
                    });
                    
                    //ketika tombol hapus diklik
                    $("#hapus").click(function(){
                        kode_obat=$("#kode_obat").val();
                        if(kode_obat=="Kode Obat"){
                            alert("Kode Obat belim dipilih");
                            exit();
                        }
                        $("#status").html('Sedang Dihapus. . .');
                        $("#loading").show();
                        
                        $.ajax({
                            url:"proses.php",
                            data:"op=delete&kode_obat="+kode_obat,
                            cache:false,
                            success:function(msg){
                                if(msg=="sukses"){
                                    $("#status").html('Berhasil Dihapus. . .');
                                }else{
                                    $("#status").html('ERROR. . .');
                                }
                                $("#nama_obat").val("");
                                $("#harga_jual_obat").val("");
                                $("#harga_beli_obat").val("");
                                $("#jumlah_obat").val("");
                                $("#obat").load("proses.php","op=barang");
                                $("#kode_obat").load("proses.php","op=kode");
                                
                            }
                        });
                    });
                    
                    //ketika tombol simpan diklik
                    $("#simpan").click(function(){
                        kode=$("#kode2").val();
                        if(kode==""){
                            alert("Kode Obat Harus diisi");
                            exit();
                        }
                        nama=$("#nama_obat").val();
                        beli=$("#harga_beli_obat").val();
                        jual=$("#harga_jual_obat").val();
                        stok=$("#jumlah_obat").val();
                        
                        $("#status").html("sedang diproses. . .");
                        $("#loading").show();
                        
                        $.ajax({
                            url:"proses.php",
                            data:"op=simpan&kode_obat="+kode_obat+"&nama_obat="+nama_obat+"&harga_beli_obat="+harga_beli_obat+"&harga_jual_obat="+harga_jual_obat+"&jumlah_obat="+jumlah_obat,
                            cache:false,
                            success:function(msg){
                                if(msg=="sukses"){
                                    $("#status").html("Berhasil disimpan. . .");
                                }else{
                                    $("#status").html("ERROR. . .");
                                }
                                $("#loading").hide();
                                $("#nama_obat").val("");
                                $("#harga_jual_obat").val("");
                                $("#harga_beli_obat").val("");
                                $("#jumlah_obat").val("");
                                $("#kode2").val("");
                            }
                        });
                    });
                });
            </script>
        </head>
        <body>
            <?php
            $p=isset($_GET['act'])?$_GET['act']:null;
            switch($p){
                default:
                    echo'
                        <legend>Data Obat</legend>
                        <label>Kode Obat</label>
                        <select id="kode_obat"></select>
                        <input type="text" id="nama_obat" placeholder="Nama Barang" class="span2">
                        <input type="text" id="harga_beli_obat" placeholder="Harga Beli" class="span2">
                        <input type="text" id="harga_jual_obat" placeholder="Harga Jual" class="span2">
                        <input type="text" id="jumlah_obat" placeholder="Stok" class="span1">
                        <button id="update" class="btn">Update</button>
                        <button id="hapus" class="btn">Hapus</button>
                    <div id="status"></div><br>
                    <div id="barang"></div>';
                    break;
                case "tambah":
                        echo'<legend>Tambah Data Barang</legend>
                        <label>Kode Barang</label>
                            <input type="text" id="kode2"> <span id="pesan"></span>
                        <label>Nama Barang</label>
                            <input type="text" id="nama" >
                        <label>Harga Beli</label>
                            <input type="text" id="beli" >
                        <label>Harga Jual</label>
                            <input type="text" id="jual" >
                        <label>Stok</label>
                            <input type="text" id="stok" class="span1">
                        <label></label>
                        <button id="simpan" class="btn">Simpan</button>
                        <a href="?page=barang" class="btn">Kembali</a>
                        <div id="status"></div>';
                    break;
            }
            ?>
        </body>
    </html>