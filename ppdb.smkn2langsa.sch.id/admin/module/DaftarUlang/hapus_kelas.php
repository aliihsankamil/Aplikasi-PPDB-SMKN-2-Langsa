<?php  
	include "../../../inc/config.php";
	//prosses hapus
	mysqli_query($koneksi, "DELETE from kelas where id_kelas='$_GET[id]'");
	header('location:../../dashboard.php?m=DaftarUlang&tipe=TambahKelas&pesan=hapus');
?>