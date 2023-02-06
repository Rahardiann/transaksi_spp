<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tambah Petugas / Admin</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Create Admin Account</h1>
                                </div><hr>
                                <form class="user" action="" method="POST">
                                    <select required name="level" class="custom-select custom-select-sm form-control form-control-sm"> 
                                        <option value="">Pilih Level</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Petugas">Petugas</option>
                                    </select><br><br>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="user" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="pass" placeholder="Password" required>
                                    </div><br>
                                    <button type="submit" name="simpan" class="btn btn-info btn-user btn-block">
                                        Register Account
                                    </button>
                                    <hr>
                                    <a href="petugas.php" class="btn btn-danger btn-user btn-block">
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
        $user   = $_POST['user'];
        $pass   = $_POST['pass'];
        $nama   = $_POST['nama'];
        $level  = $_POST['level'];
        $cek = mysqli_query($db, "SELECT * FROM petugas WHERE username='$user'");
        if(mysqli_num_rows($cek)>0){
            echo "<script>alert('username sudah terdaftar');</script>";
        }else{
            $simpan = mysqli_query($db, "INSERT INTO petugas VALUES(NULL, '$user', '".$pass."', '$nama', '$level')");
            if($simpan){
                ?>
                <meta content="0; url=petugas.php" http-equiv="refresh"> 
                <?php
            }else{
                echo "<script>alert('Data sudah ada');</script>";
            }
        }
    }
?>