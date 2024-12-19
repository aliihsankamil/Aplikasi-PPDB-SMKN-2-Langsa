<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment;filename=LaporanPendaftaran.xls");
        
    // Load file koneksi.php
    include "../../../inc/config.php";
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl1 = $_GET['tanggal1'];
            $tgl2 = $_GET['tanggal2'];
            echo '<b>Yang Mendaftar Tanggal '.$tgl1.' sampai '.$tgl2.'</b><br /><br />';
            $query = "SELECT * FROM pendaftar WHERE tgl_daftar between '$_GET[tanggal1]' AND '$_GET[tanggal2]'";
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $query = "SELECT * FROM pendaftar WHERE kd_jurusan='".$_GET['jurusan']."'";
        }
    }else{ // Jika user tidak memilih filter
        echo '<b>Semua Data Pendaftar</b><br /><br />';
        $query = "SELECT * FROM pendaftar ORDER BY tgl_daftar";
    }
?>
    <center><h1>Laporan Pendafataran Siswa Baru</h1></center>
    <table style="font-size:9pt;" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl. Daftar</th>
                <th>NISN</th>
                <th>No. Formulir</th>
                <th>Nama Pendaftar</th>
                <th>Kode Jurusan</th>
                <th>Asal Sekolah</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Yang Bertanggung Jawab</th>
                <th>BIND</th>
                <th>BING</th>
                <th>MTK</th>
                <th>IPA</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
            $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while($d = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    $adm = mysqli_query($koneksi, "SELECT * from user where id='$d[id_user]'");
                    $dadm = mysqli_fetch_array($adm);
                    $tgl = date('d-m-Y', strtotime($d['tgl_daftar'])); // Ubah format tanggal jadi dd-mm-yyyy
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $d['tgl_daftar']; ?></td>
                        <td style="mso-number-format:\@;"><?php echo $d['nisn']; ?></td>
                        <td style="mso-number-format:\@;"><?php echo $d['no_formulir']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['kd_jurusan']; ?></td>
                        <td><?php echo $d['asal_sekolah']; ?></td>
                        <td><?php echo $d['gender']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $dadm['nama_lengkap']; ?></td>
                        <td><?php echo $d['bind']; ?></td>
                        <td><?php echo $d['bing']; ?></td>
                        <td><?php echo $d['mtk']; ?></td>
                        <td><?php echo $d['ipa']; ?></td>
                    </tr>
                <?php
                $no++;
                }
            }else{ // Jika data tidak ada
                echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>