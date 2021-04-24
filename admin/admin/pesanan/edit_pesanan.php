<?php

if(isset($_GET['kode_pesanan'])){
	$sql_cek = "SELECT * FROM tb_pesanan WHERE kode_pesanan='".$_GET['kode_pesanan']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

	$sql_user = "SELECT * FROM tb_pengguna INNER JOIN tb_pesanan ON tb_pengguna.id_pengguna=tb_pesanan.id_pengguna";
	$query_user = mysqli_query($koneksi, $sql_user);
	$data_user = mysqli_fetch_array($query_user,MYSQLI_BOTH);
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
					<label class="col-sm-2 col-form-label">Kode Desain</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="kode_desain" name="kode_desain" value="<?php echo $data_cek['kode_desain']; ?>"
						readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">ID Pelanggan</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="id_pengguna" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>"
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
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"readonly
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No HP</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?=$data_user['no_hp']; ?>"readonly
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Proses</label>
					<div class="col-sm-4">
						<select name="proses" id="proses" class="form-control">
							<option value="">-- Pilih --</option>
							<?php
                //cek data yg dipilih sebelumnya
							if ($data_cek['proses'] == "diproses") echo "<option value='diproses' selected>diproses</option>";
							else echo "<option value='diproses'>diproses</option>";

							if ($data_cek['proses'] == "survei") echo "<option value='survei' selected>survei</option>";
							else echo "<option value='survei'>survei</option>";

							if ($data_cek['proses'] == "kalkulasi") echo "<option value='kalkulasi' selected>kalkulasi</option>";
							else echo "<option value='kalkulasi'>kalkulasi</option>";

							if ($data_cek['proses'] == "pengerjaan") echo "<option value='pengerjaan' selected>pengerjaan</option>";
							else echo "<option value='pengerjaan'>pengerjaan</option>";

							if ($data_cek['proses'] == "dikirim") echo "<option value='dikirim' selected>dikirim</option>";
							else echo "<option value='dikirim'>dikirim</option>";

							if ($data_cek['proses'] == "diterima") echo "<option value='diterima' selected>diterima</option>";
							else echo "<option value='diterima'>diterima</option>";

							if ($data_cek['proses'] == "dibatalkan") echo "<option value='dibatalkan' selected>dibatalkan</option>";
							else echo "<option value='dibatalkan'>dibatalkan</option>";
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Foto Desain</label>
					<div class="col-sm-6">
						<img src="foto/desain/<?php echo $data_cek['foto_desain']; ?>" width="160px" />
					</div>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
				<a href="?page=data-pesanan" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php

	if (isset ($_POST['Ubah'])){

		$sql_ubah = "UPDATE tb_pesanan SET
		proses='".$_POST['proses']."'
		WHERE kode_pesanan='".$_POST['kode_pesanan']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);

		$sql_track = "INSERT INTO tb_track_pesanan (kode_pesanan, kode_desain, id_pengguna, nama_pengguna, alamat, no_hp, foto_desain, proses, timestamp) VALUES (
		'".$data_cek['kode_pesanan']."',
		'".$data_cek['kode_desain']."',
		'".$data_cek['id_pengguna']."',
		'".$data_cek['nama_pengguna']."',
		'".$data_cek['alamat']."',
		'".$data_user['no_hp']."',
		'".$data_cek['foto_desain']."',
		'".$_POST['proses']."',
		NOW())";
		$query_track = mysqli_query($koneksi, $sql_track);


		if ($query_ubah) {
			echo "<script>
			Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data-pesanan';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data-pesanan';
				}
			})</script>";
		}
	}

