<?php
 //KONEKSI DB
include "admin/inc/koneksi.php";

if(isset($_GET['kode_desain'])){
  // $sql_cek = "SELECT * from tb_desain WHERE kode_desain='".$_GET['kode_desain']."'";
  // $query_cek = mysqli_query($koneksi, $sql_cek);
  // $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

  $sql = $koneksi->query("SELECT * from tb_desain WHERE kode_desain='".$_GET['kode_desain']."'");

  while ($data= $sql->fetch_assoc()) {

    $nama=$data['nama_desain'];
    $foto=$data['foto_desain'];
    $motif=$data['deskripsi'];
    $harga=$data['harga_normal'];
  }
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
</head>

<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <h2><?=$nama; ?></h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details swiper-container">
              <div class="swiper-wrapper align-items-center">
                <img src="admin/foto/desain/<?=$foto; ?>" width="500px">
              </div>
            </div>
           <!--  <div class="container"><br>
              <a href="index.php" class="btn btn-warning">Kembali</a>
            </div> -->
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Informasi Desain</h3>
              <ul>
                <li><strong>Nama</strong>: <?=$nama; ?></li>
                <li><strong>Deskripsi</strong>: <?=$motif; ?></li>
                <li><strong>Harga Normal</strong>: Rp. <?= number_format($harga); ?></li>
              </li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Cara order</h2>
            <p>
              Login terlebih dahulu dengan pilih menu "Masuk", lalu pesan desain yang diinginkan, setelah itu kami akan memproses pesanan anda dan mengukur lokasi anda sesuai yang dicantumkan alamat pada akun anda. Kami akan melakukan kalkulasi pesanan anda mulai dari biaya karyawan, bahan yang dibutuhkan, pengiriman, dan pemasangan, lalu melakukan penawaran yang akan dikirimkan ke menu "Penawaran", bila disetujui, lalu bayar biaya muka (cukup kirimkan bukti pembayarannya pada menu "Pembayaran") maka pesanan anda akan diproses, bila sudah dikirim dan pasang maka anda wajib membayar sisa pembayaran (cukup kirimkan bukti pembayarannya pada menu "Pembayaran").
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

</body>

</html>