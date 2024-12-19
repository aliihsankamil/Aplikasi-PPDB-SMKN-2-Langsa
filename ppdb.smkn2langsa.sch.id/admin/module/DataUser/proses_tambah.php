<?php  
	include "../../../inc/config.php";
	if(!empty($_POST['simpan'])){
		//proses simpan
		$pass = md5($_POST['pass']);
		$simpan = mysqli_query($koneksi, "INSERT into user values('','$_POST[nama]','$_POST[user]','$pass','$_POST[level]','Y')");

		header('location:../../dashboard.php?m=DataUser');
	}else{
		echo "gagal";
	}
?>