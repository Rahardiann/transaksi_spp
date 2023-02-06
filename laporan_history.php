<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cetak History</title>
        <link href="IMG/LOGO.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="css/main_style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="page-top">
        <div class="table-responsive"><hr>
            <?php
                // proses pencarian
                if($_GET['nisn']){
                    $nisn = $_GET['nisn'];
                    $cari = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisn'");
                    if(mysqli_num_rows($cari) == 0){
                        echo "<script>alert('Siswa Tidak Terdaftar');location.href='laporan_history.php';</script>";
                    }else{
                        // memanggil tabel siswa
                        $biodataSiswa = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$nisn'");
                        // memanggil tabel pembayaran
                        $historyPembayaran = mysqli_query($db, "SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas JOIN spp ON pembayaran.id_spp=spp.id_spp WHERE nisn='$nisn' ORDER BY tanggal");
                        $r = mysqli_fetch_assoc($biodataSiswa);
            ?>
            <h3 align="center" class="m-0 font-weight-bold text-purple">Biodata Siswa</h3> <hr>
            <table cellpadding="5">
                <tr>
                    <td>1.</td>
                    <td>NISN</td>
                    <td></td>
                    <td>:</td>
                    <td><?= $r['nisn']; ?></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>NIS</td>
                    <td></td>
                    <td>:</td>
                    <td><?= $r['nis']; ?></td>
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
                    <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
                </tr>
            </table><hr>
            <h3 align="center" class="m-0 font-weight-bold text-purple">Histori Transaksi</h3> <hr>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Petugas Pembantu</th>
                        <th>Bulan dan Nominal</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                        $no=1;
                        while($result = mysqli_fetch_assoc($historyPembayaran)){ ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $result['tanggal']?></td>
                                <td><?= $result['nama_petugas']; ?></td>
                                <td><?= $result['bulan'] . " | Rp. " . $result['nominal']; ?></td>
                                <td><?= "Rp. " . $result['jumlah_bayar']; ?></td>
                                <?php
                                    if($result['jumlah_bayar'] == $result['nominal']){ ?>
                                        <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                                    <?php }else{ ?> 
                                        <td><font style="color: red; font-weight: bold;">BELUM LUNAS</td>
                                    <?php } ?>
                            </tr>
                            <?php $no++; }?>
                    <?php }} ?>
                </tbody>
            </table>
        <script src="VENDOR/jquery.min.txt"></script>
        <script src="VENDOR/bootstrap.min.js"></script>
        <script src="VENDOR/bar.js"></script>
        <script src="VENDOR/jquery.tables.min.js"></script>
        <script src="VENDOR/bootstrap.table.min.js"></script>
        <script>window.print();</script>
    </body>
</html>