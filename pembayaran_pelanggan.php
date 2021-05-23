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

if (isset($kode_pesanan)) {
  $sql_tampil = "SELECT tb_pesanan.kode_pesanan, tb_desain.nama_desain FROM tb_pesanan 
  JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain 
  WHERE tb_pesanan.kode_pesanan=$kode_pesanan";
  $query_tampil = mysqli_query($koneksi, $sql_tampil);
  while ($tampil= $query_tampil->fetch_assoc()) {
    $kode_pesanan=$tampil['kode_pesanan'];
    $nama_desain=$tampil['nama_desain'];
  }}

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
           <li class="dropdown"><a href="#"><span><?php if(isset($data_user)){
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
        <li>Pembayaran</li>
      </ol>
      <h2>Pembayaran</h2>
    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page pt-3">
    <div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kode Pesanan</label>
            <div class="col-sm-3">
             <input type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" value="<?=$kode_pesanan; ?>"
             readonly/> 
           </div>
         </div>
         <br>
         <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Desain</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="nama_desain" name="nama_desain" value="<?=$nama_desain; ?>"
            readonly/> 
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jenis Pembayaran</label>
          <div class="col-sm-3">
            <select name="proses" id="proses" class="form-control">
              <option value="">-- Pilih --</option>
              <?php
                //cek data yg dipilih sebelumnya
              if ($data_cek['jenis_bayar'] == "Bayar Dimuka") echo "<option value='Bayar Dimuka' selected>Bayar Dimuka</option>";
              else echo "<option value='Bayar Dimuka'>Bayar Dimuka</option>";

              if ($data_cek['jenis_bayar'] == "Sisa Pembayaran") echo "<option value='Sisa Pembayaran' selected>Sisa Pembayaran</option>";
              else echo "<option value='Sisa Pembayaran'>Sisa Pembayaran</option>";
              ?>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Unggah Foto Pembayaran</label>
          <div class="col-sm-6">
            <input type="file" id="foto_pembayaran" name="foto_pembayaran">
            <p class="help-block">
              <font color="red">"Format file Jpg/Png"</font>
            </p>
          </div>
        </div>
        <br>
      </div>
      <div class="card-body">
        <input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
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

</body>

</html>

<?php
$sumber = @$_FILES['foto_pembayaran']['tmp_name'];
$target = 'admin/foto/bayar/';
$nama_file = @$_FILES['foto_pembayaran']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['kirim'])){

  if(!empty($sumber)){
    $sql_simpan = "INSERT INTO tb_pembayaran (id_pengguna,jenis_bayar,foto_pembayaran,timestamp) VALUES (
    '".$_POST['jenis_bayar']."',
    '".$nama_file."',
    NOW())";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-desain';
      }
    })</script>";
  }else{
    echo "<script>
    Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
      window.location = 'index.php?page=add-desain';
    }
  })</script>";
}
}elseif(empty($sumber)){
  echo "<script>
  Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {
    if (result.value) {
      window.location = 'index.php?page=add-desain';
    }
  })</script>";
}
}
