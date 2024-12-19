<?php  
	include "../../../inc/config.php";
	if(!empty($_POST['edit'])){
		//proses simpan
		$pass = md5($_POST['pass']);
		$update = mysqli_query($koneksi, "UPDATE user SET password='$pass' where id='$_POST[id]'");

		header('location:../../dashboard.php?m=DataUser');
	}else{
		header('location:../../dashboard.php?m=DataUser');
	}
?>