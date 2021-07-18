<?php

if(isset($_GET['kode_pesanan'])){
	$sql_cek = "SELECT tb_pesanan.kode_pesanan, tb_pengguna.nama_pengguna, tb_pengguna.alamat_pengguna, tb_desain.nama_desain, tb_desain.harga_normal FROM tb_pesanan 
	JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
	JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain
	WHERE kode_pesanan='".$_GET['kode_pesanan']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
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
					<div class="col-sm-5">
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat_pengguna']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Desain</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_desain" name="nama_desain" value="<?php echo $data_cek['nama_desain']; ?>"
						readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Harga Normal</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="harga_normal" name="harga_normal" value="<?= number_format($data_cek['harga_normal']); ?>"
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
		$biaya_dp=(0.3*$total_bayar);
		$sisa_bayar=$total_bayar-$biaya_dp;

		$sql_simpan = "INSERT INTO tb_penawaran (kode_pesanan, biaya_dp, sisa_bayar, total_bayar, proses_tawar, ttd_pelanggan, tgl_tawar) VALUES (
		'".$_POST['kode_pesanan']."',
		$biaya_dp,
		$sisa_bayar,
		$total_bayar,
		'diproses',
		'',
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

