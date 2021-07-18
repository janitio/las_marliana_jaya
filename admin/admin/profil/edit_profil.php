<?php

if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM tb_profil WHERE id_profil='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Profil</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<input type='hidden' class="form-control" name="id_profil" value="<?php echo $data_cek['id_profil']; ?>"
				readonly/>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Bengkel Las</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nama_profil" name="nama_profil" value="<?php echo $data_cek['nama_profil']; ?>"
						/>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
						/>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Pemilik</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?php echo $data_cek['nama_pemilik']; ?>"
						/>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Foto Tanda Tangan</label>
					<div class="col-sm-6">
						<img src="foto/ttd_pemilik/<?php echo $data_cek['ttd_pemilik']; ?>" width="160px" />
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ubah Foto</label>
					<div class="col-sm-6">
						<input type="file" id="ttd_pemilik" name="ttd_pemilik">
						<p class="help-block">
							<font color="red">"Format file Jpg/Png"</font>
						</p>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
				<a href="?page=data-profil" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>



	<?php
	$sumber = @$_FILES['ttd_pemilik']['tmp_name'];
	$target = 'foto/ttd_pemilik/';
	$nama_file = @$_FILES['ttd_pemilik']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	if (isset ($_POST['Ubah'])){
		if(!empty($sumber)){
			$foto= $data_cek['ttd_pemilik'];
			if (file_exists("foto/ttd_pemilik/$foto")){
				unlink("foto/ttd_pemilik/$foto");}

				$sql_ubah = "UPDATE tb_profil SET 
				nama_profil='".$_POST['nama_profil']."',
				alamat='".$_POST['alamat']."',
				nama_pemilik='".$_POST['nama_pemilik']."',
				ttd_pemilik='".$nama_file."'
				WHERE id_profil='".$_POST['id_profil']."'";
				$query_ubah = mysqli_query($koneksi, $sql_ubah);

			}elseif(empty($sumber)){
				$sql_ubah = "UPDATE tb_profil SET 
				nama_profil='".$_POST['nama_profil']."',
				alamat='".$_POST['alamat']."',
				nama_pemilik='".$_POST['nama_pemilik']."'
				WHERE id_profil='".$_POST['id_profil']."'";
				$query_ubah = mysqli_query($koneksi, $sql_ubah);
			}

			if ($query_ubah) {
				echo "<script>
				Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=data-profil';
					}
				})</script>";
			}else{
				echo "<script>
				Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=data-profil';
					}
				})</script>";
			}

		}
