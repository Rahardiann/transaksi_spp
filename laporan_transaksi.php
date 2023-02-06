<?php
    require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cetak Transaksi</title>
        <link href="IMG/LOGO.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="css/main_style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="page-top"><hr>
        <h1 align="center" class="m-0 font-weight-bold text-purple">DATA TRANSAKSI</h1>
        <div id="wrapper">
            <div class="table-responsive">
                <hr>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal</th>
                            <th>Tahun dan Nominal</th>
                            <th>Jumlah Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            // memanggil tabel pembayaran
                            $sql = mysqli_query($db, "SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp ORDER BY tgl_bayar");
                            $no = 1;
                            while($r = mysqli_fetch_assoc($sql)){ ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $r['nama_petugas']; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['tanggal'] ?></td>
                                <td><?= $r['bulan'] . " | Rp. " . $r['nominal']; ?></td>
                                <td><?= $r['jumlah_bayar']; ?></td>
                                <?php
                                    // Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
                                    if($r['jumlah_bayar'] == $r['nominal']){ ?>
                                        <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                                        <?php }else{ ?>
                                        <td>BELUM LUNAS</td>
                                <?php } ?>
                            </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table><hr>
            </div>
        </div>
        <script src="VENDOR/jquery.min.txt"></script>
        <script src="VENDOR/bootstrap.min.js"></script>
        <script src="VENDOR/bar.js"></script>
        <script src="VENDOR/jquery.tables.min.js"></script>
        <script src="VENDOR/bootstrap.table.min.js"></script>
        <script>window.print();</script>
    </body>
</html>