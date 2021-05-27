<h1 class="py-3 mb-3 border-bottom">Formulir Pendaftaran</h1>


<?php 

$id = $_SESSION['id_pengguna'];
$daftar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_pengguna = '$id' "));

?>

<?php if ($daftar): ?>

	<h2>Anda telah melakukan pendaftaran</h2>
	<h4>Mohon menunggu sampai waktu yang telah ditentukan</h4>
	<h4>STATUS : <?php echo $daftar['status'] ?></h4>
	<a target="_blank" href="cetak.php?id=<?php echo $id ?>" class="btn btn-primary">Cetak Bukti Pendaftaran</a>
	
<?php else: ?>

	<div class="card mb-3">
		<div class="card-header">
			<h4 class="card-title">Formulir Pendaftaran</h4>
			<p>Silahkan mengisi formulir berikut</p>
		</div>
		<div class="card body">
			<form method="POST" enctype="multipart/form-data">
				<div class="container py-4">
					<div class="mb-3">
						<label for="nama_siswa" class="form-label">Nama Siswa</label>
						<input type="text" class="form-control" id="nama_siswa" placeholder="Nama Siswa" name="nama_siswa">
					</div>
					<div class="mb-3">
						<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
						<br>
						<input type="radio" name="jenis_kelamin" id="l" value="L">
						<label for="l">Laki - Laki</label>
						<br>
						<input type="radio" name="jenis_kelamin" id="p" value="P">
						<label for="p">Perempuan</label>
					</div>
					<div class="mb-3">
						<label for="alamat" class="form-label">Alamat</label>
						<textarea name="alamat" id="alamat" placeholder="Alamat" cols="30" rows="10" class="form-control"></textarea>
					</div>
					<div class="mb-3">
						<label for="telepon" class="form-label">Telepon</label>
						<input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon">
					</div>
					<div class="mb-3">
						<label for="asal_sekolah" class="form-label">Asal Sekolah</label>
						<input type="text" class="form-control" id="asal_sekolah" placeholder="Asal Sekolah" name="asal_sekolah">
					</div>
					<div class="mb-3">
						<label for="ijazah_terakhir" class="form-label">Ijazah Terakhir</label>
						<input type="file" class="form-control" id="ijazah_terakhir" placeholder="Ijazah Terakhir" name="ijazah">
					</div>
					<div class="mb-3">
						<label for="gambar" class="form-label">Pas Foto 3x4</label>
						<input type="file" class="form-control" id="gambar" placeholder="Gambar" name="gambar">
					</div>
					<div class="d-grid">
						<button type="submit" class="btn btn-primary">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php endif ?>

<?php 

if (isset($_POST['nama_siswa'])) {

	$id = $_SESSION['id_pengguna'];
	$nama_siswa = $_POST['nama_siswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$status = 'PENDING';
	$ijazah = $_FILES["ijazah"]["name"];
	$gambar = $_FILES["gambar"]["name"];

	$target_file = $_SERVER['DOCUMENT_ROOT'] . '/psb_online/assets/lampiran';

	move_uploaded_file($_FILES["ijazah"]["tmp_name"], $target_file . '/' . $ijazah);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file . '/' . $gambar);

	$result = mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES('', '$id', '$nama_siswa', '$jenis_kelamin','$alamat', '$telepon', '$asal_sekolah', '$ijazah', '$status', '$gambar')");

	if (!$result) {
		die(var_dump(mysqli_error($koneksi)));
	}

	echo "<script> location.href = 'index.php?page=formulir' </script>";



}

?>