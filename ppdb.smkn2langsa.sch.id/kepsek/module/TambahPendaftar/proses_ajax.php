<?php
    include '../../../inc/config.php';
    $nisn = $_GET['nim'];
    $query = mysqli_query($koneksi, "select * from pendaftar where nisn='$nisn'");
    if($query){
        echo "NISN Anda telah terdaftar";
        header("location:TambahPendaftar.php");
    }
    $pendaftar = mysqli_fetch_array($query);
    $data = array(
        'nama'          =>  $pendaftar['nama'],
        'jurusan'          =>  $pendaftar['jurusan'],
    );
    echo json_encode($data);
?>