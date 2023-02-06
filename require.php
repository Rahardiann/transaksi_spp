<?php 
    session_start();
    require_once("koneksi.php");
    // jika sesi yang menyimpan sesi username belum dibuat maka akan kembali ke halaman login
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    // jika tidak, maka akan membuat variabel username
    }else{
        $username = $_SESSION['username'];
    }
?>