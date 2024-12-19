<?php  
	session_start();
	include "../../../inc/config.php";
	if(!empty($_POST['edit'])){
		//prosses hapus
		$edit = mysqli_query($koneksi, "UPDATE kelas set kd_jurusan='$_POST[jurusan]', 
                                                         nama_kelas='$_POST[nm_kelas]',
                                                         jumlah_siswa='$_POST[jml]'
										where id_kelas='$_POST[id]'");
		if(!$edit){
			echo "gagal";
		}else{
			header('location:../../dashboard.php?m=DaftarUlang&tipe=TambahKelas&pesan=kelaslangsung');
		}
	}else{
		echo "Gagal";
	}
?>