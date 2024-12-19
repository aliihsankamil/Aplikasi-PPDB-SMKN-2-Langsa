<?php  
	session_start();
	include "../../../inc/config.php";
	if(!empty($_POST['edit'])){
		//prosses hapus
		$edit = mysqli_query($koneksi, "UPDATE pendaftar set nisn='$_POST[nisn]',
															no_formulir='$_POST[noFormulir]',
															kd_jurusan='$_POST[kdJurusan]',
															nama='$_POST[nmPendaftar]',
															asal_sekolah='$_POST[asalSekolah]',
															gender='$_POST[jenkel]',
															alamat='$_POST[alamat]',
															id_user='$_SESSION[id]',
															bind='$_POST[bind]',
															bing='$_POST[bing]',
															mtk='$_POST[mtk]',
															ipa='$_POST[ipa]'
										where id='$_POST[id]'");
		header('location:../../dashboard.php?m=DataPendaftar&pesan=berhasil');
	}else{
		header('location:../../dashboard.php?m=DataPendaftar&pesan=gagal');
	}
?>