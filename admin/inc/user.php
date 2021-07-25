<?php

function cek_data($nama,$pass){
    global $koneksi;
    $nama=escape($nama);
    $pass=escape($pass);
    $query="SELECT password FROM tb_pengguna WHERE username='$nama'";
    if($result=mysqli_query($koneksi,$query)){
        if(mysqli_num_rows($result)!=0)return true;
        else return false;
    }
    //     $result=mysqli_query($koneksi,$query);
        //  $hash=mysqli_fetch_assoc($result)['password'];
        // if( password_verify($pass,$hash)) return true;
        // else return false;
}
function cek_nama($username){
    global $koneksi;
    $nama=escape($nama);
    $query="SELECT * FROM tb_pengguna WHERE username='$username'";
    if($result=mysqli_query($koneksi,$query)){
        return mysqli_num_rows($result);
    }
}
function escape($data){
    global $koneksi;
    return mysqli_real_escape_string($koneksi,$data);
}
?>