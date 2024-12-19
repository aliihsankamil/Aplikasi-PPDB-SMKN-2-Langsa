<?php  
	include "../../../inc/config.php";
	//prosses hapus
	mysqli_query($koneksi, "DELETE from pendaftar where nisn='$_GET[nisn]'");
	header('location:../../dashboard.php?m=DataPendaftar');
?>