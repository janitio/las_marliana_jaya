<?php

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


$kode_pesanan=$_GET['kode_pesanan'];
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Beri Keterangan Pesanan</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0"><br>
				<?php 

				if(isset($_POST['submit'])){
					$pesan = $_POST['kirim_pesan'];
					$query ="INSERT INTO tb_notif (kode_pesanan,pesan,status,tgl_pesan) VALUES ($kode_pesanan,'$pesan', 'unread', CURRENT_TIMESTAMP)";
					if(performQuery($query)){
						echo "<script>
						Swal.fire({title: 'Kirim Pesan Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								window.location = 'index.php?page=data-pesanan';
							}
						})</script>";
					}else{
						echo "<script>
						Swal.fire({title: 'Kirim Pesan Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								window.location = 'index.php?page=ket-pesanan';
							}
						})</script>";
					}
				}

				?>
				<form method="post">
					<div class="card-body">
						<textarea name="kirim_pesan" class="form-control mr-sm-10" type="text" placeholder="Beritahu pada pelanggan" required></textarea>
					</div><br>
					<div class="card-footer">
						<button name="submit" class="btn btn-success my-2 my-sm-0" type="submit">Kirim</button>

						<a href="?page=data-pegawai" class="btn btn-warning">Kembali</a>
					</form>

				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Pratinjau Pesan yang dikirim
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">

				<?php
				$sql_cek = $koneksi->query("SELECT * FROM tb_notif WHERE kode_pesanan=$kode_pesanan");

				while ($data= $sql_cek->fetch_assoc()) {
					?>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<?php echo $data['pesan']; ?> (<?php echo $data['tgl_pesan']; ?>)
							</tr>
						</thead>
					</table>
							<?php
						}
						?>
					</div>
				</div>
			</div>

		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>