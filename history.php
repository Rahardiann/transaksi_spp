<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>History</title>
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
                    $hasil      = mysqli_fetch_assoc ($panggil);
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
                <li class="nav-item active">
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
                <li class="nav-item active">
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
                <h1 class="h3 mb-2 font-weight-bold text-purple">Data Histori Siswa SMK Telkom Malang</h1>
                <p class="mb-4">Berikut adalah histori pembayaran siswa SMK Telkom Malang</p>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-pink">Tabel Histori Pembayaran</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p>Mohon untuk memasukkan nisn untuk mencari data</p>
                            <form action="" method="POST" autocomplete="off">
                                <div class="input-group">
                                    <input type="search" name="nisn" class="form-control bg-light border-0 small" placeholder="Cari Berdasarkan NISN" autofocus>
                                    <div class="input-group-append">
                                        <button class="btn btn-warning"  name="cari" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form><hr>
                        <?php
                            // proses pencariannya
                            if(isset($_POST['cari'])){
                                $nisn = $_POST['nisn'];
                                $cari = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisn'");
                                if(mysqli_num_rows($cari) == 0){
                                    echo "<script>alert('Siswa Tidak Terdaftar');location.href='history.php';</script>";
                                }else{
                                    // memanggil tabel siswa
                                    $biodataSiswa = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$nisn'");
                                    // memanggil tabel pembayaran
                                    $historyPembayaran = mysqli_query($db, "SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas JOIN spp ON pembayaran.id_spp=spp.id_spp WHERE nisn='$nisn' ORDER BY tgl_bayar");
                                    $r = mysqli_fetch_assoc($biodataSiswa);
                        ?>
                        <h3 class="m-0 font-weight-bold text-purple">Biodata Siswa</h3> <hr>
                            <table cellpadding="5">
                                <tr>
                                    <td>1.</td>
                                    <td>NISN</td>
                                    <td></td>
                                    <td>:</td>
                                    <td><?= $r['NISN']; ?></td>
                                </tr>
                                
                                <tr>
                                    <td>3.</td>
                                    <td>Nama Siswa</td>
                                    <td></td>
                                    <td>:</td>
                                    <td><?= $r['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Kelas / Kompetensi Keahlian</td>
                                    <td></td>
                                    <td>:</td>
                                    <td><?= $r['nama_kelas'] . " | " . $r['jurusan']; ?></td>
                                </tr>
                            </table><hr>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Petugas Pembantu</th>
                                        <th>Bulan dan Nominal</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1;
                                        while($result = mysqli_fetch_assoc($historyPembayaran)){ ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $result['tgl_bayar']?></td>
                                            <td><?= $result['nama_petugas']; ?></td>
                                            <td><?= $result['bulan'] . " | Rp. " . $result['nominal']; ?></td>
                                            <td><?= "Rp. " . $result['jumlah_bayar']; ?></td>
                                            <?php
                                                if($result['keterangan'] == 'lunas'){ ?>
                                                    <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                                                    <td>-</td>
                                                <?php }else{ ?> 
                                                    <td><font style="color: red; font-weight: bold;">BELUM LUNAS</td>
                                                    <td><a href="transaksi.php?lunas&id=<?= $result['id_pembayaran']; ?>" class="btn btn-info btn-circle btn-sm" onclick="return confirm('Apakah anda yakin untuk melunasinya ?')"><i class="fas fa-money-bill-alt"></i></a></td>
                                            <?php } ?>
                                        </tr>
                                    <?php $no++; }?>
                                    </tr>
                                        <?php if($hasil['level'] == "Administrator"){ ?>
                                            <tr>
                                                <td colspan="7">
                                                    <a class='btn btn-warning' target="_BLANK" href="laporan_history.php?nisn=<?=$_POST['nisn'];?>">--------------------------------------------------------- Cetak Histori Transaksi ---------------------------------------------------------</a>
                                                </td>
                                            </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php }} ?>
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