<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Laporan </h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pesanan</th>
						<th>Kode Desain</th>
						<th>ID Pelanggan</th>
						<th>Nama Pelanggan</th>
						<th>Alamat</th>
						<th>Proses</th>
						<th>Waktu</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_track_pesanan");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
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
							<?php echo $data['proses']; ?>
						</td>
						<td>
							<?php echo $data['timestamp']; ?>
						</td>

						<td>
							<a href="?page=view-laporan&kode=<?php echo $data['kode_pesanan']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
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
