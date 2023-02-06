<?php
    require_once("require.php");
    $nisn  = $_GET['nisn'];
    $siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisn'");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Siswa</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Update Student Account</h1>
                                </div><hr>
                                <?php while($row = mysqli_fetch_assoc($siswa)){?>
                                    <form class="user" action="" method="POST">
                                        <input type="hidden" class="form-control form-control-user" required name="nisn" placeholder="NISN" value="<?= $row['nisn']; ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" required name="nama" placeholder="Nama Lengkap" value="<?= $row['nama']; ?>">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" required name="alamat" placeholder="Alamat Lengkap" value="<?= $row['alamat']; ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="tel" class="form-control form-control-user" required name="no" placeholder="Nomor Telepon" value="<?= $row['no_telp']; ?>">
                                            </div>
                                        </div>
                                        <select name="kelas" required class="custom-select custom-select-sm form-control form-control-sm"> 
                                            <option value="">Pilih Kelas</option>
                                            <?php
                                                $kelas = mysqli_query($db, "SELECT * FROM kelas");
                                                while($r = mysqli_fetch_assoc($kelas)){ ?>
                                                <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></option>
                                            <?php } ?>
                                        </select><br><br>
                                        <button type="submit" name="simpan" class="btn btn-warning btn-user btn-block">
                                            Update Account
                                        </button>
                                        <hr>
                                        <a href="siswa.php" class="btn btn-danger btn-user btn-block">
                                            Cancel Update
                                        </a>
                                    </form>
                                <?php } ?>
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
    // Proses update
    if(isset($_POST['simpan'])){
        $nisn   = $_POST['nisn'];
        $nama   = $_POST['nama'];
        $kelas  = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $no     = $_POST['no'];
        $update = mysqli_query($db, "UPDATE siswa SET nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no' WHERE siswa.nisn='$nisn'");
        if($update){
            ?>
            <meta content="0; url=siswa.php" http-equiv="refresh"> 
            <?php
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
    }
?>