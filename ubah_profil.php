<?php

 //KONEKSI DB
include "admin/inc/koneksi.php";

session_start();
if (isset($_SESSION["ses_username"])){

	$data_id = $_SESSION["ses_id"];
	$data_user = $_SESSION["ses_username"];
}

if(isset($data_id)){
	$sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna= $data_id";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Marliana Jaya 2</title>
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

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
	<div class="container d-flex align-items-center justify-content-between">

		<div class="logo">
			<h1><a href="index.php"></a></h1>
		</div>

		<nav id="navbar" class="navbar">
			<ul>
				<li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
				<?php if(!isset($data_user)){?>
					<li><a class="nav-link scrollto" href="login.php">Login</a></li>
				<?php }else{?>
					<li class="dropdown"><a href="ubah_profil.php?id_pelanggan=<?=$data_id?>"><span><?php if(isset($data_user)){
                //tampil data nama dari sesi yang ada
						echo $_SESSION['ses_nama'];}?>

					</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="pesanan_pelanggan.php?id_pelanggan=<?= $data_id?>">Pesanan</a></li>
         
          <li><a href="hasil_proyek.php">Hasil Proyek</a></li>
      </ul>
  </li>
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
				<li>Ubah Profil</li>
			</ol>
			<h2>Ubah Profil</h2>
		</div>
	</section><!-- End Breadcrumbs -->

	<section class="inner-page pt-3">
		<div class="container">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="card-body">

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Lengkap</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>"
							/>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="username" name="username" value="<?php echo $data_cek['username']; ?>"
							readonly/>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nomor Telepon</label>
						<div class="col-sm-6">
							<input type="Telepon" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
							readonly/>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>"
							readonly/>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Sebagai</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="level" name="level" value="<?php echo $data_cek['level']; ?>"
							readonly/>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="alamat_pengguna" name="alamat_pengguna"  value="<?php echo $data_cek['alamat_pengguna']; ?>" />
						</div>
					</div>
				</div>
				<div class="card-body">
					<input type="submit" name="Ubah" value="Ubah" class="btn btn-info">
					<a href="index.php" title="Kembali" class="btn btn-secondary">Kembali</a>
				</div>
			</form>  
		</div>
	</section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

	<div class="footer-top">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6 footer-contact">
					<h3>Flexor</h3>
					<p>
						A108 Adam Street <br>
						New York, NY 535022<br>
						United States <br><br>
						<strong>Phone:</strong> +1 5589 55488 55<br>
						<strong>Email:</strong> info@example.com<br>
					</p>
				</div>

				<div class="col-lg-2 col-md-6 footer-links">
					<h4>Useful Links</h4>
					<ul>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Our Services</h4>
					<ul>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
					</ul>
				</div>

				<div class="col-lg-4 col-md-6 footer-newsletter">
					<h4>Join Our Newsletter</h4>
					<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
					<form action="" method="post">
						<input type="email" name="email"><input type="submit" value="Subscribe">
					</form>
				</div>

			</div>
		</div>
	</div>

	<div class="container d-lg-flex py-4">

		<div class="me-lg-auto text-center text-lg-start">
			<div class="copyright">
				&copy; Copyright <strong><span>Flexor</span></strong>. All Rights Reserved
			</div>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
			</div>
		</div>
		<div class="social-links text-center text-lg-right pt-3 pt-lg-0">
			<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
			<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
			<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
			<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
			<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
		</div>
	</div>
</footer><!-- End Footer -->

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
$sumber = @$_FILES['foto_hasil']['tmp_name'];
$target = 'admin/foto/proyek/';
$nama_file = @$_FILES['foto_hasil']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

	if(!empty($sumber)){
		$foto= $data_cek['foto_desain'];
		if (file_exists("foto/desain/$foto")){
			unlink("foto/desain/$foto");}

			$sql_ubah = "UPDATE tb_pengguna SET
			nama_pengguna='".$_POST['nama_pengguna']."',
			username='".$_POST['username']."',
			no_hp='".$_POST['no_hp']."',
			email='".$_POST['email']."',
			alamat_pengguna='".$_POST['alamat_pengguna']."',
			level='".$_POST['level']."',
			foto_profil='".$nama_file."'		
			WHERE id_pengguna=$data_id";
			$query_ubah = mysqli_query($koneksi, $sql_ubah);

		}elseif(empty($sumber)){
			$sql_ubah = "UPDATE tb_pengguna SET
			nama_pengguna='".$_POST['nama_pengguna']."',
			username='".$_POST['username']."',
			no_hp='".$_POST['no_hp']."',
			email='".$_POST['email']."',
			alamat_pengguna='".$_POST['alamat_pengguna']."',
			level='".$_POST['level']."'
			WHERE id_pengguna=$data_id";
			$query_ubah = mysqli_query($koneksi, $sql_ubah);
		}

		if ($query_ubah) {
			echo "<script>
			Swal.fire({title: 'Ubah Data Berhasil',text: 'Silahkan Login Kembali',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'admin/logout.php';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'ubah_profil.php?id_pelanggan=$data_id';
				}
			})</script>";
		}
	}