<h1 class="py-3 mb-3 border-bottom">Ubah Data</h1>

<a href="index.php?page=pengguna" class="btn btn-primary my-3">Kembali</a>

<?php 

$id = $_GET['id'];
$pengguna = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id'"));


?>

<div class="card mb-3">
	<div class="card-header">
		<h4 class="card-title">Ubah Data</h4>
	</div>
	<div class="card body">
		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_pengguna" value="<?php echo $pengguna['id_pengguna'] ?>">
			<div class="container py-4">
				<div class="mb-3">
					<label for="nama_pengguna" class="form-label">Nama Pengguna</label>
					<input required="" type="text" class="form-control" id="nama_pengguna" placeholder="Nama pengguna" name="nama_pengguna" value="<?php echo $pengguna['nama_pengguna'] ?>">
				</div>
				
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input required="" type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $pengguna['email'] ?>">
				</div>
				
				<div class="mb-3">
					<label for="password" class="form-label">Password (Isi untuk mengubah)</label>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password">
				</div>
				<div class="mb-3">
					<label for="">Level</label>
					<select name="level" id="level" class="form-control">
						<option <?php echo $pengguna['level'] == 'admin' ? 'selected' : '' ?> value="admin">Admin</option>
						<option <?php echo $pengguna['level'] == 'siswa' ? 'selected' : '' ?> value="siswa">Siswa</option>
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

	$id_pengguna = $_POST['id_pengguna'];
	$nama_pengguna = $_POST['nama_pengguna'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$pw = password_hash($password, PASSWORD_DEFAULT);

	if ($password) {
		$result = mysqli_query($koneksi, "UPDATE tb_pengguna SET nama_pengguna = '$nama_pengguna', email = '$email', level = '$level' , password = '$pw' WHERE  id_pengguna = '$id_pengguna' ");
	}else{
		$result = mysqli_query($koneksi, "UPDATE tb_pengguna SET nama_pengguna = '$nama_pengguna', email = '$email', level = '$level' WHERE  id_pengguna = '$id_pengguna' ");
	}


	if (!$result) {
		die(var_dump(mysqli_error($koneksi)));
	}

	echo "<script> location.href = 'index.php?page=pengguna&pesan=ubah' </script>";




}

?>