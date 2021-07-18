<?php
 //KONEKSI DB
include "admin/inc/koneksi.php";

session_start();
if (isset($_SESSION["ses_username"])){

	$data_user = $_SESSION["ses_username"];
	$sql1 = $koneksi->query("SELECT * from tb_pengguna WHERE username='$data_user'");

	while ($data1= $sql1->fetch_assoc()) {

		$id_pengguna=$data1['id_pengguna'];
		$nama_pengguna=$data1['nama_pengguna'];
		$no_hp=$data1['no_hp'];
		$email=$data1['email'];
		$alamat_pengguna=$data1['alamat_pengguna'];
	}
}

include "admin/inc/koneksi.php";

if(isset($_GET['kode_desain'])){
	$sql2 = $koneksi->query("SELECT * from tb_desain WHERE kode_desain='".$_GET['kode_desain']."'");

	while ($data2= $sql2->fetch_assoc()) {

		$nama_desain=$data2['nama_desain'];
		$foto_desain=$data2['foto_desain'];
		$kode_desain=$data2['kode_desain'];
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Sedang memesan <?=$nama_desain; ?></title>
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

  <!-- =======================================================
  * Template Name: Flexor - v4.0.1
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<main id="main">

		<!-- ======= Breadcrumbs ======= -->
		<section id="breadcrumbs" class="breadcrumbs">
			<div class="container">
				<h2><?=$nama_desain; ?></h2>
			</div>
		</section><!-- End Breadcrumbs -->

		<!-- ======= Portfolio Details Section ======= -->
		<section id="portfolio-details" class="portfolio-details">
			<div class="container">

				<div class="row gy-4">

					<div class="col-lg-8">
						<div class="portfolio-details swiper-container">
							<div class="swiper-wrapper align-items-center">
								<img src="admin/foto/desain/<?=$foto_desain; ?>" width="500px">
							</div>
						</div>
           <!--  <div class="container"><br>
              <a href="index.php" class="btn btn-warning">Kembali</a>
          </div> -->
      </div>


      <div class="col-lg-4">
      	<div class="portfolio-info">
      		<form method="post" enctype="multipart/form-data">
      			<h3>Informasi Pesanan</h3>
      			<ul>
      				<li><strong>Nama Lengkap</strong>: <?=$nama_pengguna; ?></li>
      				<li><strong>Nomor Handphone</strong>: <?=$no_hp; ?></li>
      				<li><strong>Email</strong>: <?=$email; ?></li>
      				<li><strong>Nama Desain</strong>: <?=$nama_desain; ?></li>
      				<li><strong>Alamat</strong>: <?=$alamat_pengguna; ?><br>
      				</li>
      				<li>
      					<div class="">
      						<input type="submit" name="pesan" value="Pesan Sekarang" class="btn btn-success">
      						<a href="index.php" title="batal" class="btn btn-secondary">Batal</a>
      					</div>
      				</li>
      			</li>
      		</ul>
      	</form>
      </div>
      <div class="portfolio-description">
      	<h2>This is an example of portfolio detail</h2>
      	<p>
      		Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
      	</p>
      </div>
  </div>
</div>

</div>
</section><!-- End Portfolio Details Section -->

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

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Alert -->
<script src="admin/plugins/alert.js"></script>

</body>

</html>

<?php

date_default_timezone_set('Asia/Jakarta');

if (isset ($_POST['pesan'])){

	$sql_simpan = "INSERT INTO tb_pesanan (kode_desain, id_pengguna, proses, tgl_pesanan) VALUES (
	$kode_desain,
	$id_pengguna,
	'diproses',
	NOW())";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
		Swal.fire({title: 'Pesanan Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php';
		}
	})</script>";
}else{
	echo "<script>
	Swal.fire({title: 'Pesanan Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {if (result.value){
		window.location = 'index.php';
	}
})</script>";
}

}
     //selesai proses simpan data
?>