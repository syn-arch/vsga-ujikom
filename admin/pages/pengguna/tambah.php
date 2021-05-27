<h1 class="py-3 mb-3 border-bottom">Tambah Data</h1>

<a href="index.php?page=pengguna" class="btn btn-primary my-3">Kembali</a>

<div class="card mb-3">
	<div class="card-header">
		<h4 class="card-title">Tambah Data</h4>
	</div>
	<div class="card body">
		<form method="POST" enctype="multipart/form-data">
			<div class="container py-4">
				<div class="mb-3">
					<label for="nama_pengguna" class="form-label">Nama Pengguna</label>
					<input required="" type="text" class="form-control" id="nama_pengguna" placeholder="Nama pengguna" name="nama_pengguna">
				</div>
				
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input required="" type="text" class="form-control" id="email" placeholder="Email" name="email">
				</div>
				
				<div class="mb-3">
					<label for="password1" class="form-label">Password</label>
					<input required="" type="password" class="form-control" id="password1" placeholder="Password" name="password1">
				</div>
				
				<div class="mb-3">
					<label for="password2" class="form-label">Konfirmasi Password</label>
					<input required="" type="password" class="form-control" id="password2" placeholder="Konfirmasi Password" name="password2">
				</div>

				<div class="mb-3">
					<label for="">Level</label>
					<select name="level" id="level" class="form-control">
						<option value="admin">Admin</option>
						<option value="siswa">Siswa</option>
					</select>
				</div>
				
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">SUBMIT</button>
				</div>
			</div>
		</form>
	</div>
</div>


<?php 

if (isset($_POST['nama_pengguna'])) {

	$nama_pengguna = $_POST['nama_pengguna'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$level = $_POST['level'];


	if ($password1 != $password2) {
		echo "<script> alert('Password dan konfirmasi password berbeda, data gagal ditambah') </script>";
		
	}else{
		$pw = password_hash($password1, PASSWORD_DEFAULT);
		$result = mysqli_query($koneksi, "INSERT INTO tb_pengguna VALUES('', '$nama_pengguna', '$email', '$pw', '$level')");

		if (!$result) {
			die(var_dump(mysqli_error($koneksi)));
		}

		echo "<script> location.href = 'index.php?page=pengguna&pesan=tambah' </script>";

	}



}

?>