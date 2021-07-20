<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Desain</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<div>
					<a href="?page=add-desain" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
					</div>
					<br>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5px" class="text-center">No</th>
								<th width="10px" class="text-center">Foto</th>
								<th width="5px" class="text-center">Kode Desain</th>
								<th width="10px" class="text-center">Nama Desain</th>
								<th width="90px" class="text-center">Deskripsi</th>
								<th width="10px" class="text-center">Harga Normal</th>
								<th width="60px" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							$sql = $koneksi->query("SELECT * from tb_desain");
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
										<?php echo $data['kode_desain']; ?>
									</td>
									<td>
										<?php echo $data['nama_desain']; ?>
									</td>
									<td>
										<?php echo $data['deskripsi']; ?>
									</td>
									<td>
										Rp. <?= number_format($data['harga_normal']); ?>
									</td>

									<td>
										<a href="?page=view-desain&kode_desain=<?php echo $data['kode_desain']; ?>" title="Detail"
											class="btn btn-info btn-sm">
											<i class="fa fa-eye">Lihat Detail</i>
										</a>
									</a>
									<a href="?page=edit-desain&kode_desain=<?php echo $data['kode_desain']; ?>" title="Ubah" class="btn btn-warning btn-sm">
										<i class="fa fa-edit">Ubah Data</i>
									</a>
									<a href="?page=del-desain&kode_desain=<?php echo $data['kode_desain']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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