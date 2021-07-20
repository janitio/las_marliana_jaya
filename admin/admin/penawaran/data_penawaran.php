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
							<th width="5px" class="text-center">No</th>
							<th width="10px" class="text-center">Kode Pesanan</th>
							<th width="20px" class="text-center">Nama Pelanggan</th>
							<th width="10px" class="text-center">Biaya DP</th>
							<th width="10px" class="text-center">Sisa Pembayaran</th>
							<th width="10px" class="text-center">Harga Total</th>
							<th width="10px" class="text-center">Konfirmasi</th>
							<th width="70px" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT tb_penawaran.kode_penawaran, tb_penawaran.kode_pesanan, tb_penawaran.biaya_dp, tb_penawaran.sisa_bayar, tb_penawaran.total_bayar, tb_penawaran.proses_tawar, tb_pengguna.nama_pengguna from tb_penawaran
							JOIN tb_pesanan ON tb_penawaran.kode_pesanan=tb_pesanan.kode_pesanan
							JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna");
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
									<a href="?page=view-penawaran&kode_penawaran=<?=$data['kode_penawaran']; ?>" title="Detail"
										class="btn btn-info btn-sm">
										<i class="fa fa-eye">Lihat Detail</i>
									</a>
									
									<a href="?page=del-penawaran&kode_penawaran=<?=$data['kode_penawaran']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
										title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash">Hapus Data</i>
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

