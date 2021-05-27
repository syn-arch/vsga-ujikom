<?php

require '../../../config/config.php';

$id = $_GET['id'];

$result = mysqli_query($koneksi, "DELETE FROM tb_pengguna WHERE id_pengguna = '$id' ");

header("Location: ../../index.php?page=pengguna&status=hapus");