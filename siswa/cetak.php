<?php 
error_reporting(0);
require '../vendor/autoload.php';

use Dompdf\Dompdf;
require '../config/config.php';
$id = $_SESSION['id_pengguna'];
$siswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_pengguna = '$id' "));

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = '<table cellpadding="20" border="1" cellspacing="0"> 
		<thead>
			<tr>
				<th colspan="2">BUKTI PENDAFTARAN</th>
			</tr>
			<tr>
				<th>Nama Siswa</th>
				<th>'.$siswa['nama_siswa'].'</th>
			</tr>
			<tr>
				<th>Alamat</th>
				<th>'.$siswa['alamat'].'</th>
			</tr>
			<tr>
				<th>Asal Sekolah</th>
				<th>'.$siswa['asal_sekolah'].'</th>
			</tr>
			<tr>
				<th colspan="2">
					<b>Telah mendaftarkan diri sebagai calon siswa SMK BUDI BAKTI CIWIDEY</b>
				</th>
			</tr>
		</thead>
	</table>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>
