<?php
include "admin/inc/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar | Marliana Jaya 2</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="login/assets/css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="login/assets/images/logo.svg" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
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
                <input type="tel" name="no_hp" id="no_hp" class="form-control" placeholder="081234567890" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@contoh.com" required>
              </div>
             <!--  <input name="daftar" id="login" class="btn btn-block login-btn" type="button" value="Daftar"> -->
               <button type="submit" class="btn btn-block login-btn" name="daftar" title="Daftar">
                <b>Daftar</b>
              </button>

            </form>
            <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->

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

  //query login
  $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna, username, password, no_hp, email, level) VALUES (
  '".$_POST['nama']."',
  '".$_POST['username']."',
  '".$_POST['password']."',
  '".$_POST['no_hp']."',
  '".$_POST['email']."',
  'Pelanggan')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan){

    echo "<script>
    Swal.fire({title: 'Daftar Akun Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'login.php';}
    })</script>";
  }else{
    echo "<script>
    Swal.fire({title: 'Daftar Akun Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'register.php';}
    })</script>";
  }
}
?>