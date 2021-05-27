<?php

session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'db_psbonline');


function fetch_array($query)
{
	global $koneksi;
	$result = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;
}