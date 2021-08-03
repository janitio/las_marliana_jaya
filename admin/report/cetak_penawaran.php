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
		<table align="center" border="0" cellpadding="1" style="width: 700px;"><tbody>
			<tr>     <td colspan="3"><div align="center">
				<center>

					<h2>
						<?php echo $data_cek['nama_profil']; ?>
					</h2>
					<h3>
						<?php echo $data_cek['alamat']; ?>
						<hr / size="2px" color="black">
					</center>
				</div>
			</td>   </tr>
			<tr>     <td colspan="2"><table border="0" cellpadding="1" style="width: 400px;"><tbody>
				<?php
			}

			$sql_tampil = "SELECT tb_penawaran.kode_penawaran,tb_pesanan.kode_pesanan, tb_pengguna.nama_pengguna, tb_pengguna.alamat_pengguna, tb_desain.nama_desain, tb_desain.foto_desain, tb_pengguna.no_hp, tb_penawaran.biaya_dp,tb_penawaran.sisa_bayar, tb_penawaran.total_bayar, tb_penawaran.ttd_pelanggan, tb_penawaran.tgl_tawar FROM tb_penawaran 
			JOIN tb_pesanan ON tb_penawaran.kode_pesanan=tb_pesanan.kode_pesanan 
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna
			JOIN tb_desain ON tb_pesanan.kode_desain=tb_desain.kode_desain
			WHERE tb_penawaran.kode_penawaran=$kode_penawaran
			";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH);

			$sql2_cek = "SELECT ttd_pemilik,nama_pemilik FROM tb_profil";
			$query2_cek = mysqli_query($koneksi, $sql2_cek);
			$profil_cek = mysqli_fetch_array($query2_cek,MYSQLI_BOTH);
			$nama_pemilik=$profil_cek['nama_pemilik'];
			$ttd_pemilik=$profil_cek['ttd_pemilik'];
			?>
			<tr>         
				<td width="93">
					<span >No</span></td>         
					<td width="8">
						<span >:</span></td>         
						<td width="200">
							<span ><?php echo $data_cek['kode_penawaran']; ?></span></td>       </tr>
							<tr>         
								<td><span >Perihal</span></td>         
								<td><span >:</span></td>         
								<td><span >Surat Penawaran</span></td>       
							</tr>
						</tbody>
					</table>
				</td>     
				<td valign="top">
					<div align="right">
						<span ><?php echo $data_cek['tgl_tawar']; ?></span></div>
					</td>   
				</tr>
				<tr>     
					<td width="302"></td>    
					<td width="343"></td>     
					<td width="339"></td>   </tr>
					<tr>     
						<td></td>     <td></td>   </tr>
						<tr>     <td></td>     <td></td>     <td></td>   </tr>
						<tr>     <td colspan="3" height="270" valign="top"><div align="justify">
							<span >Saya yang bertanda tangan di bawah ini:</span>
							<table>
								<tr>
									<td style="width: 30%;">Nama</td>
									<td style="width: 5%;">:</td>
									<td style="width: 65%;"><?php echo $data_cek['nama_pengguna']; ?></td>
								</tr>
								<tr>
									<td style="width: 30%;">No. HP</td>
									<td style="width: 5%;">:</td>
									<td style="width: 65%;"><?php echo $data_cek['no_hp']; ?></td>
								</tr>
								<tr>
									<td style="width: 30%; vertical-align: top;">Alamat</td>
									<td style="width: 5%; vertical-align: top;">:</td>
									<td style="width: 65%;"><?php echo $data_cek['alamat_pengguna']; ?></td>
								</tr>
								<tr>
									<td style="width: 30%;">Kode Pesanan</td>
									<td style="width: 5%;">:</td>
									<td style="width: 65%;"><?php echo $data_cek['kode_pesanan']; ?></td>
								</tr>
								<tr>
									<td style="width: 30%;">Pesanan</td>
									<td style="width: 5%;">:</td>
									<td style="width: 65%;"><?php echo $data_cek['nama_desain']; ?></td>
								</tr>
								<tr>
									<td style="width: 30%;">Biaya Muka</td>
									<td style="width: 5%;">:</td>
									<td style="width: 65%;">Rp. <?php echo number_format($data_cek['biaya_dp']); ?></td>
								</tr>
								<tr>
									<td style="width: 30%;">Sisa Pembayaran</td>
									<td style="width: 5%;">:</td>
									<td style="width: 65%;">Rp. <?php echo number_format($data_cek['sisa_bayar']); ?></td>
								</tr>
								<tr>
									<td style="width: 30%;">Total Pembayaran</td>
									<td style="width: 5%;">:</td>
									<td style="width: 65%;">Rp. <?php echo number_format($data_cek['total_bayar']); ?></td>
								</tr>
							</table>
							<div align="justify">
								<span >menyatakan bahwa saya menyetujui barang yang dipesan.</span> </div>
							</div><br>
							<div align="center">
								<span >Mengetahui</span></div>
							</td>   </tr>
							<tr>     <td><div align="center">
								<span >Pelanggan,</span></div>
								<div align="center"><br><br><br><br>
									<?php
									$sql_cek = "SELECT proses_tawar FROM tb_penawaran WHERE kode_penawaran=$kode_penawaran";
									$query_cek = mysqli_query($koneksi, $sql_cek);
									$data2_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
									if ($data2_cek['proses_tawar']=='dibatalkan') {?>
										<h4><font color="red">Anda telah membatalkan penawaran ini</font></h4><br>
											<?php
										}else{
											?>
											<img src="../foto/ttd_pelanggan/<?=$data_cek['ttd_pelanggan']; ?>" width="150px"/>
											<?php
										}
										?>
									</div>
									<div align="center">
										<span ><?php echo $data_cek['nama_pengguna']; ?></span></div>
									</td>     <td></td>     <td valign="top"><div align="center">
										<span >Pemilik Jasa, </span></div>
										<div align="center">
											<img src="../foto/ttd_pemilik/<?=$ttd_pemilik; ?>" width="150px"/>
										</div>
										<div align="center">
											<span ><?=$nama_pemilik; ?></span></div>
										</td>   </tr>
									</tbody>
								</table>
								<script>
									window.print();
								</script>
							</body>
							</html>
