<?php  
	include "../../../inc/config.php";
	if(!empty($_POST['edit'])){
		//proses simpan
		
		$update = mysqli_query($koneksi, "UPDATE user SET nama_lengkap='$_POST[nama]',username='$_POST[user]',level='$_POST[level]',aktif='$_POST[aktif]' where id='$_POST[id]'");

		header('location:../../dashboard.php?m=DataUser');
	}else{
		header('location:../../dashboard.php?m=DataUser');
	}
?>