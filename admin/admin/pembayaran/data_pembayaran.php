<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pembayaran</h3>
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
							<th width="20px">Kode Pesanan</th>
							<th width="20px">Nama Pelanggan</th>
							<th width="50px">Nama Desain</th>
							<th width="50px">Jenis Pembayaran</th>
							<th width="30px">Waktu</th>
							<th width="90px">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT tb_pembayaran.id_pembayaran, tb_pembayaran.foto_pembayaran, tb_pembayaran.jenis_bayar, tb_pembayaran.tgl_bayar, tb_desain.nama_desain, tb_penawaran.kode_pesanan,tb_penawaran.total_bayar, tb_pengguna.nama_pengguna FROM tb_pembayaran
							JOIN tb_pesanan ON tb_pembayaran.id_pengguna=tb_pesanan.id_pengguna
							JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain
							JOIN tb_penawaran ON tb_pesanan.kode_pesanan=tb_penawaran.kode_pesanan
							JOIN tb_pengguna ON tb_pembayaran.id_pengguna=tb_pengguna.id_pengguna");
						while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td align="center">
									<img src="foto/bayar/<?php echo $data['foto_pembayaran']; ?>" width="70px" />
								</td>
								<td>
									<?php echo $data['kode_pesanan']; ?>
								</td>
								<td>
									<?php echo $data['nama_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['nama_desain']; ?>
								</td>
								<td>
									<?php echo $data['jenis_bayar']; ?>
								</td>
								<td>
									<?php echo date('F j, Y, g:i a',strtotime($data['tgl_bayar'])); ?>
								</td>
								<td>
									<a href="?page=edit-pembayaran&id_pembayaran=<?php echo $data['id_pembayaran']; ?>" title="Ubah Data" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-pembayaran&id_pembayaran=<?php echo $data['id_pembayaran']; ?>" title="Beri Pesan"
										class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
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