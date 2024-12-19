<?php  
	include "../../../inc/config.php";
	//prosses hapus
	mysqli_query($koneksi, "DELETE from pendaftar where nisn='$_GET[nisn]'");
	header('location:../../index.php?m=DataPendaftar');
?>