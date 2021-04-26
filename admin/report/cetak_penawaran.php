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

			$sql_tampil = "SELECT tb_penawaran.kode_penawaran,tb_pesanan.kode_pesanan, tb_pesanan.nama_pengguna, tb_pesanan.alamat, tb_desain.nama_desain, tb_desain.foto_desain, tb_pengguna.no_hp, tb_penawaran.biaya_dp, tb_penawaran.total_bayar FROM tb_desain 
			JOIN tb_pesanan ON tb_desain.kode_desain=tb_pesanan.kode_desain 
			JOIN tb_pengguna ON tb_pesanan.id_pengguna=tb_pengguna.id_pengguna 
			JOIN tb_penawaran ON tb_pesanan.kode_pesanan=tb_penawaran.kode_pesanan";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
				?>
				<tr>         
					<td width="93">
						<span >No</span></td>         
						<td width="8">
							<span >:</span></td>         
							<td width="200">
								<span ><?php echo $data['kode_penawaran']; ?></span></td>       </tr>
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
							<span >Sumedang, 03 mei 2011</span></div>
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
								<div align="justify">
									<span >menyatakan bahwa saya menyetujui barang yang dipesan.</span> </div>
								</div><br>
								<div align="center">
									<span >Mengetahui</span></div>
								</td>   </tr>
								<tr>     <td><div align="center">
									<span >Pelanggan,</span></div>
									<div align="center">
										<img src="../foto/ttd/ttd vitra.jpg" width="100px"/>
									</div>
									<div align="center">
										<span ><?php echo $data['nama_pengguna']; ?></span></div>
									</td>     <td></td>     <td valign="top"><div align="center">
										<span >Pemilik Jasa, </span></div>
										<div align="center">
											<img src="../foto/ttd/ttd vitra.jpg" width="100px"/>
										</div>
										<div align="center">
											<span >Abang Datuak</span></div>
										</td>   </tr>
									</tbody>
								<?php }?>
							</table>
							<script>
								window.print();
							</script>
						</body>
						</html>
