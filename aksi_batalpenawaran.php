<?php
//KONEKSI DB
include "admin/inc/koneksi.php";

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

	<!-- Alert -->
	<script src="admin/plugins/alert.js"></script>
</head>

<?php

if(isset($_GET['kode_penawaran'])){ 
	$sql_batal = "UPDATE tb_penawaran SET
	proses_tawar='dibatalkan',
	tgl_tawar=NOW()   
	WHERE kode_penawaran='".$_GET['kode_penawaran']."'";
	$query_batal = mysqli_query($koneksi, $sql_batal);

	if ($query_batal) {
		echo "<script>
		Swal.fire({title: 'Penawaran Dibatalkan',text: '',icon: 'info',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php';
		}
	})</script>";
}else{
	echo "<script>
	Swal.fire({title: 'Penawaran Gagal',text: 'Ada Kesalahan',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {if (result.value){
		'index.php';
	}
})</script>";
}

}
?>
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
<script>