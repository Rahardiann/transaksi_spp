<?php
    require_once("require.php");
    $id     = $_GET['id'];
    $kelas  = mysqli_query($db, "SELECT * FROM kelas WHERE id_kelas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Kelas</title>
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
                            <div class="text-center"><br>
                                <h1 class="h4 text-gray-900 mb-4">Update Class</h1>
                            </div><hr>
                            <?php while($row = mysqli_fetch_assoc($kelas)){?>
                                <form class="user" action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama" value="<?= $row['nama_kelas']; ?>" placeholder="Nama Kelas" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="kk" value="<?= $row['kompetensi_keahlian']; ?>" placeholder="Kompentensi Keahlian" required>
                                    </div><br>
                                    <button type="submit" name="simpan" class="btn btn-warning btn-user btn-block">
                                        Update Class
                                    </button>
                                    <hr>
                                    <a href="kelas.php" class="btn btn-danger btn-user btn-block">
                                        Cancel Update
                                    </a><br>
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
        $id     = $_POST['id'];
        $nama   = $_POST['nama'];
        $kk     = $_POST['kk'];
        $cek    = mysqli_query($db, "SELECT * FROM kelas WHERE nama_kelas='$nama' and kompetensi_keahlian='$kk'");
        if(mysqli_num_rows($cek)>0){
            echo "<script>alert('kelas sudah terdaftar');</script>";
        }else{
            $update = mysqli_query($db, "UPDATE kelas SET nama_kelas='$nama', kompetensi_keahlian='$kk' WHERE kelas.id_kelas='$id'");
            if($update){
                ?>
                <meta content="0; url=kelas.php" http-equiv="refresh"> 
                <?php
            }else{
                echo "<script>alert('Gagal'); </script>";
            }
        }
    }
?>