<?php
    session_start();
    require_once("koneksi.php");
    // Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }else{
        // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
        $username = $_SESSION['username'];
    }
?>
<html>
    <head>
        <title>Dashboard</title>
        <link href="IMG/LOGO.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="css/main_style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-purple sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Nama Aplikasi -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">MOKLETMONEY</div>
                </a>
                <hr class="sidebar-divider my-0">
                <!-- Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    OPTION
                </div>
                <?php
                    $panggil    = mysqli_query($db, "SELECT * FROM petugas WHERE username='$username'");
                    $hasil      = mysqli_fetch_assoc($panggil);
                    if($hasil['level'] == "Administrator"){ 
                ?>
                <!-- Pilihan Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Data Pengguna</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pilihan Data</h6>
                            <a class="collapse-item" href="siswa.php">Data Siswa</a>
                            <a class="collapse-item" href="petugas.php">Data Petugas</a>
                        </div>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Data Lainnya</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pilihan Data</h6>
                            <a class="collapse-item" href="kelas.php">Data Kelas</a>
                            <a class="collapse-item" href="spp.php">Data SPP</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    OTHER
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Transaksi Pembayaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Histori Pembayaran</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <!-- jika login sebagai petugas  -->
                <?php
                    }else{ 
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Transaksi Pembayaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Histori Pembayaran</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <?php } ?>
                <!-- Tombol Persempit -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Tombol Hilangkan -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <!-- User Info -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $hasil['nama_petugas'] ?></span>
                                    <img class="img-profile rounded-circle"src="IMG/foto.png">
                                </a>
                                <!-- Logout -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid">
                        <h2 class="m-0 font-weight-bold text-purple">Dashboard</h2><hr>
                        <h5 class="m-0 font-weight-bold text-young-purple">Selamat Datang di Aplikasi Pembayaran SPP</h5><hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-pink shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-pink text-uppercase mb-1">
                                                    Total Transaksi</div>
                                                <?php 
                                                    $uang       = mysqli_query($db, "SELECT SUM(jumlah_bayar) AS jumlah_uang from pembayaran where keterangan='lunas'"); 
                                                    $uangnya    = mysqli_fetch_array($uang)
                                                ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=$uangnya['jumlah_uang']?>,00</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-coins fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-pink shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-pink text-uppercase mb-1">
                                                    Total SPP</div>
                                                <?php 
                                                    $spp        = mysqli_query($db, "SELECT SUM(nominal) AS jumlah_spp from spp"); 
                                                    $sppnya     = mysqli_fetch_array($spp)
                                                ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=$sppnya['jumlah_spp']?>,00</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-coins fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Petugas</div>
                                                <?php 
                                                    $petugas        = mysqli_query($db, "SELECT COUNT(*) as jmlpetugas FROM petugas"); 
                                                    $petugasnya     = mysqli_fetch_array($petugas)
                                                ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$petugasnya['jmlpetugas']?> Orang</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Siswa</div>
                                                <?php 
                                                    $siswa      = mysqli_query($db, "SELECT COUNT(*) as jmlsiswa FROM siswa"); 
                                                    $siswanya   = mysqli_fetch_array($siswa)
                                                ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$siswanya['jmlsiswa']?> Orang</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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