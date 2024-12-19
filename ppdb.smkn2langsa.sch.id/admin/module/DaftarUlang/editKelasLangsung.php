<?php  
	session_start();
	include "../../../inc/config.php";
	$tgl = date('Y-m-d');
	if(!empty($_POST['edit2'])){
		//prosses hapus
		$kelas = $_POST['kelas'];
		$sql = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$kelas'");
		$d = mysqli_fetch_array($sql);
		$sql2 = mysqli_query($koneksi, "SELECT * from pendaftar where id_kelas='$kelas'");
		$d2 = mysqli_num_rows($sql2);
		$d3 = $d['jumlah_siswa'];
		// echo $d['jumlah_siswa'];
		// echo $d2;
		if($d2==$d3){
			// echo "Sudah penuh";
			header('location:../../dashboard.php?m=DaftarUlang&pesan=penuh');
		}elseif($kelas=" "){
			$edit = mysqli_query($koneksi, "UPDATE pendaftar set id_kelas='$_POST[kelas]', tgl_daftar_ulang='$tgl', daftar_ulang='YES'
										where id='$_POST[id]'");
			if(!$edit){
				echo "gagal";
			}else{
				header('location:../../dashboard.php?m=DaftarUlang&pesan=kelaslangsung');
			}
		}else{
			$edit = mysqli_query($koneksi, "UPDATE pendaftar set id_kelas='$_POST[kelas]', tgl_daftar_ulang='$tgl', daftar_ulang='YES'
										where id='$_POST[id]'");
			if(!$edit){
				echo "gagal";
			}else{
				header('location:../../dashboard.php?m=DaftarUlang&pesan=kelaslangsung');
			}
		}
	}else{
		echo "Gagal";
	}
?>