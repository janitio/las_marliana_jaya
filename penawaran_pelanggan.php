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

$sql_tampil = "SELECT tb_penawaran.kode_penawaran,tb_pesanan.kode_pesanan, tb_pengguna.nama_pengguna, tb_pengguna.alamat_pengguna, tb_desain.nama_desain, tb_desain.foto_desain, tb_pengguna.no_hp, tb_penawaran.biaya_dp, tb_penawaran.sisa_bayar, tb_penawaran.total_bayar, tb_penawaran.ttd_pelanggan, tb_penawaran.tgl_tawar FROM tb_pesanan 
JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain 
JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna 
JOIN tb_penawaran ON tb_pesanan.kode_pesanan=tb_penawaran.kode_pesanan 
WHERE tb_pesanan.kode_pesanan=$kode_pesanan";
$query_tampil = mysqli_query($koneksi, $sql_tampil);
$data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH);

$sql2_cek = "SELECT ttd_pemilik,nama_pemilik FROM tb_profil";
$query2_cek = mysqli_query($koneksi, $sql2_cek);
$profil_cek = mysqli_fetch_array($query2_cek,MYSQLI_BOTH);
$nama_pemilik=$profil_cek['nama_pemilik'];
$ttd_pemilik=$profil_cek['ttd_pemilik'];
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

	<style>
		#canvasDiv{
			position: relative;
			border: 2px dashed grey;
			height:300px;
		}

		#judul{
			text-align:center;
		}

		#halaman{
			width: auto; 
			height: auto; 
			position: absolute; 
			border: 1px solid; 
			padding-top: 30px; 
			padding-left: 30px; 
			padding-right: 30px; 
			padding-bottom: 80px;
		}

	</style>
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
					<li>Penawaran</li>
				</ol>
				<h2>Penawaran</h2>
			</div>
		</section><!-- End Breadcrumbs -->

		<?php 
		if(isset($_GET['kode_pesanan'])){
			$sql_cek = "SELECT kode_penawaran FROM tb_penawaran WHERE kode_pesanan='".$_GET['kode_pesanan']."'";
			$query_cek = mysqli_query($koneksi, $sql_cek);
			$data2_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

			if (empty($data2_cek['kode_penawaran'])) {
				echo "<script>
				Swal.fire({title: 'Penawaran Belum Ada, Masih Diproses',text: 'Harap Tunggu dan cek berkala pada kolom proses pesanan',icon: 'info',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
					}
				})</script>";
			}else{

				?>
				<section class="inner-page pt-3">
					<div class="container">
						<div class="row">

							<div class="card-body p-0">
								<table align="center" border="0" cellpadding="1" style="width: 700px;"><tbody>
									<tr>     <td colspan="3"><div align="center">
										<center>

											<h2>
												<?=$nama;?>
											</h2>
											<h3>
												<?=$alamat;?>
												<hr / size="2px" color="black">
											</center>
										</div>
									</td>   </tr>
									<tr>     <td colspan="2"><table border="0" cellpadding="1" style="width: 400px;"><tbody>
										<?php

										?>
										<tr>         
											<td width="93">
												<span >No</span></td>         
												<td width="8">
													<span >:</span></td>         
													<td width="200">
														<span ><?=$data_cek['kode_penawaran'];?></span></td>       </tr>
														<tr>         
															<td><span >Perihal</span></td>         
															<td><span >:</span></td>         
															<td><span >Surat Penawaran</span></td>       
														</tr>
													</tbody>
												</table>
											</td>     
											<td valign="top">
												<div align="right">
													<span ><?=$data_cek['tgl_tawar'];?></span></div>
												</td>   
											</tr>
											<tr>     
												<td width="302"></td>    
												<td width="343"></td>     
												<td width="339"></td>   </tr>
												<tr>     
													<td></td>     <td></td>   </tr>
													<tr>     <td></td>     <td></td>     <td></td>   </tr>
													<tr>     <td colspan="3" height="270" valign="top"><div align="justify">
														<span >Saya yang bertanda tangan di bawah ini:</span>
														<table>
															<tr>
																<td style="width: 30%;">Nama</td>
																<td style="width: 5%;">:</td>
																<td style="width: 65%;"><?=$data_cek['nama_pengguna'];?></td>
															</tr>
															<tr>
																<td style="width: 30%;">No. HP</td>
																<td style="width: 5%;">:</td>
																<td style="width: 65%;"><?=$data_cek['no_hp'];?></td>
															</tr>
															<tr>
																<td style="width: 30%; vertical-align: top;">Alamat</td>
																<td style="width: 5%; vertical-align: top;">:</td>
																<td style="width: 65%;"><?=$data_cek['alamat_pengguna'];?></td>
															</tr>
															<tr>
																<td style="width: 30%;">Kode Pesanan</td>
																<td style="width: 5%;">:</td>
																<td style="width: 65%;"><?=$data_cek['kode_pesanan'];?></td>
															</tr>
															<tr>
																<td style="width: 30%;">Pesanan</td>
																<td style="width: 5%;">:</td>
																<td style="width: 65%;"><?=$data_cek['nama_desain'];?></td>
															</tr>
															<tr>
																<td style="width: 30%;">Bayar Dimuka</td>
																<td style="width: 5%;">:</td>
																<td style="width: 65%;">Rp. <?php echo number_format($data_cek['biaya_dp']); ?></td>
															</tr>
															<tr>
																<td style="width: 30%;">Sisa Pembayaran</td>
																<td style="width: 5%;">:</td>
																<td style="width: 65%;">Rp. <?php echo number_format($data_cek['sisa_bayar']); ?></td>
															</tr>
															<tr>
																<td style="width: 30%;">Total Pembayaran</td>
																<td style="width: 5%;">:</td>
																<td style="width: 65%;">Rp. <?php echo number_format($data_cek['total_bayar']); ?></td>
															</tr>
														</table>
														<div align="justify">
															<span >menyatakan bahwa saya menyetujui barang yang dipesan.</span> </div>
														</div><br>
														<div align="center">
															<span >Mengetahui</span></div>
														</td>   </tr>
														<tr>     <td><div align="center">
															<span >Pelanggan,</span></div>
															<div align="center">
																<?php
																$ttd_pelanggan=$data_cek['ttd_pelanggan'];
																if(!empty($ttd_pelanggan)){
																	?>
																	<br><br><br>
																	<img src="admin/foto/ttd_pelanggan/<?=$ttd_pelanggan; ?>" width="150px"/>
																<?php }else{?>
																	<br>
																	<br>
																	<b>(Tanda Tangan Pelanggan)</b><br><br>
																	<br><br>
																<?php }?>
															</div>
															<div align="center">
																<span ><?=$data_cek['nama_pengguna'];?></span></div>
															</td>     <td></td>     <td valign="top"><div align="center">
																<span >Pemilik Jasa, </span></div>
																<div align="center">
																	<img src="admin/foto/ttd_pemilik/<?=$ttd_pemilik; ?>" width="150px"/>
																</div>
																<div align="center">
																	<span ><?=$nama_pemilik;?></span></div>
																</td>   </tr>
															</tbody>
														</table>
													</body>

												</div>

												<div class="container center">
													<div class="col-md-8 col-md-offset-2">
														<br>
														<br><h4>Tanda Tangan :</h4>
														<?php echo isset($msg)?$msg:''; ?>
														<hr>
														<div id="canvasDiv"></div>
														<br>
														<?php
														$sql_cek = "SELECT proses_tawar FROM tb_penawaran WHERE kode_pesanan='".$_GET['kode_pesanan']."'";
														$query_cek = mysqli_query($koneksi, $sql_cek);
														$data2_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

														if($data2_cek['proses_tawar']=='dibatalkan' || $data2_cek['proses_tawar']=='diterima'){
															if ($data2_cek['proses_tawar']=='dibatalkan') {?>
																<h4><font color="red">Anda telah membatalkan penawaran ini</font></h4><br>
																<?php
															}
															?>
															<button type="button" class="btn btn-warning" id="reset-btn" disabled>Hapus</button>
															<button type="button" class="btn btn-success" id="btn-save" disabled>Setujui</button>
															<a href="aksi_batalpenawaran.php?kode_penawaran=<?=$data_cek['kode_penawaran'];?>" title="Batal" class="btn btn-danger disabled" >Batalkan</a>

															<?php
														}else{
															?>
															<button type="button" class="btn btn-warning" id="reset-btn" >Hapus</button>
															<button type="button" class="btn btn-success" id="btn-save">Setujui</button>
															<a href="aksi_batalpenawaran.php?kode_penawaran=<?=$data_cek['kode_penawaran'];?>" title="Batal" class="btn btn-danger">Batalkan</a>
															<?php
														}
														?>
														<a href="admin/report/cetak_penawaran.php?kode_penawaran=<?=$data_cek['kode_penawaran']; ?>" target="_blank" title="Lihat" class="btn btn-primary">Cetak</a>
														<a href="pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>" title="Batal" class="btn btn-secondary">Kembali</a>
													</div>
													<form id="signatureform" action="" style="display:none" method="post">
														<input type="hidden" id="signature" name="signature">
														<input type="hidden" name="signaturesubmit" value="1">
													</form>
												</div>  
											</div>

										</div>
									</section>
									<?php
									if(isset($_POST['signaturesubmit'])){ 
										$kode_pesanan=$data_cek['kode_pesanan'];
										$nama_pengguna=$data_cek['nama_pengguna'];
										$kode_penawaran=$data_cek['kode_penawaran'];
										$signature = $_POST['signature'];
										$signatureFileName = $kode_pesanan.$nama_pengguna.uniqid().'.png';
										$signature = str_replace('data:image/png;base64,', '', $signature);
										$signature = str_replace(' ', '+', $signature);
										$data = base64_decode($signature);
										$file = 'admin/foto/ttd_pelanggan/'.$signatureFileName;
										$sumber = @$_FILES['signature']['tmp_name'];
										file_put_contents($file, $data);

										if (!empty($sumber)) {
											$sql_terima = "UPDATE tb_penawaran SET
											proses_tawar='diterima',
											ttd_pelanggan='$signatureFileName',
											tgl_tawar=NOW()   
											WHERE kode_penawaran=$kode_penawaran";
											$sql_terima = mysqli_query($koneksi, $sql_terima);

											if ($sql_terima) {
												echo "<script>
												Swal.fire({title: 'Penawaran Disetujui',text: 'Kami Segera Mengerjakan Pesanan Anda',icon: 'success',confirmButtonText: 'OK'
												}).then((result) => {if (result.value){
													window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
												}
											})</script>";
										}else{
											echo "<script>
											Swal.fire({title: 'Penawaran Gagal',text: 'Ada Kesalahan',icon: 'error',confirmButtonText: 'OK'
											}).then((result) => {if (result.value){
												'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
											}
										})</script>";
									}
								}elseif(empty($sumber)){
									echo "<script>
									Swal.fire({title: 'Penawaran Gagal',text: 'Tanda tangan wajib diisi',icon: 'error',confirmButtonText: 'OK'
									}).then((result) => {
										if (result.value) {
											window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
										}
									})</script>";
								}
							} 
							?>
						</main><!-- End #main -->
						<?php
					}
				}
				?>
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
				<script>
					$(document).ready(() => {
						var canvasDiv = document.getElementById('canvasDiv');
						var canvas = document.createElement('canvas');
						canvas.setAttribute('id', 'canvas');
						canvasDiv.appendChild(canvas);
						$("#canvas").attr('height', $("#canvasDiv").outerHeight());
						$("#canvas").attr('width', $("#canvasDiv").width());
						if (typeof G_vmlCanvasManager != 'undefined') {
							canvas = G_vmlCanvasManager.initElement(canvas);
						}

						context = canvas.getContext("2d");
						$('#canvas').mousedown(function(e) {
							var offset = $(this).offset()
							var mouseX = e.pageX - this.offsetLeft;
							var mouseY = e.pageY - this.offsetTop;

							paint = true;
							addClick(e.pageX - offset.left, e.pageY - offset.top);
							redraw();
						});

						$('#canvas').mousemove(function(e) {
							if (paint) {
								var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

						$('#canvas').mouseup(function(e) {
							paint = false;
						});

						$('#canvas').mouseleave(function(e) {
							paint = false;
						});

						var clickX = new Array();
						var clickY = new Array();
						var clickDrag = new Array();
						var paint;

						function addClick(x, y, dragging) {
							clickX.push(x);
							clickY.push(y);
							clickDrag.push(dragging);
						}

						$("#reset-btn").click(function() {
							context.clearRect(0, 0, window.innerWidth, window.innerWidth);
							clickX = [];
							clickY = [];
							clickDrag = [];
						});

						$(document).on('click', '#btn-save', function() {
							var mycanvas = document.getElementById('canvas');
							var img = mycanvas.toDataURL("image/png");
							anchor = $("#signature");
							anchor.val(img);
							$("#signatureform").submit();
						});

						var drawing = false;
						var mousePos = {
							x: 0,
							y: 0
						};
						var lastPos = mousePos;

						canvas.addEventListener("touchstart", function(e) {
							mousePos = getTouchPos(canvas, e);
							var touch = e.touches[0];
							var mouseEvent = new MouseEvent("mousedown", {
								clientX: touch.clientX,
								clientY: touch.clientY
							});
							canvas.dispatchEvent(mouseEvent);
						}, false);


						canvas.addEventListener("touchend", function(e) {
							var mouseEvent = new MouseEvent("mouseup", {});
							canvas.dispatchEvent(mouseEvent);
						}, false);


						canvas.addEventListener("touchmove", function(e) {

							var touch = e.touches[0];
							var offset = $('#canvas').offset();
							var mouseEvent = new MouseEvent("mousemove", {
								clientX: touch.clientX,
								clientY: touch.clientY
							});
							canvas.dispatchEvent(mouseEvent);
						}, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
        	var rect = canvasDiv.getBoundingClientRect();
        	return {
        		x: touchEvent.touches[0].clientX - rect.left,
        		y: touchEvent.touches[0].clientY - rect.top
        	};
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
        	e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
            	context.beginPath();
            	if (clickDrag[i] && i) {
            		context.moveTo(clickX[i - 1], clickY[i - 1]);
            	} else {
            		context.moveTo(clickX[i] - 1, clickY[i]);
            	}
            	context.lineTo(clickX[i], clickY[i]);
            	context.closePath();
            	context.stroke();
            }
        }
    })

</script>

</body>

</html>
