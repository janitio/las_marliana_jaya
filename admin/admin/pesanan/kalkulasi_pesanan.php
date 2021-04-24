<?php

if(isset($_GET['kode_pesanan'])){
	$sql_cek = "SELECT * FROM tb_pesanan WHERE kode_pesanan='".$_GET['kode_pesanan']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

	$sql_user = "SELECT * FROM tb_desain INNER JOIN tb_pesanan ON tb_desain.kode_desain=tb_pesanan.kode_desain";
	$query_user = mysqli_query($koneksi, $sql_user);
	$data_user = mysqli_fetch_array($query_user,MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Kalkulasi Pesanan</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kode Pesanan</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" value="<?php echo $data_cek['kode_pesanan']; ?>"
						readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Pelanggan</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>"readonly
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Desain</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_desain" name="nama_desain" value="<?php echo $data_user['nama_desain']; ?>"
						readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Harga Normal</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_desain" name="nama_desain" value="<?= number_format($data_user['harga_normal']); ?>"
						readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Harga Total</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="total_bayar" name="total_bayar" />
					</div>
				</div>

			</div>

			<div class="card-footer">
				<input type="submit" name="Buat" value="Buat" class="btn btn-success">
				<a href="?page=data-pesanan" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php

	if (isset ($_POST['Buat'])){

		$total_bayar=$_POST['total_bayar'];
		$biaya_dp=(0.2*$total_bayar);
		$sisa_bayar=$total_bayar-$biaya_dp;

	$sql_simpan = "INSERT INTO tb_penawaran (kode_pesanan, id_pengguna, nama_pengguna, nama_desain, biaya_dp, sisa_bayar, total_bayar, proses_tawar, timestamp) VALUES (
	'".$_POST['kode_pesanan']."',
	'".$data_cek['id_pengguna']."',
	'".$_POST['nama_pengguna']."',
	'".$_POST['nama_desain']."',
	$biaya_dp,
	$sisa_bayar,
	$total_bayar,
	'diproses',
	NOW())";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
		Swal.fire({title: 'Buat Penawaran Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-pesanan';
		}
	})</script>";
}else{
	echo "<script>
	Swal.fire({title: 'Buat Penawaran Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {if (result.value){
		window.location = 'index.php?page=data-pesanan';
	}
})</script>";
}

}

