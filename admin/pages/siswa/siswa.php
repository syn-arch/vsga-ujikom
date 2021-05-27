<h1 class="my-3 py-3 border-bottom">Daftar Siswa</h1>

<!-- <a href="index.php?page=tambah_siswa" class="btn btn-primary my-3">Tambah data</a> -->

<?php if (isset($_GET['pesan'])): ?>

	<?php if ($_GET['pesan'] == 'tambah'): ?>
		<div class="alert alert-success">
			<strong>Berhasil!</strong>
			<p>Data berhasil ditambah</p>
		</div>
	<?php endif ?>

	<?php if ($_GET['pesan'] == 'ubah'): ?>
		<div class="alert alert-success">
			<strong>Berhasil!</strong>
			<p>Data berhasil diubah</p>
		</div>
	<?php endif ?>

	<?php if ($_GET['pesan'] == 'hapus'): ?>
		<div class="alert alert-success">
			<strong>Berhasil!</strong>
			<p>Data berhasil dihapus</p>
		</div>
	<?php endif ?>
	
<?php endif ?>

<div class="table-responsive my-4">
	<table class="table table-bordered datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Asal Sekolah</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Ijazah</th>
				<th>Foto</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

			<?php 

			$siswa = fetch_array("SELECT * FROM tb_siswa");
			$no = 1;

			?>

			<?php foreach($siswa as $row): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row['nama_siswa'] ?></td>
					<td><?= $row['alamat'] ?></td>
					<td><?= $row['asal_sekolah'] ?></td>
					<td><?= $row['jenis_kelamin'] ?></td>
					<td><?= $row['telepon'] ?></td>
					<td>
						<a href="../assets/lampiran/<?php echo $row['ijazah'] ?>" download>Download</a>
					</td>
					<td>
						<img width="100" src="../assets/lampiran/<?= $row['gambar'] ?>" alt="" class="img-fluid">
					</td>
					<td><?= $row['status'] ?></td>
					<td>
						<a href="index.php?page=ubah_siswa&id=<?= $row['id_siswa'] ?>" class="btn btn-warning">Edit</a>
						<a onclick="return confirm('Apakah anda yakin?')" href="pages/siswa/hapus.php?id=<?= $row['id_siswa'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>

			<?php endforeach ?>

		</tbody>
	</table>
</div>

