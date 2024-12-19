<?php  
	include "../../../inc/config.php";
	//proses hapus
	mysqli_query($koneksi, "DELETE from user where id='$_GET[id]'");
	header('location:../../dashboard.php?m=DataUser');
?>