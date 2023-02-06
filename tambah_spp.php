<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tambah SPP</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Add New SPP</h1>
                                </div><hr>
                                <form class="user" action="" method="POST"><br>
                                    <select required name="bulan" class="custom-select custom-select-sm form-control form-control-sm"> 
                                        <option value="">Pilih Bulan</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>   
                                        <option value="Maret">Maret</option> 
                                        <option value="April">April</option>   
                                        <option value="Mei">Mei</option>     
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option> 
                                        <option value="September">September</option>  
                                        <option value="Oktober">Oktober</option>   
                                        <option value="November">November</option>   
                                        <option value="Desember">Desember</option>            
                                    </select> <br><br>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nominal" placeholder="Nominal" required>
                                    </div><br>
                                    <button type="submit" name="simpan" class="btn btn-info btn-user btn-block">
                                        Register SPP
                                    </button>
                                    <hr>
                                    <a href="spp.php" class="btn btn-danger btn-user btn-block">
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
        $bulan      = $_POST['bulan'];
        $nominal    = $_POST['nominal'];
        $cek        = mysqli_query($db, "SELECT * FROM spp WHERE bulan='$bulan' and nominal='$nominal'");
        if(mysqli_num_rows($cek)>0){
                echo "<script>alert('spp sudah terdaftar');</script>";
        }else{
            $simpan     = mysqli_query($db, "INSERT INTO spp VALUES (NULL, '$bulan', '$nominal')");
            if($simpan){
                ?>
                <meta content="0; url=spp.php" http-equiv="refresh"> 
                <?php
            }else{
                echo "<script>alert('Data sudah ada');</script>";
            }
        }
    }
?>