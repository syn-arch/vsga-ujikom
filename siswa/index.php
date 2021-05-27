<?php 

require '../config/config.php';  

if (!$_SESSION['login']) {
	header("Location: ../login.php");
}else if($_SESSION['level'] != 'siswa') {
	die('access denied');
}

?>
<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Hugo 0.83.1">
		<title>Dashboard</title>

		<!-- Bootstrap core CSS -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="icon" href="../favicon.ico" type="image/ico" sizes="16x16">


		<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>


	<!-- Custom styles for this template -->
	<link href="../assets/css/dashboard.css" rel="stylesheet">
</head>
<body>

	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">SMK BBC</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="logout.php">Keluar</a>
			</li>
		</ul>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="position-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="index.php?page=dashboard">
								<span data-feather="home"></span>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=formulir">
								<span data-feather="file"></span>
								Formulir Pendaftaran
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../logout.php">
								<span data-feather="arrow-left"></span>
								Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<?php 

				if (isset($_GET['page'])) {
					$page = $_GET['page'];

					if ($page == 'dashboard') {
						include 'pages/dashboard.php';
					}

					if ($page == 'formulir') {
						include 'pages/formulir_pendaftaran.php';
					}

				}else{
					include 'pages/dashboard.php';
				}

				?>

				</div>
				</div>
				</div>


				<script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
				</script><script src="../assets/js/dashboard.js"></script>
				</body>
				</html>
