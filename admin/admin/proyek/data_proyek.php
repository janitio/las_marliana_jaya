<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Hasil Proyek Pelanggan</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama Pelanggan</th>
							<th>Ulasan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT * from tb_hasilproyek");
						while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td align="center">
									<img src="foto/<?php echo $data['foto_hasil']; ?>" width="70px" />
								</td>
								<td>
									<?php echo $data['kode_hasilproyek']; ?>
								</td>
								<td>
									<?php echo $data['nama_pelanggan']; ?>
								</td>
								<td>
									<?php echo $data['ulasan']; ?>
								</td>

								<td>
									<a href="?page=view-pegawai&kode=<?php echo $data['nip']; ?>" title="Detail"
										class="btn btn-info btn-sm">
										<i class="fa fa-eye"></i>
									</a>
								</a>
								<a href="?page=edit-pegawai&kode=<?php echo $data['nip']; ?>" title="Ubah" class="btn btn-success btn-sm">
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

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Izin Tampil Hasil Proyek</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama Pelanggan</th>
							<th>Ulasan</th>
							<th>Waktu</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT tb_verify_proyek.id_verifyproyek,tb_verify_proyek.foto_verifyhasil, tb_verify_proyek.ulasan_verify, tb_verify_proyek.tgl_verifyhasil, tb_pengguna.nama_pengguna FROM tb_verify_proyek 
							JOIN tb_pengguna ON tb_verify_proyek.id_pengguna=tb_pengguna.id_pengguna");
						while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td align="center">
									<img src="foto/proyek_verify/<?php echo $data['foto_verifyhasil']; ?>" width="70px" />
								</td>
								<td>
									<?php echo $data['nama_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['ulasan_verify']; ?>
								</td>
								<td>
									<?php echo date('F j, Y, g:i a',strtotime($data['tgl_verifyhasil'])); ?>
								</td>

								<td>
									<a href="?page=add-proyek&id_verifyproyek=<?php echo $data['id_verifyproyek']; ?>" title="Detail"
										class="btn btn-success btn-sm">Terima
									</a>
								</a>
								<a href="?page=del-proyek&id_verifyproyek=<?php echo $data['id_verifyproyek']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
									title="Hapus" class="btn btn-danger btn-sm">
									Batal
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