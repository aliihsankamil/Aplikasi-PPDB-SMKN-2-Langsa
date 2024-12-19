<div style="padding: 10px; margin-top: 10px auto; width: 600px; overflow:hidden; margin: auto; text-align:center; font-family: Calibri;">
<?php  
	include "../../../inc/config.php";
	session_start();
	$id  = $_SESSION['id'];
	$tgl = date('Y-m-d');
	if(!empty($_POST['simpan'])){
		//proses simpan
		// $simpan = mysqli_query($koneksi, "INSERT into pendaftar values('','$_POST[nisn]'");
		$cek = mysqli_query($koneksi, "SELECT * from pendaftar where nisn='$_POST[nisn]'");
		$d = mysqli_fetch_array($cek);
		$cek2 = mysqli_query($koneksi, "SELECT * from user where id='$d[id_user]'");
		$user = mysqli_fetch_array($cek2);

		if(mysqli_num_rows($cek) > 0){
			echo "<h1 style='font-family: Calibri; font-size: 35pt;'>Ooops !!!</h1> ";
			echo "<p style='font-size: 20pt;'>NISN Sudah terdaftar pada jurusan ";
			echo $d['kd_jurusan'];
			echo " oleh <b>";
			echo $user['nama_lengkap'];
			echo "</b> Pada tanggal ";
			echo $d['tgl_daftar'];
			// echo "<br><a href='../../dashboard.php?m=TambahPendaftar'>Kembali</a></p>";
			echo "<br><input style='border:none; background: red; color: white; padding: 10px; border-radius: 6px;' type='button' onClick='history.back();' value='Kembali'>";
		}else{
			$simpan = mysqli_query($koneksi, "INSERT INTO `pendaftar` (`id`, `nisn`, `no_formulir`, `kd_jurusan`, `nama`, `asal_sekolah`, `gender`, `alamat`, `tgl_daftar`, `id_user`, `bind`, `bing`, `mtk`, `ipa`) VALUES (NULL, '$_POST[nisn]', '$_POST[noFormulir]', '$_POST[kdJurusan]', '$_POST[nmPendaftar]', '$_POST[asalSekolah]', '$_POST[jenkel]', '$_POST[alamat]', '$tgl', '$id', '$_POST[bind]', '$_POST[bing]', '$_POST[mtk]', '$_POST[ipa]')");
			if(!$simpan){
				echo "gagal";
			}else{ ?>
			    <div style="margin-top: 20px; margin: auto; width: 300px; height: 150px; text-align:center; border-radius: 7px;">
			        <div style="width: 100%; height: 30px; background: green; color: white; line-height: 30px; border-radius: 7px 7px 0 0;">
			            Konfirmasi
			        </div>
			        <div style="width: 100%; height: 120px; background: #eee; color: black;">
			            <br><br>
			            Data Berhasil Disimpan Ke Database. <br><br>
			            <a href='../../index.php?m=DataPendaftar&tipe=tambah&pesan=berhasil'><button style="border:none; background: red; color: white; padding: 10px; border-radius: 6px;">OK</button></a>
			        </div>
			    </div>
				<!--header('location:../../index.php?m=DataPendaftar&tipe=tambah&pesan=berhasil');-->
			<?php
			}
		}

	}else{
		header('location:../../index.php?m=DataPendaftar&tipe=tambah&pesan=gagal');
	}
?>
</div>