<?php

require '../../../config/config.php';

$id = $_GET['id'];

$result = mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id_siswa = '$id' ");

header("Location: ../../index.php?page=siswa&status=hapus");