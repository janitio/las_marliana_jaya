<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penawaran</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Pesanan</th>
							<th>Nama Pelanggan</th>
							<th>Biaya DP</th>
							<th>Sisa Pembayaran</th>
							<th>Harga Total</th>
							<th>Konfirmasi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT * from tb_penawaran");
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
									<?php echo $data['nama_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['biaya_dp']; ?>
								</td>
								<td>
									<?php echo $data['sisa_bayar']; ?>
								</td>
								<td>
									<?php echo $data['total_bayar']; ?>
								</td>
								<td>
									<?php echo $data['proses_tawar']; ?>
								</td>

								<td>
									<a href="./report/cetak_penawaran.php?kode_penawaran=<?php echo $data['kode_penawaran']; ?>" target=" _blank" title="Detail"
										class="btn btn-info btn-sm">
										<i class="fa fa-eye"></i>
									</a>
									<a href="?page=edit-penawaran&kode_penawaran=<?php echo $data['kode_penawaran']; ?>" title="Detail"
										class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-penawaran&kode_penawaran=<?php echo $data['kode_penawaran']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
										title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
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

