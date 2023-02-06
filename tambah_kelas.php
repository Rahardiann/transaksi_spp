<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tambah Kelas</title>
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
                                <div class="text-center"> <br>
                                    <h1 class="h4 text-gray-900 mb-4">Create New Class</h1>
                                </div><hr>
                                <form class="user" action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Kelas" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="kk" placeholder="Kompentensi Keahlian" required>
                                    </div><br>
                                    <button type="submit" name="simpan" class="btn btn-info btn-user btn-block">
                                        Register Class
                                    </button>
                                    <hr>
                                    <a href="kelas.php" class="btn btn-danger btn-user btn-block">
                                        Cancel Register
                                    </a><br>
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
        $nama   = $_POST['nama'];
        $kk     = $_POST['kk'];
        $cek    = mysqli_query($db, "SELECT * FROM kelas WHERE nama_kelas='$nama' and kompetensi_keahlian='$kk'");
        if(mysqli_num_rows($cek)>0){
            echo "<script>alert('kelas sudah terdaftar');</script>";
        }else{
            $simpan = mysqli_query($db, "INSERT INTO kelas VALUES(NULL, '$nama', '$kk')");
            if($simpan){
                ?>
                <meta content="0; url=kelas.php" http-equiv="refresh"> 
                <?php
            }else{
                echo "<script>alert('Data sudah ada');</script>";
            }
        }
    }
?>