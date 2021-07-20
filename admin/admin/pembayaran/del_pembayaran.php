<?php

if(isset($_GET['id_pembayaran'])){
    $sql_cek = "select * from tb_pembayaran where id_pembayaran='".$_GET['id_pembayaran']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $foto= $data_cek['foto_pembayaran'];
    if (file_exists("foto/bayar/$foto")){
        unlink("foto/bayar/$foto");
    }

    $sql_hapus = "DELETE FROM tb_pembayaran WHERE id_pembayaran='".$_GET['id_pembayaran']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pembayaran'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pembayaran'
        ;}})</script>";
    }
