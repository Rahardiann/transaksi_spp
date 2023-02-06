<?php
	session_start();
	require_once("koneksi.php");
	// jika sesi nisn sudah dibuat, maka akan langsung diarahkan ke halaman index siswa
	if(isset($_SESSION['nisn'])){
		header("location: index_siswa.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN SISWA</title>
		<link href="IMG/LOGO.png" rel="shortcut icon">
		<link rel="stylesheet" type="text/css" href="css/style_login.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a81368914c.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<img class="wave" src="img/login/wave.svg">
		<div class="container">
			<div class="img">
				<img src="img/login/bg.svg">
			</div>
			<div class="login-content">
				<form action="" method="POST">
					<?php
						// membuat proses login
						if(isset($_POST['login'])){
							$nisn 	= $_POST['nisn'];
							$cari 	= mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisn'");
							$hasil 	= mysqli_fetch_assoc($cari);
							// Jika data yang dicari kosong
							if(mysqli_num_rows($cari) == 0){
								echo "<script>alert('NISN TIDAK TERDAFTAR');location.href='login_siswa.php';</script>";;
							}else{
							// Jika nisn siswa sesuai dengan database maka akan ke halaman index siswa dan akan dibuatkan sesi
								$_SESSION['nisn'] = $_POST['nisn'];
								header("location: index_siswa.php");
							}
						}
					?>
					<img src="img/login/avatar.svg">
					<h2 class="title">SISWA</h2>
					<div class="input-div pass">
					<div class="i">
							<i class="fas fa-user"></i>
					</div>
					<div class="input-group">
							<input type="text" name="nisn" id="nisn" required>
							<label for="nisn">NISN</label>
						</div>
					</div>
					<a href="login.php">Login Sebagai Admin</a>
					<input type="submit" name="login" class="btn" value="Login">
				</form>
			</div>
		</div>
	</body>
</html>