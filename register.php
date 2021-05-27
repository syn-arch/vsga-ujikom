<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/carousel.css">
	<link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
	<title>Register</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header pt-3">
						<h4>Register</h4>
						<p>Silahkan mengisi form berikut</p>
					</div>
					<div class="card-body">
						<form method="POST">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Nama</label>
										<input name="nama_pengguna" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Kamu">
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Email</label>
										<input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="email@contoh.com">
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Password</label>
										<input name="password1" type="password" class="form-control" id="exampleFormControlInput1" placeholder="*******">
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Konfirmasi Password</label>
										<input name="password2" type="password" class="form-control" id="exampleFormControlInput1" placeholder="*******">
									</div>
									<div class="d-grid mb-3">
										<button type="submit" class="btn btn-primary btn-block">Daftar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer">
						<p>Sudah mempunyai akun?</p>
						<p>Silahkan login melalui link <a href="login.php">Berikut</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery-3.6.0.min.js"></script>
</body>
</html>


<?php 

if (isset($_POST['email'])) {

	require 'config/config.php';

	$email = mysqli_escape_string($koneksi, htmlentities($_POST['email']));
	$password = mysqli_escape_string($koneksi, htmlentities($_POST['password1']));
	$konfirmasi_password = mysqli_escape_string($koneksi, htmlentities($_POST['password2']));
	$nama_pengguna = mysqli_escape_string($koneksi, htmlentities($_POST['nama_pengguna']));

	if ($password != $konfirmasi_password) {

		echo "<script>
		alert('Password dan konfirmasi password tidak sama!')
		</script>";
		
	}else{
		$pw = password_hash($password, PASSWORD_DEFAULT);
		$result = mysqli_query($koneksi, "INSERT INTO tb_pengguna VALUES('', '$nama_pengguna', '$email', '$pw', 'siswa')");
		header("Location: login.php?pesan=daftar");
	}

}

?>