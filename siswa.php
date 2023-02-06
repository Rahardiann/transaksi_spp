<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SISWA</title>
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
                <li class="nav-item">
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
                    <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Data Pengguna</span>
                    </a>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pilihan Data</h6>
                            <a class="collapse-item active" href="siswa.php">Data Siswa</a>
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
                </div>
                <!-- UTAMA -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 font-weight-bold text-purple">Data Siswa SMK Telkom Malang</h1>
                    <p class="mb-4">Berikut adalah data terlengkap siswa SMK Telkom Malang</p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-pink">Data Lengkap Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="tambah_siswa.php" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Siswa</span>
                                </a><hr>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                            // mengatur halaman
                                            $totalDataHalaman   = 10;
                                            $data               = mysqli_query($db, "SELECT * FROM siswa");
                                            $hitung             = mysqli_num_rows($data);
                                            $totalHalaman       = ceil($hitung / $totalDataHalaman);
                                            $halAktif           = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
                                            $dataAwal           = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
                                            // memanggil tabel siswa
                                            $sql = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas ORDER BY nama LIMIT $dataAwal, $totalDataHalaman ");
                                            $no = 1;
                                            while($r = mysqli_fetch_assoc($sql)){ 
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $r['nisn']; ?></td>
                                            <td><?= $r['nis']; ?></td>
                                            <td><?= $r['nama']; ?></td>
                                            <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
                                            <td><?= $r['alamat']; ?></td>
                                            <td><?= $r['no_telp']; ?></td>
                                            <td>
                                                <a href="?hapus&nisn=<?= $r['nisn'];?>" onclick="return confirm('Apakah anda yakin untuk menghapusnya ?')" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a> 
                                                | 
                                                <a href="edit_siswa.php?nisn=<?= $r['nisn']; ?>" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table> <hr>
                                <!-- Tampilkan tombol halaman -->
                                <?php for($i=1; $i <= $totalHalaman; $i++): ?>
                                    <a href="?hal=<?= $i;?>"class="btn btn-warning btn-circle btn-sm">
                                        <i><?=$i;?></i>
                                    </a>
                                <?php endfor; ?>
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
    // Tombol Hapus ditekan
    if(isset($_GET['hapus'])){
        $nisn   = $_GET['nisn'];
        $hapus  = mysqli_query($db, "DELETE FROM siswa WHERE nisn='$nisn'");
        if($hapus){
            ?>
            <meta content="0; url=siswa.php" http-equiv="refresh"> 
            <?php
        }else{
            echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');</script>";
        }
    }
?>