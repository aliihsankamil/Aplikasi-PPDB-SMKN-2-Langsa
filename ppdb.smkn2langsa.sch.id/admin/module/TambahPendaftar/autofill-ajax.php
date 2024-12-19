<?php
    include '../../../inc/config.php';
    $nisn = $_GET['nisn'];
    $sql  = mysqli_query($koneksi, "SELECT * from pendaftar where nisn='$nisn'");
    $siswa = mysqli_fetch_array($sql);
    $data = array(
        'nama' => $siswa['nama'],
        'kd_jurusan' => $siswa['kd_jurusan']
    );
    echo json_encode($data);
?>