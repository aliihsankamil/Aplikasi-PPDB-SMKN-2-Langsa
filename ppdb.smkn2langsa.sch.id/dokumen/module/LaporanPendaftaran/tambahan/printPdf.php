<?php
  // Load file koneksi.php
  include "../../../../inc/config.php";
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
                <th rowspan="3">No</th>
                <th rowspan="3">Tgl. Daftar</th>
                <th rowspan="3">NISN</th>
                <th rowspan="3">No. Formulir</th>
                <th rowspan="3">Nama Pendaftar</th>
                <th rowspan="3">Kode Jurusan</th>
                <th rowspan="3">Asal Sekolah</th>
                <th rowspan="3">Jenis Kelamin</th>
                <th rowspan="3">Alamat</th>
                <th rowspan="3">Yang Bertanggung Jawab</th>
                <th colspan="8" style="text-align: center;">VIII 1</th>
                <th colspan="8" style="text-align: center;">VIII 2</th>
                <th colspan="8" style="text-align: center;">IX 1</th>
            </tr>
            <tr>
                <th colspan="2" style="text-align: center;">BIND</th>
                <th colspan="2" style="text-align: center;">MTK</th>
                <th colspan="2" style="text-align: center;">BING</th>
                <th colspan="2" style="text-align: center;">IPA</th>
                <th colspan="2" style="text-align: center;">BIND</th>
                <th colspan="2" style="text-align: center;">MTK</th>
                <th colspan="2" style="text-align: center;">BING</th>
                <th colspan="2" style="text-align: center;">IPA</th>
                <th colspan="2" style="text-align: center;">BIND</th>
                <th colspan="2" style="text-align: center;">MTK</th>
                <th colspan="2" style="text-align: center;">BING</th>
                <th colspan="2" style="text-align: center;">IPA</th>
            </tr>
            <tr>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
                <th>P</th>
                <th>K</th>
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
                        
                        <td><?php echo $d['BIN_VIII_1_P']; ?></td>
                        <td><?php echo $d['BIN_VIII_1_K']; ?></td>
                        <td><?php echo $d['MTK_VIII_1_P']; ?></td>
                        <td><?php echo $d['MTK_VIII_1_K']; ?></td>
                        <td><?php echo $d['BING_VIII_1_P']; ?></td>
                        <td><?php echo $d['BING_VIII_1_K']; ?></td>
                        <td><?php echo $d['IPA_VIII_1_P']; ?></td>
                        <td><?php echo $d['IPA_VIII_1_K']; ?></td>

                        <td><?php echo $d['BIN_VIII_2_P']; ?></td>
                        <td><?php echo $d['BIN_VIII_2_K']; ?></td>
                        <td><?php echo $d['MTK_VIII_2_P']; ?></td>
                        <td><?php echo $d['MTK_VIII_2_K']; ?></td>
                        <td><?php echo $d['BING_VIII_2_P']; ?></td>
                        <td><?php echo $d['BING_VIII_2_K']; ?></td>
                        <td><?php echo $d['IPA_VIII_2_P']; ?></td>
                        <td><?php echo $d['IPA_VIII_2_K']; ?></td>

                        <td><?php echo $d['BIN_IX_1_P']; ?></td>
                        <td><?php echo $d['BIN_IX_1_K']; ?></td>
                        <td><?php echo $d['MTK_IX_1_P']; ?></td>
                        <td><?php echo $d['MTK_IX_1_K']; ?></td>
                        <td><?php echo $d['BING_IX_1_P']; ?></td>
                        <td><?php echo $d['BING_IX_1_K']; ?></td>
                        <td><?php echo $d['IPA_IX_1_P']; ?></td>
                        <td><?php echo $d['IPA_IX_1_K']; ?></td>
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
    <script>
        window.print();
    </script>
</body>
</html>