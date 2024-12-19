<?php  
	include "../../../inc/config.php";
	//prosses hapus
	mysqli_query($koneksi, "DELETE from kelas where id_kelas='$_GET[id]'");
	header('location:../../index.php?m=DaftarUlang&tipe=TambahKelas&pesan=hapus');
?>