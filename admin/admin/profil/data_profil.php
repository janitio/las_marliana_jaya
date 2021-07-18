<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Profil Bengkel Las</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nama Bengkel Las</th>
						<th>Alamat</th>
						<th>Nama Pemilik</th>
						<th>Foto Tanda Tangan</th>
						<th>Kelola</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_profil");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $data['nama_profil']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['nama_pemilik']; ?>
						</td>
						<td>
							<?php echo $data['ttd_pemilik']; ?>
						</td>
						<td>
							<a href="?page=edit-profil&kode=<?php echo $data['id_profil']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-wrench"></i>
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