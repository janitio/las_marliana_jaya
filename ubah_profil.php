<?php
 //KONEKSI DB
include "admin/inc/koneksi.php";

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

	<title><?=$nama; ?></title>
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
							/>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>"
							/>
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
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
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
			Swal.fire({title: 'Ubah Data Berhasil',text: 'Silahkan login kembali, bila data anda masih belum berubah',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php';
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