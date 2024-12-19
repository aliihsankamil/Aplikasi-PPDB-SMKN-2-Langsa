<?php  
	session_start();
	include "../../../inc/config.php";
	if(!empty($_POST['edit'])){
		//prosses hapus
		$tgl = date('Y-m-d');
		$nama=addslashes($_POST['nmPendaftar']);
		$alamat=addslashes($_POST['alamat']);
		$edit = mysqli_query($koneksi, "UPDATE pendaftar set nisn='$_POST[nisn]',
															no_formulir='$_POST[noFormulir]',
															kd_jurusan='$_POST[kdJurusan]',
															nama='$nama',
															asal_sekolah='$_POST[asalSekolah]',
															gender='$_POST[jenkel]',
															alamat='$alamat',
															id_user='$_SESSION[id]',
															BIN_VIII_1_P='$_POST[BIN_VIII_1_P]', 
                                                            BIN_VIII_1_K='$_POST[BIN_VIII_1_K]', 
                                                            BIN_VIII_2_P='$_POST[BIN_VIII_2_P]', 
                                                            BIN_VIII_2_K='$_POST[BIN_VIII_2_K]', 
                                                            BIN_IX_1_P='$_POST[BIN_IX_1_P]', 
                                                            BIN_IX_1_K='$_POST[BIN_IX_1_K]', 
                                                            MTK_VIII_1_P='$_POST[MTK_VIII_1_P]', 
                                                            MTK_VIII_1_K='$_POST[MTK_VIII_1_K]', 
                                                            MTK_VIII_2_P='$_POST[MTK_VIII_2_P]', 
                                                            MTK_VIII_2_K='$_POST[MTK_VIII_2_K]', 
                                                            MTK_IX_1_P='$_POST[MTK_IX_1_P]', 
                                                            MTK_IX_1_K='$_POST[MTK_IX_1_K]', 
                                                            BING_VIII_1_P='$_POST[BING_VIII_1_P]', 
                                                            BING_VIII_1_K='$_POST[BING_VIII_1_K]', 
                                                            BING_VIII_2_P='$_POST[BING_VIII_2_P]', 
                                                            BING_VIII_2_K='$_POST[BING_VIII_2_K]', 
                                                            BING_IX_1_P='$_POST[BING_IX_1_P]', 
                                                            BING_IX_1_K='$_POST[BING_IX_1_K]', 
                                                            IPA_VIII_1_P='$_POST[IPA_VIII_1_P]', 
                                                            IPA_VIII_1_K='$_POST[IPA_VIII_1_K]', 
                                                            IPA_VIII_2_P='$_POST[IPA_VIII_2_P]', 
                                                            IPA_VIII_2_K='$_POST[IPA_VIII_2_K]', 
                                                            IPA_IX_1_P='$_POST[IPA_IX_1_P]', 
                                                            IPA_IX_1_K='$_POST[IPA_IX_1_K]',
                                                            last_update='$tgl'
										where id='$_POST[id]'");
		if(!$edit){
			echo "gagal";
		}else{
			header('location:../../index.php?m=DataPendaftar&pesan=berhasil');
		}
	}else{
		echo "Gagal";
	}
?>