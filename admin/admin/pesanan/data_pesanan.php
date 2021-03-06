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
							<th width="20px">Foto</th>
							<th width="5px">Kode Pesanan</th>
							<th width="20px">Nama Pelanggan</th>
							<th width="60px">Alamat</th>
							<th width="30px">Waktu</th>
							<th width="10px">Proses</th>
							<th width="90px">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT tb_pesanan.kode_pesanan, tb_pesanan.proses_pesanan, tb_pesanan.tgl_pesanan, tb_desain.foto_desain, tb_pengguna.nama_pengguna, tb_pengguna.alamat_pengguna FROM tb_pesanan
							JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain
							JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna");
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
									<?php echo $data['nama_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['alamat_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['tgl_pesanan']; ?>
								</td>
								<td>
									<?php echo $data['proses_pesanan']; ?>
								</td>
								<td>
									<a href="?page=edit-pesanan&kode_pesanan=<?php echo $data['kode_pesanan']; ?>" title="Ubah Data" class="btn btn-warning btn-sm">
									<i class="fa fa-edit">Ubah Data</i>
								</a>

								<a href="?page=kalkulasi-pesanan&kode_pesanan=<?php echo $data['kode_pesanan']; ?>" title="Buat Penawaran" class="btn btn-success btn-sm">
									<i class="fa fa-file">Buat Penawaran</i>
								</a>
								
								<a href="?page=ket-pesanan&kode_pesanan=<?php echo $data['kode_pesanan']; ?>" title="Beri Pesan"
										class="btn btn-info btn-sm">
										<i class="fa fa-comment-dots">Beri Pesan</i>
									</a>
									<a href="?page=del-pesanan&kode_pesanan=<?php echo $data['kode_pesanan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="hapus"
										class="btn btn-danger btn-sm">
										<i class="fa fa-trash">Hapus Data</i>
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