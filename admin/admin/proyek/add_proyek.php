<?php
if(isset($_GET['id_verifyproyek'])){
    $sql_cek = "SELECT * fROM tb_verify_proyek WHERE id_verifyproyek='".$_GET['id_verifyproyek']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

$foto_hasil=$data_cek['foto_verifyhasil']

$sumber = @$_FILES[$foto_hasil]['tmp_name'];
$target = 'foto/proyek/';
$nama_file = @$_FILES[$foto_hasil]['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if(!empty($sumber)){
	$sql_simpan = "INSERT INTO tb_hasilproyek (id_pengguna, foto_hasil, ulasan, tgl_hasil) VALUES (
	'".$data_cek['id_pengguna']."',
	'".$nama_file."',
	'".$data_cek['ulasan_verify']."',
	CURRENT_TIMESTAMP)";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=data-proyek';
		}
	})</script>";
}
?>