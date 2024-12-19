<?php  
	include "../../../inc/config.php";
	if(!empty($_POST['simpan'])){
		//proses simpan
        $simpan = mysqli_query($koneksi, "INSERT into kelas 
        values(NULL,'$_POST[nm_kelas]', '$_POST[jml]', '$_POST[jurusan]')");
        if(!$simpan){
            echo "Gagal menyimpan kelas";
        }else{
            header('location:../../index.php?m=DaftarUlang&tipe=TambahKelas&pesan=addkelasoke');
        }

	}else{
		echo "gagal";
	}
?>