<?php
include "admin/inc/koneksi.php";
include "admin/inc/user.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar | Mailiana Jaya 2</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="login/assets/css/login.css">

  <!-- Alert -->
  <script src="admin/plugins/alert.js"></script>
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Daftar</h1>
            <form action="" method="post">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="nama" name="nama" id="nama" class="form-control" placeholder="Nama Lengkapmu" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" name="username" id="username" class="form-control" placeholder="masukkan usernamemu" required>
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="masukkan passwordmu" required>

              </div>
              <div class="form-group">
                <label for="no_hp">No. HP (WhatsApp Aktif)</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="081234567890" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@contoh.com" required>
              </div>
              <div class="form-group">
                <label for="alamat_pengguna">Alamat Lengkap</label>
                <input type="text" name="alamat_pengguna" id="alamat_pengguna" class="form-control" placeholder="cantumkan alamat selengkapnya" required>
              </div>
              <button type="submit" class="btn btn-block login-btn" name="daftar" title="Daftar">
                <b>Daftar</b>
              </button>

            </form>
            <p class="login-wrapper-footer-text"><a href="login.php" class="text-reset">Kembali ke halaman Masuk</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="login/assets/images/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- Alert -->
  <script src="admin/plugins/alert.js"></script>
</body>
</html>
<?php
if (isset($_POST['daftar'])) {  
  $username=$_POST['username'];
  $password=$_POST['password'];

  if(!empty(trim($username))&& !empty(trim($password))){
            //if(regis_cek_nama($nama)){
    if(cek_nama($username)==0){
                //query login
      $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna, username, password, no_hp, email,alamat_pengguna, level) VALUES (
      '".$_POST['nama']."',
      '$username',
      '$password',
      '".$_POST['no_hp']."',
      '".$_POST['email']."',
      '".$_POST['alamat_pengguna']."',
      'Pelanggan')";
      $query_simpan = mysqli_query($koneksi, $sql_simpan);
      mysqli_close($koneksi);

      if ($query_simpan){

        echo "<script>
        Swal.fire({title: 'Daftar Akun Berhasil',text: 'Silahkan Login Kembali',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'login.php';}
        })</script>";
      }else{
        echo "<script>
        Swal.fire({title: 'Daftar Akun Gagal',text: 'Ada kesalahan',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'register.php';}
        })</script>";
      }             
      }else  echo "<script>
      Swal.fire({title: 'Daftar Akun Gagal',text: 'Username sudah terdaftar',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'register.php';}
      })</script>";
      }else  echo "<script>
      Swal.fire({title: 'Daftar Akun Gagal',text: 'Kolom tidak boleh kosong',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'register.php';}
      })</script>";

    }
    ?>