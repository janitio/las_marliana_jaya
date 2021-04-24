<?php
include "../inc/koneksi.php";

$kode_penawaran = $_GET['kode_penawaran'];

$sql_cek = "SELECT * FROM tb_profil";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
{
	?>


	<!DOCTYPE html>
	<html lang="en">
	<meta charset="utf-8">
	<style>
		#judul{
			text-align:center;
		}

		#halaman{
			width: auto; 
			height: auto; 
			position: absolute; 
			border: 1px solid; 
			padding-top: 30px; 
			padding-left: 30px; 
			padding-right: 30px; 
			padding-bottom: 80px;
		}

	</style>
	<head>
		<title>SURAT PENAWARAN</title>
	</head>

	<body>
		<center>

			<h2>
				<?php echo $data_cek['nama_profil']; ?>
			</h2>
			<h3>
				<?php echo $data_cek['alamat']; ?>
				<hr / size="2px" color="black">

				<?php
			}

			$sql_tampil = "SELECT tb_pesanan.kode_pesanan, tb_pesanan.nama_pengguna, tb_pesanan.alamat, tb_desain.nama_desain, tb_desain.foto_desain, tb_pengguna.no_hp, tb_penawaran.biaya_dp, tb_penawaran.total_bayar FROM tb_desain 
			JOIN tb_pesanan ON tb_desain.kode_desain=tb_pesanan.kode_desain 
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna 
			JOIN tb_penawaran ON tb_pesanan.kode_pesanan=tb_penawaran.kode_pesanan";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
				?>
			</center>
			<div id=halaman>
				<h3 id=judul>SURAT PENAWARAN</h3>

				<p>Saya yang bertanda tangan di bawah ini :</p>

				<table>
					<tr>
						<td style="width: 30%;">Nama</td>
						<td style="width: 5%;">:</td>
						<td style="width: 65%;"><?php echo $data['nama_pengguna']; ?></td>
					</tr>
					<tr>
						<td style="width: 30%;">No. HP</td>
						<td style="width: 5%;">:</td>
						<td style="width: 65%;"><?php echo $data['no_hp']; ?></td>
					</tr>
					<tr>
						<td style="width: 30%; vertical-align: top;">Alamat</td>
						<td style="width: 5%; vertical-align: top;">:</td>
						<td style="width: 65%;"><?php echo $data['alamat']; ?></td>
					</tr>
					<tr>
						<td style="width: 30%;">Kode Pesanan</td>
						<td style="width: 5%;">:</td>
						<td style="width: 65%;"><?php echo $data['kode_pesanan']; ?></td>
					</tr>
					<tr>
						<td style="width: 30%;">Barang yang Akan Dipesan</td>
						<td style="width: 5%;">:</td>
						<td style="width: 65%;"><?php echo $data['nama_desain']; ?></td>
					</tr>
					<!-- <tr>
						<td rowspan="6">
							<img src="../foto/desain/<?php echo $data['foto_desain']; ?>" width="150px" />
						</td> 
					</tr> -->
					<tr>
						<td style="width: 30%;">Bayar Dimuka</td>
						<td style="width: 5%;">:</td>
						<td style="width: 65%;">Rp. <?php echo number_format($data['biaya_dp']); ?></td>
					</tr>
					<tr>
						<td style="width: 30%;">Harga Total</td>
						<td style="width: 5%;">:</td>
						<td style="width: 65%;">Rp. <?php echo number_format($data['total_bayar']); ?></td>
					</tr>
				</table>

				<p>menyatakan bahwa saya menyetujui barang yang dipesan.</p>


				<div style="width: 50%; text-align: left; float: right;">Tangerang, 20 Januari 2020</div><br>
				<div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div>
				<div style="width: 50%; text-align: left; float: right;"><img src="../foto/ttd/ttd vitra.jpg" width="100px" style="float: right;"/></div>
				<div style="width: 50%; text-align: left; float: right;">Pemilik Jasa</div>
<?php }?>
			</div>


			<script>
				window.print();
			</script>

		</body>

		</html>