<h1 class="py-3 mb-3 border-bottom">Tambah Data</h1>

<a href="index.php?page=siswa" class="btn btn-primary my-3">Kembali</a>


<?php 

$id = $_GET['id'];
$siswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa = '$id'"));

?>

<div class="card mb-3">
	<div class="card-header">
		<h4 class="card-title">Tambah Data</h4>
	</div>
	<div class="card body">
		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_siswa" value="<?php echo $siswa['id_siswa'] ?>">
			<input type="hidden" name="ijazah" value="<?php echo $siswa['ijazah'] ?>">
			<input type="hidden" name="gambar" value="<?php echo $siswa['gambar'] ?>">
			<div class="container py-4">
				<div class="mb-3">
					<label for="nama_siswa" class="form-label">Nama Siswa</label>
					<input required="" type="text" class="form-control" id="nama_siswa" placeholder="Nama Siswa" name="nama_siswa" value="<?php echo $siswa['nama_siswa'] ?>">
				</div>
				<div class="mb-3">
					<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
					<br>
					<input type="radio" name="jenis_kelamin" id="l" value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'checked' : '' ?>>
					<label for="l">Laki - Laki</label>
					<br>
					<input type="radio" name="jenis_kelamin" id="p" value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'checked' : '' ?>>
					<label for="p">Perempuan</label>
				</div>
				<div class="mb-3">
					<label for="alamat" class="form-label">Alamat</label>
					<textarea required="" name="alamat" id="alamat" placeholder="Alamat" cols="30" rows="10" class="form-control"><?php echo $siswa['alamat'] ?></textarea>
				</div>
				<div class="mb-3">
					<label for="telepon" class="form-label">Telepon</label>
					<input required="" type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" value="<?php echo $siswa['telepon'] ?>">
				</div>
				<div class="mb-3">
					<label for="asal_sekolah" class="form-label">Asal Sekolah</label>
					<input required="" type="text" class="form-control" id="asal_sekolah" placeholder="Asal Sekolah" name="asal_sekolah" value="<?php echo $siswa['asal_sekolah'] ?>">
				</div>
				<div class="mb-3">
					<label for="ijazah_terakhir" class="form-label">Ijazah Terakhir</label>
					<input type="file" class="form-control" id="ijazah_terakhir" placeholder="Ijazah Terakhir" name="ijazah">
				</div>
				<div class="mb-3">
					<label for="gambar" class="form-label">Pas Foto 3x4</label>
					<input type="file" class="form-control" id="gambar" placeholder="Gambar" name="gambar">
					<img width="300" src="../assets/lampiran/<?php echo $siswa['gambar'] ?>" alt="" class="img-fluid">
				</div>
				<div class="mb-3">
					<label for="status">Status</label>
					<select name="status" id="status" class="form-control">
						<option <?php echo $siswa['status'] == 'PENDING' ? 'selected' : '' ?> value="PENDING">PENDING</option>
						<option <?php echo $siswa['status'] == 'DITERIMA' ? 'selected' : '' ?> value="DITERIMA">DITERIMA</option>
						<option <?php echo $siswa['status'] == 'TIDAK DITERIMA' ? 'selected' : '' ?> value="TIDAK DITERIMA">TIDAK DITERIMA</option>
						<option <?php echo $siswa['status'] == 'CADANGAN' ? 'selected' : '' ?> value="CADANGAN">CADANGAN</option>
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

if (isset($_POST['nama_siswa'])) {

	$id_siswa = $_POST['id_siswa'];
	$nama_siswa = $_POST['nama_siswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$status = $_POST['status'];

	if($_FILES["ijazah"]["name"]){
		$ijazah = $_FILES["ijazah"]["name"];
	}else{
		$ijazah = $_POST['ijazah'];
	}
	if($_FILES["gambar"]["name"]){
		$gambar = $_FILES["gambar"]["name"];
	}else{
		$gambar = $_POST['gambar'];
	}

	$target_file = $_SERVER['DOCUMENT_ROOT'] . '/psb_online/assets/lampiran';

	if($_FILES["ijazah"]["name"]){
		move_uploaded_file($_FILES["ijazah"]["tmp_name"], $target_file . '/' . $ijazah);
	}	

	if($_FILES["gambar"]["name"]){
		move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file . '/' . $gambar);
	}	

	$result = mysqli_query($koneksi, "UPDATE tb_siswa SET 
		nama_siswa = '$nama_siswa',
		jenis_kelamin = '$jenis_kelamin',
		alamat = '$alamat',
		telepon = '$telepon',
		asal_sekolah = '$asal_sekolah', 
		ijazah = '$ijazah', 
		gambar = '$gambar',
		status = '$status' 
		WHERE id_siswa = '$id_siswa'
		");

	if (!$result) {
		die(var_dump(mysqli_error($koneksi)));
	}

	echo "<script> location.href = 'index.php?page=siswa&pesan=ubah' </script>";



}

?>