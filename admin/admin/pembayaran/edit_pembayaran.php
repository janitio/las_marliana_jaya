<?php

if(isset($_GET['id_pembayaran'])){
	$sql_cek = "SELECT tb_pembayaran.id_pembayaran, tb_pembayaran.kode_pesanan, tb_pembayaran.foto_pembayaran, tb_pembayaran.jenis_bayar, tb_pembayaran.tgl_bayar, tb_desain.nama_desain, tb_penawaran.kode_pesanan, tb_penawaran.biaya_dp, tb_penawaran.sisa_bayar,tb_penawaran.total_bayar, tb_pengguna.nama_pengguna FROM tb_pembayaran
	JOIN tb_pesanan ON tb_pembayaran.kode_pesanan=tb_pesanan.kode_pesanan
	JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
	JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain
	JOIN tb_penawaran ON tb_pesanan.kode_pesanan=tb_penawaran.kode_pesanan
	WHERE id_pembayaran='".$_GET['id_pembayaran']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
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
					<label class="col-sm-2 col-form-label">Nama Desain</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?=$data_cek['nama_desain']; ?>"readonly
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Biaya Dimuka</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="biaya_dp" name="biaya_dp" value="Rp. <?= number_format($data_cek['biaya_dp']); ?>"readonly
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Biaya Sisa Pembayaran</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="sisa_bayar" name="sisa_bayar" value="Rp. <?= number_format($data_cek['sisa_bayar']); ?>"readonly
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Total Pembayaran</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="total_bayar" name="total_bayar" value="Rp. <?= number_format($data_cek['total_bayar']); ?>"readonly
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Jenis Pembayaran</label>
					<div class="col-sm-3">
						<select name="jenis_bayar" id="jenis_bayar" class="form-control">
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

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Foto Pembayaran</label>
					<div class="col-sm-6">
						<img src="foto/bayar/<?php echo $data_cek['foto_pembayaran']; ?>" width="600px" />
					</div>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
				<a href="?page=data-pembayaran" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php

	if (isset ($_POST['Ubah'])){

		$sql_ubah = "UPDATE tb_pembayaran SET
		jenis_bayar='".$_POST['jenis_bayar']."'
		WHERE kode_pesanan='".$_POST['kode_pesanan']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);

		if ($query_ubah) {
			echo "<script>
			Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data-pembayaran';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data-pembayaran';
				}
			})</script>";
		}
	}

