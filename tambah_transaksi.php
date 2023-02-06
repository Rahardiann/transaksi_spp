<?php
    require_once("require.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tambah Transaksi</title>
        <link href="IMG/LOGO.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="css/main_style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    </head>
    <body class="bg-gradient-purple">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New Transaction</h1>
                                </div><hr>
                                <form class="user" action="" method="POST">
                                    <select required name="petugas" class="custom-select custom-select-sm form-control form-control-sm"> 
                                        <option value="">Pilih Petugas</option>
                                        <?php
                                            $petugas = mysqli_query($db, "SELECT * FROM petugas");
                                            while($r = mysqli_fetch_assoc($petugas)){ ?>
                                                <option value="<?= $r['id_petugas']; ?>"><?= $r['nama_petugas']; ?></option>
                                        <?php } ?>
                                    </select><br><br>
                                    <select required name="siswa" class="custom-select custom-select-sm form-control form-control-sm"> 
                                        <option value="">Pilih Siswa</option>
                                        <?php
                                            $siswa = mysqli_query($db, "SELECT * FROM siswa");
                                            while($r = mysqli_fetch_assoc($siswa)){ ?>
                                                <option value="<?= $r['NISN']; ?>"><?= $r['nama']; ?></option>
                                        <?php } ?>
                                    </select><br><br>
                                    <select required name="spp" class="custom-select custom-select-sm form-control form-control-sm"> 
                                        <option value="">Pilih SPP</option>
                                        <?php
                                            $spp = mysqli_query($db, "SELECT * FROM spp");
                                            while($r = mysqli_fetch_assoc($spp)){
                                                var_dump($r);
                                                 ?>
                                            <option value="<?= $r['id_spp']; ?>"><?= $r['bulan'] . " | " . $r['nominal']; ?></option>
                                        <?php } ?>          
                                    </select><br><br>
                                    
                                    <input type="number" name="jumlah_bayar" class="custom-select custom-select-sm form-control form-control-sm"><br><br>
                                   
                                    <button type="submit" name="simpan" class="btn btn-info btn-user btn-block">
                                        Add New Transaction
                                    </button>
                                    <hr>
                                    <a href="transaksi.php" class="btn btn-danger btn-user btn-block">
                                        Cancel
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="VENDOR/jquery.min.txt"></script>
        <script src="VENDOR/bootstrap.min.js"></script>
        <script src="VENDOR/bar.js"></script>
        <script src="VENDOR/jquery.tables.min.js"></script>
        <script src="VENDOR/bootstrap.table.min.js"></script>
    </body>
</html>
<?php
    // Kita simpan proses simpan datanya disini
    if(isset($_POST['simpan'])){
        $petugas    = $_POST['petugas'];
        $nama       = $_POST['siswa'];
        $spp        = $_POST['spp'];        
        //$tanggal    = date('Y-m-d', strtotime($date));
        $cek        = mysqli_query($db, "SELECT * FROM pembayaran WHERE nisn='$nama' and id_spp='$spp'");
        $cekjml     = mysqli_query($db, "SELECT * FROM spp WHERE id_spp='$spp'");
        $ambil      = mysqli_fetch_assoc($cekjml);
        $jumlah = $_POST['jumlah_bayar'];
        $tahun = $ambil['tahun'];
        $bulan = $ambil['bulan'];
        if(mysqli_num_rows($cek)>0){
            echo "<script>alert('SPP tersebut sudah ada pada siswa');</script>";
        }else{
            if($jumlah<$ambil['nominal']){
                $simpan = mysqli_query($db,"INSERT INTO pembayaran(id_petugas, NISN, tgl_bayar, bulan_spp, tahun_spp, id_spp, jumlah_bayar, keterangan) VALUES ('$petugas', '$nama', CURRENT_TIMESTAMP(), '$bulan', '".$tahun."', '".$spp."', '".$jumlah."', 'belum lunas')");

                if($simpan){
                    ?>
                    <meta content="0; url=transaksi.php" http-equiv="refresh"> 
                    <?php
                }else{
                    echo "<script>alert('gagal');</script>";
                }      
            }elseif($jumlah>=$ambil['nominal']){
                $simpan = mysqli_query($db,"INSERT INTO pembayaran(id_petugas, NISN, tgl_bayar, bulan_spp, tahun_spp, id_spp, jumlah_bayar, keterangan) VALUES ('$petugas', '$nama', CURRENT_TIMESTAMP(), '$bulan', '".$tahun."', '".$spp."', '".$jumlah."', 'lunas')");
                if($simpan){
                    ?>
                    <meta content="0; url=transaksi.php" http-equiv="refresh"> 
                    <?php
                }else{
                    echo "<script>alert('gagal');</script>";
                }
            }      
        }
    }
?>