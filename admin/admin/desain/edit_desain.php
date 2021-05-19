<?php

if(isset($_GET['kode_desain'])){
	$sql_cek = "SELECT * FROM tb_desain WHERE kode_desain='".$_GET['kode_desain']."'";
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
					<label class="col-sm-2 col-form-label">Kode Desain</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="kode_desain" name="kode_desain" value="<?php echo $data_cek['kode_desain']; ?>"
						readonly/>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Desain</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_desain" name="nama_desain" value="<?php echo $data_cek['nama_desain']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Deskripsi</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data_cek['deskripsi']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Harga Normal</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="harga_normal" name="harga_normal" value="<?= number_format($data_cek['harga_normal']); ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Foto Desain</label>
					<div class="col-sm-6">
						<img src="foto/desain/<?php echo $data_cek['foto_desain']; ?>" width="160px" />
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ubah Foto</label>
					<div class="col-sm-6">
						<input type="file" id="foto_desain" name="foto_desain">
						<p class="help-block">
							<font color="red">"Format file Jpg/Png"</font>
						</p>
					</div>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
				<a href="?page=data-desain" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php
	$sumber = @$_FILES['foto_desain']['tmp_name'];
	$target = 'foto/desain/';
	$nama_file = @$_FILES['foto_desain']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
	if (isset ($_POST['Ubah'])){

		if(!empty($sumber)){
			$foto= $data_cek['foto_desain'];
			if (file_exists("foto/desain/$foto")){
				unlink("foto/desain/$foto");}

				$sql_ubah = "UPDATE tb_desain SET
				nama_desain='".$_POST['nama_desain']."',
				deskripsi='".$_POST['deskripsi']."',
				harga_normal='".$_POST['harga_normal']."',
				foto_desain='".$nama_file."'		
				WHERE kode_desain='".$_POST['kode_desain']."'";
				$query_ubah = mysqli_query($koneksi, $sql_ubah);

			}elseif(empty($sumber)){
				$sql_ubah = "UPDATE tb_desain SET
				nama_desain='".$_POST['nama_desain']."',
				deskripsi='".$_POST['deskripsi']."',
				harga_normal='".$_POST['harga_normal']."'
				WHERE kode_desain='".$_POST['kode_desain']."'";
				$query_ubah = mysqli_query($koneksi, $sql_ubah);
			}

			if ($query_ubah) {
				echo "<script>
				Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=data-desain';
					}
				})</script>";
			}else{
				echo "<script>
				Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=data-desain';
					}
				})</script>";
			}
		}

