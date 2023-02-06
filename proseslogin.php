<?php
    session_start();
    include("koneksi.php");
    // jika method post dari page login sudah dibuat
    if(isset($_POST['login'])){
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $cari       = mysqli_query($db, "SELECT * FROM petugas WHERE username='$username' and password=MD5('$password')");
        $hasil      = mysqli_fetch_assoc($cari);
            // Jika data yang dicari kosong
            if(mysqli_num_rows($cari) == 0){
                echo "<script>alert('Username Tidak Terdaftar');location.href= 'login.php';</script>";
            }else{                
                    // Jika user sesuai dengan database maka akan ke halaman index dan akan dibuatkan sesi
                    $_SESSION['username'] = $_POST['username'];
                    header("location: index.php");                
            } 
    }
?>