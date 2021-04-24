<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pesanan</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="5px">No</th>
							<th width="30px">Foto</th>
							<th width="10px">Kode Pesanan</th>
							<th width="5px">Kode Desain</th>
							<th width="5px">ID Pelanggan</th>
							<th width="20px">Nama Pelanggan</th>
							<th width="30px">Alamat</th>
							<th width="30px">Waktu</th>
							<th width="20px">Proses</th>
							<th width="90px">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT * from tb_pesanan");
						while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td align="center">
									<img src="foto/desain/<?php echo $data['foto_desain']; ?>" width="70px" />
								</td>
								<td>
									<?php echo $data['kode_pesanan']; ?>
								</td>
								<td>
									<?php echo $data['kode_desain']; ?>
								</td>
								<td>
									<?php echo $data['id_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['nama_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>
								</td>
								<td>
									<?php echo $data['timestamp']; ?>
								</td>
								<td>
									<?php echo $data['proses']; ?>
								</td>
								<td>
									<a href="?page=view-pesanan&kode_pesanan=<?php echo $data['kode_pesanan']; ?>" title="Beri Keterangan"
										class="btn btn-info btn-sm">
										<i class="fa fa-edit"></i>
									</a>
								</a>
								<a href="?page=kalkulasi-pesanan&kode_pesanan=<?php echo $data['kode_pesanan']; ?>" title="Buat Penawaran" class="btn btn-warning btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=edit-pesanan&kode_pesanan=<?php echo $data['kode_pesanan']; ?>" title="Ubah Data" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
							</td>
						</tr>

						<?php
					}
					?>
				</tbody>
			</tfoot>
		</table>
	</div>
</div>
	<!-- /.card-body -->