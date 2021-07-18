<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Desain</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_desain" name="nama_desain" placeholder="Nama Desain" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Deskripsi</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Harga Normal</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="harga_normal" name="harga_normal" placeholder="Harga Normal" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Foto Desain</label>
					<div class="col-sm-6">
						<input type="file" id="foto_desain" name="foto_desain">
						<p class="help-block">
							<font color="red">"Format file Jpg/Png"</font>
						</p>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php
	$sumber = @$_FILES['foto_desain']['tmp_name'];
	$target = 'foto/desain/';
	$nama_file = @$_FILES['foto_desain']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
			$sql_simpan = "INSERT INTO tb_desain (nama_desain, deskripsi, harga_normal, foto_desain) VALUES (
			'".$_POST['nama_desain']."',
			'".$_POST['deskripsi']."',
			'".$_POST['harga_normal']."',
			'".$nama_file."')";
			$query_simpan = mysqli_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);

			if ($query_simpan) {
				echo "<script>
				Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {if (result.value){
					window.location = 'index.php?page=data-desain';
				}
			})</script>";
		}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-desain';
			}
		})</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=add-desain';
		}
	})</script>";
}
}
     //selesai proses simpan data
