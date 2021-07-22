<?php
     //Mulai Sesion
session_start();
include "admin/inc/koneksi.php";

if (isset($_SESSION["ses_username"])){

  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_user = $_SESSION["ses_username"];
  $data_level = $_SESSION["ses_level"];
}

define('DBINFO', 'mysql:host=localhost;dbname=las_mailiana');
define('DBUSER','root');
define('DBPASS','');

function fetchAll($query){
  $con = new PDO(DBINFO, DBUSER, DBPASS);
  $stmt = $con->query($query);
  return $stmt->fetchAll();
}
function performQuery($query){
  $con = new PDO(DBINFO, DBUSER, DBPASS);
  $stmt = $con->prepare($query);
  if($stmt->execute()){
    return true;
  }else{
    return false;
  }
}

$sql = $koneksi->query("SELECT * from tb_profil");
while ($data= $sql->fetch_assoc()) {

  $nama=$data['nama_profil'];
}

$sql2 = $koneksi->query("SELECT * from tb_desain");

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
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Desain</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
          <?php if(!isset($data_user)){?>
           <li><a class="nav-link scrollto" href="login.php">Masuk</a></li>
         <?php }else{?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-bell-fill" font-size="36px"></i>
              <?php
              $query = "SELECT * from tb_notif where status = 'unread' AND id_pengguna=$data_id order by tgl_pesan DESC";
              if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-dark"><?php echo count(fetchAll($query)); ?></span>
                <?php
              }
              ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php
              $query = "SELECT * from tb_notif where id_pengguna=$data_id order by tgl_pesan DESC";
              if(count(fetchAll($query))>0){
               foreach(fetchAll($query) as $data){
                ?>
                <a style ="
                <?php
                if($i['status']=='unread'){
                  echo "font-weight:bold;";
                }
                ?>
                " class="dropdown-item" href="kirimpesan_pelanggan.php?kode_pesanan=<?=$data['kode_pesanan']; ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($data['tgl_pesan'])) ?></i></small><br>
                <?php 
                echo "Anda memiliki pesan.";
                ?>
              </a>
              <div class="dropdown-divider"></div>
              <?php
            }
          }else{
           echo "tidak ada pesan.";
         }
         ?>
       </div>
     </li>
     <li><a href="ubah_profil.php?id_pelanggan=<?=$data_id?>"><?= $_SESSION['ses_nama'];?>
     <li><a href="pesanan_pelanggan.php?id_pelanggan=<?= $data_id?>">Pesanan</a></li>
     <li><a href="admin/logout.php">Keluar</a></li>
   </li>
 <?php } ?>
</ul>
<i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

</div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <div class="container" data-aos="fade-in">
    <h1>Selamat Datang di Website Bengkel Las <?=$nama; ?></h1>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container">

      <div class="row">
        <div class="col-xl-4 col-lg-5" data-aos="fade-up">
          <div class="content">
            <h3>Kenapa memilih website ini ?</h3>
            <p>
              Kami menyediakan desain - desain menarik pada teralis jendela, kanopi, pintu besi, pagar besi, tangga besi, dan semacamnya. 
            </p>
          </div>
        </div>
        <div class="col-xl-8 col-lg-7 d-flex">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Desain</h4>
                  <p>menyediakan desain - desain menarik untuk anda</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Penawaran</h4>
                  <p>Melakukan penawaran secara online agar mempermudah dalam memproses pesanan anda</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>Pesanan</h4>
                  <p>pilih desain yang diinginkan, ukur lokasi, penawaran online, bayar dimuka, kirim & pasang, bayar keseluruhan</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container">

      <div class="row">
        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" data-aos="fade-right">
          <a href="#"></a>
        </div>

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <h4 data-aos="fade-up">Tentang Kami</h4>
          <p data-aos="fade-up">Bengkel las yang berada di Kotabumi, memiliki karyawan - karyawan yang terampil dalam mendesain dengan berbahan besi yang berkualitas.</p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2 data-aos="fade-up">Desain</h2>
        <p data-aos="fade-up">Desain - desain yang pernah dibuat dengan rancangan menarik oleh Mailiana Jaya 2.</p>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php while ($data= $sql2->fetch_assoc()) {
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="admin/foto/desain/<?=$data['foto_desain'];?>" class="img-fluid" width="350px">
            <div class="portfolio-info">
              <h4><?=$data['nama_desain'];?></h4> 

              <a href="desain_detail.php?kode_desain=<?php echo $data['kode_desain']; ?>" class="portfolio-lightbox preview-link"><i class="bx bx-show-alt"></i></a><br>
              <?php if(isset($data_user)){?>
                <a href="pesan_desain.php?kode_desain=<?php echo $data['kode_desain']; ?>" title="Pesan" class="btn btn-success btn-sm">Pesan</a>
              <?php }?>
            </div>
          </div>
        <?php }?>
      </div>

    </div>
  </section>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2 data-aos="fade-up">Kontak Kami</h2>
        <p data-aos="fade-up">Bila ada yang ingin bertanya mengenai bengkel las kami, bisa hubungi kami.</p>
      </div>

      <div class="row justify-content-center">

        <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>Alamat Kami</h3>
            <p>Jalan Bawal Raya Blok A7 #01, Kuta Baru, Kec. Ps. Kemis, Tangerang, Banten 15561</p>
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Kami  </h3>
            <p>las_mailiana@gmail.com</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Hubungi Kami (WhatsApp)</h3>
            <p>+62 852 1563 7999</p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main --> <!-- ======= Footer ======= -->
<footer id="footer">
  <div class="container d-lg-flex py-4">

    <div class="me-lg-auto text-center text-lg-start">
      <div class="copyright">
        &copy; Copyright <strong><span><?=$nama; ?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">Vitra Janitio</a>
      </div>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>