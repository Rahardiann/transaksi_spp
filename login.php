<?php
	session_start();
	// jika sesi username sudah dibuat, maka akan langsung diarahkan ke halaman index
	if(isset($_SESSION['username'])){
		header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN PETUGAS</title>
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
				<form action="proseslogin.php" method="POST">
					<img src="img/login/avatar.svg">
					<h2 class="title">admin</h2>
					<div class="input-div one">
					<div class="i">
							<i class="fas fa-user"></i>
					</div>
					<div class="input-group">
							<input type="text" name="username" id="username" required>
							<label for="username">Username</label>
						</div>
					</div>
					<div class="input-div pass">
					<div class="i"> 
							<i class="fas fa-lock"></i>
					</div>
					<div class="input-group">
							<input type="password" name="password" id="password" required>
							<label for="password">Password</label>
						</div>
					</div>
					<a href="login_siswa.php">Login Sebagai Siswa</a>
					<input type="submit" name="login" class="btn" value="Login">
				</form>
			</div>
		</div>
	</body>
</html>