<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tambah Siswa</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Create Student Account</h1>
                                </div><hr>
                                <form class="user" action="" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="NISN" placeholder="NISN" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" name="NIS" placeholder="NIS" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Lengkap" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="tel" class="form-control form-control-user" name="no_tlp" placeholder="Nomor Telepon" required>
                                        </div>
                                    </div>
                                    <select required name="id_kelas" class="custom-select custom-select-sm form-control form-control-sm"> 
                                        <option value="">Pilih Kelas</option>
                                        <?php
                                            $kelas = mysqli_query($db, "SELECT * FROM kelas");
                                            while($r = mysqli_fetch_assoc($kelas)){ ?>
                                            <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></option>
                                        <?php } ?>
                                    </select><br><br>
                                    <button type="submit" name="simpan" class="btn btn-info btn-user btn-block">
                                        Register Account
                                    </button>
                                    <hr>
                                    <a href="siswa.php" class="btn btn-danger btn-user btn-block">
                                        Cancel Register
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
    // Proses Simpan
    if(isset($_POST['simpan'])){
        $nisn   = $_POST['NISN'];
        $nis    = $_POST['NIS'];
        $nama   = $_POST['nama'];
        $kelas  = $_POST['id_kelas'];
        $alamat = $_POST['alamat'];
        $no     = $_POST['no_tlp'];
        $cek    = mysqli_query($db, "SELECT * FROM siswa WHERE NISN='$nisn'");
        if(mysqli_num_rows($cek)>0){
            echo "<script>alert('nisn sudah terdaftar');</script>";
        }else{
        $simpan = mysqli_query($db, "INSERT INTO siswa(NISN, NIS, nama, id_kelas, alamat, no_tlp) VALUES ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no')");
            if($simpan){
                ?>
                <meta content="0; url=transaksi.php" http-equiv="refresh"> 
                <?php
            }else{
                echo "<script>alert('Data sudah ada');</script>";
            }
        }
    }
?>