<?php
    session_start();
    require_once("koneksi.php");
    // jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
    if(!isset($_SESSION['nisn'])){
        header("location: login_siswa.php");
    }else{
        // jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
        $nisn = $_SESSION['nisn'];
    }
    $siswa      = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$nisn'");
    $result     = mysqli_fetch_assoc($siswa);
    $pembayaran = mysqli_query($db, "SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas JOIN spp ON pembayaran.id_spp = spp.id_spp WHERE nisn='$nisn' ORDER BY tgl_bayar");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index Siswa</title>
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
                    <a class="nav-link" href="index_siswa.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <hr class="sidebar-divider my-0"> <br>
                <!-- Tombol Persempit -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Topbar -->
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Tombol Hilangkan -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <!-- User Info -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $result['nama'] ?></span>
                                    <img class="img-profile rounded-circle" src="IMG/foto.png">
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
                <!-- Utama -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 font-weight-bold text-purple">Data Histori Pembayaran SPP</h1>
                    <p class="mb-4">Berikut adalah histori pembayaran spp anda</p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-pink">Tabel Histori Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <h3 class="m-0 font-weight-bold text-pink">Biodata Anda</h3> <hr>
                                <table cellpadding="5">
                                    <tr>
                                        <td>1.</td>
                                        <td>NISN</td>
                                        <td></td>
                                        <td>:</td>
                                        <td><?= $result['NISN']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>3.</td>
                                        <td>Nama Siswa</td>
                                        <td></td>
                                        <td>:</td>
                                        <td><?= $result['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Kelas / Kompetensi Keahlian</td>
                                        <td></td>
                                        <td>:</td>
                                        <td><?= $result['nama_kelas'] . " | " . $result['jurusan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Alamat</td>
                                        <td></td>
                                        <td>:</td>
                                        <td><?= $result['alamat']; ?></td>
                                    </tr>
                    
                                    </tr>
                                </table> <hr>
                                <h6 class="m-0 font-weight-bold text-pink">Histori Pembayaran Anda</h6> <hr>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Petugas Pembantu</th>
                                            <th>Tanggal pembayaran</th>
                                            <th>Tahun SPP dan Nominal Tagihan</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            while($r = mysqli_fetch_assoc($pembayaran)){ ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $r['nama_petugas']; ?></td>
                                                    <td><?= $r['tgl_bayar']?></td>
                                                    <td><?= $r['bulan'] . " | Rp. " . $r['nominal']; ?></td>
                                                    <td><?= $r['jumlah_bayar']; ?></td>
                                                    <td> <?php
                                                    // Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
                                                    if($r['keterangan'] == 'lunas'){ ?>
                                                        <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
                                                    <?php }else{ ?> BELUM LUNAS <?php } ?> </td>
                                                </tr>
                                                
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
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