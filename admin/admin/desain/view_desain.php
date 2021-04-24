<?php

    if(isset($_GET['kode_desain'])){
        $sql_cek = "SELECT * from tb_desain WHERE kode_desain='".$_GET['kode_desain']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Desain</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>Kode Desain</b>
							</td>
							<td>:
								<?php echo $data_cek['kode_desain']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama Desain</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_desain']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Motif/Ukuran</b>
							</td>
							<td>:
								<?php echo $data_cek['motif']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Harga Normal</b>
							</td>
							<td>: Rp. <?= number_format($data_cek['harga_normal']); ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-desain" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto Desain
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="foto/desain/<?php echo $data_cek['foto_desain']; ?>" width="280px" />
				</div>
			</div>
		</div>
	</div>

</div>