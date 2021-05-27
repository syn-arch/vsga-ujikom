<h1 class="my-3 py-3 border-bottom">Daftar Pengguna</h1>

<a href="index.php?page=tambah_pengguna" class="btn btn-primary my-3">Tambah data</a>

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
				<th>Email</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

			<?php 

			$result = mysqli_query($koneksi, "SELECT * FROM tb_pengguna");
			$no = 1;

			?>

			<?php while($row = mysqli_fetch_assoc($result)): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row['nama_pengguna'] ?></td>
					<td><?= $row['email'] ?></td>
					<td><?= $row['level'] ?></td>
					<td>
						<a href="index.php?page=ubah_pengguna&id=<?= $row['id_pengguna'] ?>" class="btn btn-warning">Edit</a>
						<a onclick="return confirm('Apakah anda yakin?')" href="pages/pengguna/hapus.php?id=<?= $row['id_pengguna'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>

			<?php endwhile ?>

		</tbody>
	</table>
</div>

