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
  $sql_tampil = "SELECT tb_pesanan.kode_pesanan, tb_desain.nama_desain, tb_penawaran.biaya_dp, tb_penawaran.sisa_bayar, tb_penawaran.total_bayar
  FROM tb_pesanan 
  JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain 
  JOIN tb_penawaran ON tb_pesanan.kode_pesanan=tb_penawaran.kode_pesanan
  WHERE tb_pesanan.kode_pesanan=$kode_pesanan";
  $query_tampil = mysqli_query($koneksi, $sql_tampil);
  while ($tampil= $query_tampil->fetch_assoc()) {
    $kode_pesanan=$tampil['kode_pesanan'];
    $nama_desain=$tampil['nama_desain'];
    $biaya_dp=$tampil['biaya_dp'];
    $sisa_bayar=$tampil['sisa_bayar'];
    $total_bayar=$tampil['total_bayar'];
  }}

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
          <li>Pembayaran</li>
        </ol>
        <h2>Pembayaran</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <?php 
    if(isset($kode_pesanan)){
      $sql_cek = "SELECT kode_penawaran,proses_tawar FROM tb_penawaran WHERE kode_pesanan=$kode_pesanan";
      $query_cek = mysqli_query($koneksi, $sql_cek);
      $data2_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

      if (empty($data2_cek['kode_penawaran']) || $data2_cek['proses_tawar']=='dibatalkan' 
        || $data2_cek['proses_tawar']=='diproses') {
        echo "<script>
        Swal.fire({title: 'Penawaran Belum Disetujui',text: 'Harap penawaran disetujui oleh anda',icon: 'info',confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
          }
        })</script>";
      }else{

        ?>

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
                <label class="col-sm-3 col-form-label">Biaya Muka</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="biaya_dp" name="biaya_dp" value="Rp. <?= number_format($biaya_dp); ?>"
                  readonly/> 
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Sisa Pembayaran</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="sisa_bayar" name="sisa_bayar" value="Rp. <?= number_format($sisa_bayar); ?>"
                  readonly/> 
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Total Pembayaran</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="Rp. <?= number_format($total_bayar); ?>"
                  readonly/> 
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                <div class="col-sm-3">
                  <select name="jenis_bayar" id="jenis_bayar" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php
                //cek data yg dipilih sebelumnya
                    if ($data_cek['jenis_bayar'] == "Biaya Muka") echo "<option value='Biaya Muka' selected>Biaya Muka</option>";
                    else echo "<option value='Biaya Muka'>Biaya Muka</option>";

                    if ($data_cek['jenis_bayar'] == "Sisa Pembayaran") echo "<option value='Sisa Pembayaran' selected>Sisa Pembayaran</option>";
                    else echo "<option value='Sisa Pembayaran'>Sisa Pembayaran</option>";
                    ?>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Unggah Foto Bukti Pembayaran</label>
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
              <input type="submit" name="kirim" value="Kirim" class="btn btn-success">
              <a href="pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>" title="Kembali" class="btn btn-secondary">Kembali</a>
            </div>
          </form>  
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

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Alert -->
<script src="admin/plugins/alert.js"></script>
</body>

</html>

<?php
$sumber = @$_FILES['foto_pembayaran']['tmp_name'];
$target = 'admin/foto/bayar/';
$nama_file = @$_FILES['foto_pembayaran']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['kirim'])){

  if(!empty($sumber)){
    $sql_simpan = "INSERT INTO tb_pembayaran (kode_pesanan,jenis_bayar,foto_pembayaran,tgl_bayar) VALUES (
    $kode_pesanan,
    '".$_POST['jenis_bayar']."',
    '".$nama_file."',
    CURRENT_TIMESTAMP)";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Kirim Foto Bukti Pembayaran Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
      }
    })</script>";
  }else{
    echo "<script>
    Swal.fire({title: 'Kirim Bukti Pembayarana Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
      window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
    }
  })</script>";
}
}elseif(empty($sumber)){
  echo "<script>
  Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {
    if (result.value) {
      window.location = 'pesanan_pelanggan.php?id_pelanggan=<?=$data_id?>';
    }
  })</script>";
}
}
