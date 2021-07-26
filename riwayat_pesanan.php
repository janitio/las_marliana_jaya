<?php
 //KONEKSI DB
include "admin/inc/koneksi.php";

$kode_pesanan=$_GET['kode_pesanan'];

session_start();
if (isset($_SESSION["ses_username"])){

	$data_id = $_SESSION["ses_id"];
	$data_user = $_SESSION["ses_username"];
}

$sql = $koneksi->query("SELECT * from tb_profil");
while ($data= $sql->fetch_assoc()) {

	$nama=$data['nama_profil'];
	$alamat=$data['alamat'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?=$nama?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- Alert -->
	<script src="admin/plugins/alert.js"></script>

</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="d-flex align-items-center">
		<div class="container d-flex align-items-center justify-content-between">

			<div class="logo">
				<h1><a href="index.php"><?=$nama; ?></a></h1>
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
			</div>


			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
					<?php if(!isset($data_user)){?>
						<li><a class="nav-link scrollto" href="login.php">Login</a></li>
					<?php }else{?>
						<li><a href="ubah_profil.php?id_pelanggan=<?=$data_id?>"><?= $_SESSION['ses_nama'];?>
						<li><a href="pesanan_pelanggan.php?id_pelanggan=<?= $data_id?>">Pesanan</a></li>
						<li><a href="admin/logout.php">Keluar</a></li>
					<?php } ?>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->

	<main id="main">

		<!-- ======= Breadcrumbs ======= -->
		<section id="breadcrumbs" class="breadcrumbs">
			<div class="container">
				<ol>
					<li><a href="index.php">Beranda</a></li>
					<li>Riwayat Pesanan</li>
				</ol>
				<h2>Riwayat Pesanan</h2>
			</div>
		</section><!-- End Breadcrumbs -->

		<?php
		if(isset($kode_pesanan)){
			$sql_cek = "SELECT kode_track_pesanan FROM tb_track_pesanan 
			WHERE kode_pesanan=$kode_pesanan";
			$query_cek = mysqli_query($koneksi, $sql_cek);
			$data2_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

			if (empty($data2_cek['kode_track_pesanan'])) {
				echo "<script>
				Swal.fire({title: 'Saat Ini Pesanan Anda Masih Diproses',text: 'Harap tunggu beberapa saat, agar bisa melihat riwayat ini',icon: 'info',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
					}
				})</script>";
			}else{

				?>

				<section class="inner-page pt-3">
					<div class="container">
						<div class="card-body">
							<div class="table-responsive">
								<br>
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5px" class="text-center">No</th>
											<th width="30px" class="text-center">Nama Desain</th>
											<th width="20px" class="text-center">Proses</th>
											<th width="30px" class="text-center">Waktu</th>
										</tr>
									</thead>
									<tbody>

										<?php
										$no = 1;
										$sql = $koneksi->query("SELECT tb_desain.nama_desain, tb_track_pesanan.proses, tb_track_pesanan.timestamp FROM tb_track_pesanan 
											JOIN tb_pesanan ON tb_track_pesanan.kode_pesanan=tb_pesanan.kode_pesanan 
											JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain

											WHERE tb_track_pesanan.kode_pesanan=$kode_pesanan");

										while($data=mysqli_fetch_assoc($sql)):
											?>

											<tr>
												<td class="text-center"> 
													<?= $no;?>
												</td>
												<td class="text-center">
													<?= $data['nama_desain'];?>
												</td>
												<td class="text-center">
													<?=$data['proses'];?>
												</td>
												<td class="text-center">
													<?=date('F j, Y, g:i a',strtotime($data['timestamp']));?>
												</td>
												<?php $no++;
											endwhile;?>
										</tr>
									</tbody>
								</tfoot>
							</table>
						</div>
					</div>
					<a href="pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>" title="Batal" class="btn btn-secondary">Kembali</a>
				</div>
			</section>

			<?php
		}
	}
	?>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>