<?php  
    include "inc/config.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $pass = md5($_POST['pass']);
        $sqlcek = mysqli_query($koneksi, "SELECT * from user where username='$_POST[username]' AND password='$pass' AND aktif='Y'");
        $jml = mysqli_num_rows($sqlcek);
        $d   = mysqli_fetch_array($sqlcek);

        if($jml > 0){
            session_start();

            if($d['level'] == "ADMIN" || $d['level'] == "OPERATOR"){
                $_SESSION['login']		= TRUE;
                $_SESSION['username']   = $d['username'];
                $_SESSION['id']			= $d['id'];
                $_SESSION['nama']		= $d['nama_lengkap'];

                header('location:admin/dashboard.php');
            }else if($d['level'] == "KEPSEK"){
                $_SESSION['login']		= TRUE;
                $_SESSION['username']   = $d['username'];
                $_SESSION['id']			= $d['id'];
                $_SESSION['nama']		= $d['nama_lengkap'];

                header('location:kepsek/dashboard.php');
            }
            else if($d['level'] == "PETUGAS" || $d['level'] == "PANITIA"){
                $_SESSION['login']		= TRUE;
                $_SESSION['username']   = $d['username'];
                $_SESSION['id']			= $d['id'];
                $_SESSION['nama']		= $d['nama_lengkap'];

                header('location:petugas/index.php');
            }else if($d['level'] == "KURIKULUM"){
                $_SESSION['login']		= TRUE;
                $_SESSION['username']   = $d['username'];
                $_SESSION['id']			= $d['id'];
                $_SESSION['nama']		= $d['nama_lengkap'];

                header('location:kurikulum/index.php');
            }else if($d['level'] == "DOKUMEN"){
                $_SESSION['login']		= TRUE;
                $_SESSION['username']   = $d['username'];
                $_SESSION['id']			= $d['id'];
                $_SESSION['nama']		= $d['nama_lengkap'];

                header('location:dokumen/index.php');
            }else{
                header('location:index.php');
            }
        }else{
            header('location:index.php?pesan=gagal');
        }
    }
?>