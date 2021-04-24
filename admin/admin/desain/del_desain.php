<?php

if(isset($_GET['kode_desain'])){
    $sql_cek = "select * from tb_desain where kode_desain='".$_GET['kode_desain']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $foto= $data_cek['foto_desain'];
    if (file_exists("foto/desain/$foto")){
        unlink("foto/desain/$foto");
    }

    $sql_hapus = "DELETE FROM tb_desain WHERE kode_desain='".$_GET['kode_desain']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-desain'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-desain'
        ;}})</script>";
    }
