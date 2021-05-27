<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/carousel.css">
	<link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
	<title>Masuk</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header pt-3">
						<h4>Masuk</h4>
						<p>Silahkan login terlebih dahulu</p>
					</div>
					<div class="card-body">


						<?php if (isset($_GET['pesan'])): ?>

							<?php if ($_GET['pesan'] == 'daftar'): ?>
								<div class="alert alert-success">
									<strong>Berhasil</strong>
									<p>Pendaftaran berhasil, silahkan login</p>
								</div>
								
							<?php endif ?>
							
						<?php endif ?>


						<form method="POST">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Email</label>
										<input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="email@contoh.com">
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Password</label>
										<input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="*******">
									</div>
									<div class="d-grid mb-3">
										<button type="submit" class="btn btn-primary btn-block">Masuk</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer">
						<p>Belum mempunyai akun?</p>
						<p>Silahkan daftar terlebih dahulu melalui link <a href="register.php">Berikut</a></p>
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

require 'config/config.php';

if (isset($_SESSION['level'])) {
	if ($_SESSION['level'] == 'admin') {
		header("Location: admin/index.php");
	}else{
		header("Location: siswa/index.php");
	}
}

if (isset($_POST['email'])) {

	// simpan inputan user ke dalam variabel
	$email = mysqli_escape_string($koneksi, htmlentities($_POST['email']));
	$password = mysqli_escape_string($koneksi, htmlentities($_POST['password']));

	// query mencari data pengguna di tabel berdasarkan email
	$result = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE email = '$email' ");

	// cek apakah ada data
	if ($row = mysqli_fetch_assoc($result)) {

		// bandingkan password yang diinput dan password didatabase yg telah dienkripsi
		if (password_verify($password, $row['password'])) {

			// buat session
			$_SESSION['login'] = true;
			$_SESSION['id_pengguna'] = $row['id_pengguna'];
			$_SESSION['nama_pengguna'] = $row['nama_pengguna'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['level'] = $row['level'];

			// arahkan user ke levelnya masing2
			if ($row['level'] == 'admin') {
				header("Location: admin/index.php");
			}else{
				header("Location: siswa/index.php");
			}

		}else{
			echo "<script>
			alert('Password anda salah!')
			</script>";
		}
	}else{
		echo "<script>
		alert('Email tidak ditemukan!')
		</script>";
	}


}

?>