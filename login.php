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
  <title>Login | Mailiana Jaya 2</title>
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
            <h1 class="login-title">Masuk</h1>
            <form action="" method="post">
              <div class="form-group">
                <label for="username">username</label>
                <input type="username" name="username" id="username" class="form-control" placeholder="masukkan usernamemu" required>
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="masukkan passwordmu" required>
              </div>
              <!-- <input name="login" id="login" class="btn btn-block login-btn" type="button" value="Masuk"> -->
              <button type="submit" class="btn btn-block login-btn" name="login" title="Masuk">
                <b>Masuk</b>
              </button>
            </form>
            <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
            <p class="login-wrapper-footer-text">Belum memiliki akun? <a href="register.php" class="text-reset">Daftar Di Sini!</a></p>
            <p class="login-wrapper-footer-text"><a href="index.php" class="text-reset">Ke halaman Beranda</a></p>
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
if (isset($_POST['login'])) {  
  //anti inject sql
  $username=mysqli_real_escape_string($koneksi,$_POST['username']);
  $password=mysqli_real_escape_string($koneksi,$_POST['password']);

  if(!empty(trim($username))&& !empty(trim($password))){
            //if(login_cek_nama($nama)){
    if(cek_nama($username)!=0){
                //menguji nama kembar
      if(cek_data($username,$password)) 

                  //query login
        $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
      $query_login = mysqli_query($koneksi, $sql_login);
      $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
      $jumlah_login = mysqli_num_rows($query_login);


      if ($jumlah_login ==1 ){
        session_start();
        $_SESSION["ses_id"]=$data_login["id_pengguna"];
        $_SESSION["ses_nama"]=$data_login["nama_pengguna"];
        $_SESSION["ses_username"]=$data_login["username"];
        $_SESSION["ses_password"]=$data_login["password"];
        $_SESSION["ses_no_hp"]=$data_login["no_hp"];
        $_SESSION["ses_email"]=$data_login["email"];
        $_SESSION["ses_level"]=$data_login["level"];

        if($_SESSION["ses_level"]=='Administrator'){

          echo "<script>
          Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'admin/index.php';}
          })</script>";
        }else{
          echo "<script>
          Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'index.php';}
          })</script>";
        }
      }else{
        echo "<script>
        Swal.fire({title: 'Login Gagal',text: 'Ada kesalahan',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'login.php';}
        })</script>";
      }
      }else echo "<script>
      Swal.fire({title: 'Login Gagal',text: 'Username / akun anda tidak ada, harap cek kembali akun anda / registrasi terlebih dahulu',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'login.php';}
      })</script>";
      }else echo "<script>
      Swal.fire({title: 'Login Gagal',text: 'Kolom tidak boleh kosong',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'login.php';}
      })</script>";
    }
    ?>