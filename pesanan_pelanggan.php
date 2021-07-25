<?php
     //Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"])){

	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

include "admin/inc/koneksi.php";

$sql = $koneksi->query("SELECT * from tb_profil");
while ($data= $sql->fetch_assoc()) {

	$nama=$data['nama_profil'];
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
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
					<li>Pesanan</li>
				</ol>
				<h2>Pesanan</h2>
			</div>
		</section><!-- End Breadcrumbs -->

		<?php
		if(isset($data_id)){
			$sql_cek = "SELECT kode_pesanan FROM tb_pesanan WHERE id_pengguna=$data_id";
			$query_cek = mysqli_query($koneksi, $sql_cek);
			$data2_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

			if (empty($data2_cek['kode_pesanan'])) {
				echo "<script>
				Swal.fire({title: 'Anda Belum Memesan',text: 'Harap memesan terlebih dahulu',icon: 'info',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php';
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
											<th width="1px" class="text-center">No</th>
											<th width="5px" class="text-center">Kode Pesanan</th>
											<th width="30px" class="text-center">Foto</th>
											<th width="30px" class="text-center">Nama Desain</th>
											<th width="60px" class="text-center">Alamat</th>
											<th width="10px" class="text-center">Proses</th>
											<th width="30px" class="text-center">Waktu</th>
											<th width="60px" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $koneksi->query("SELECT tb_pesanan.kode_pesanan, tb_desain.foto_desain , tb_desain.nama_desain, tb_pengguna.alamat_pengguna, tb_pesanan.proses, tb_pesanan.tgl_pesanan FROM tb_pesanan 
											JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain 
											JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
											WHERE tb_pesanan.id_pengguna='".$data_id."'");

										while($data=mysqli_fetch_assoc($sql)):
											?>

											<tr>
												<td class="text-center"> 
													<?= $no;?>
												</td>
												<td class="text-center">
													<?= $data['kode_pesanan']; ?>
												</td>
												<td align="center">
													<img src="admin/foto/desain/<?=$data['foto_desain'];?>" width="100px" />
												</td>
												<td>
													<?= $data['nama_desain'];?>
												</td>
												<td>
													<?=$data['alamat_pengguna'];?>
												</td>
												<td class="text-center">
													<?=$data['proses'];?>
												</td>
												<td>
													<?=$data['tgl_pesanan'];?>
												</td>
												<td class="row h-20 justify-content-center align-items-center">
													<a href="riwayat_pesanan.php?kode_pesanan=<?=$data['kode_pesanan']; ?>" class="btn btn-info">riwayat pesanan</a>

													<a href="penawaran_pelanggan.php?kode_pesanan=<?=$data['kode_pesanan']; ?>" class="btn btn-secondary">surat penawaran</a>

													<a href="pembayaran_pelanggan.php?kode_pesanan=<?=$data['kode_pesanan']; ?>" class="btn btn-success">Pembayaran</a>
													<br>
													<a href="kirimpesan_pelanggan.php?kode_pesanan=<?=$data['kode_pesanan']; ?>" class="btn btn-primary">Lihat Pesan</a>

												</td>
												<?php $no++;
											endwhile;?>
										</tr>
									</tbody>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
	}
	?>
</main><!-- End #main -->