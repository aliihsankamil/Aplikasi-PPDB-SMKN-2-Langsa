<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=LaporanPendaftaran.xls");
?>
<?php
  // Load file koneksi.php
  include "../../../inc/config.php";
  if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
    $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    if($filter == '1'){ // Jika filter nya 1 (per tanggal)
        $query = "SELECT * FROM pendaftar WHERE id_kelas='".$_GET['kelas']."'";
    }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
        $query = "SELECT * FROM pendaftar WHERE kd_jurusan='".$_GET['jurusan']."'";
    }
  }else{ // Jika user tidak memilih filter
    echo '<b>Semua Data Pendaftar</b><br /><br />';
    $query = "SELECT * FROM pendaftar ORDER BY tgl_daftar";
  }
  ?>
    <table style=" width: 100%;" border="0">
                        <thead>
                            <tr style="border:none;">
                                <th style="border:none; text-align: center; font-size: 15pt;" colspan="25">PEMERINTAH ACEH</th>
                            </tr>
                            <tr>
                                <th style="border:none; text-align: center; font-size: 15pt;" colspan="25">DINAS PENDIDIKAN</th>
                            </tr>
                            <tr>
                                <th style="border:none; text-align: center; font-size: 20pt;" colspan="25">SEKOLAH MENENGAH KEJURUAN (SMK) NEGERI 2 LANGSA</th>
                            </tr>
                            <tr>
                                <td style="border:none; text-align: center; font-size: 10pt; border-bottom: 2px solid black;" colspan="25"><i>Jl. Jend. A. Yani Paya Bujok Seulemak Telp. 0641-21116 Kota Langsa</i></td>
                            </tr>
                            <tr>
                                <th style="border:none; text-align: center; padding-top: 20px; font-size: 15pt;" colspan="25">DAFTAR HADIR SISWA</th>
                            </tr>
                            <tr>
                                <th style="border:none; text-align: center; font-size: 15pt;" colspan="25">TAHUN PELAJARAN 2020 / 2021</th>
                            </tr>
                            <tr>
                                <?php 
                                    $sql = mysqli_query($koneksi, $query);
                                    $klsd = mysqli_fetch_array($sql);
                                    $klsds = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$klsd[id_kelas]'");
                                    $klsf = mysqli_fetch_array($klsds);
                                ?>
                                <th style="border-left: none; border-right: none; text-align: left;" colspan="25">KELAS : <?php echo $klsf['nama_kelas']; ?></th>
                            </tr>
                        </thead>
                    </table>
                    <table style=" width: 100%; font-size:9pt;" border="1">
                        <thead>
                            <tr>
                                <th rowspan="4" style="text-align: center; border-top: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;" width="30">NO</th>
                                <th rowspan="4" style="text-align: center; border-top: 2px solid black; border-bottom: 2px solid black;">NAMA SISWA</th>
                                <th rowspan="4" style="text-align: center; border-top: 2px solid black; border-bottom: 2px solid black;" width="80">NISN</th>
                                <th rowspan="4" style="text-align: center; border-top: 2px solid black; border-bottom: 2px solid black;" width="80">NO. FORMULIR</th>
                                <th width="25" style="text-align: center; border-bottom: none; border-top: 2px solid black;">A</th>
                                <th colspan="10" style="border-top: 2px solid black;text-align: left;">HARI : </th>
                                <th colspan="10" style="border-right: 2px solid black; border-top: 2px solid black;text-align: left;">HARI : </th>
                            </tr>
                            <tr>
                                <th style="text-align: center; border-bottom: none; border-top: none;">P</th>
                                <th colspan="10" style="text-align: left;">TGL :</th>
                                <th colspan="10" style="border-right: 2px solid black;text-align: left;">TGL :</th>
                            </tr>
                            <tr>
                                <th style="text-align: center; border-bottom: none; border-top: none;">E</th>
                                <th colspan="10" style="text-align: center;">JAM KE</th>
                                <th colspan="10" style="text-align: center; border-right: 2px solid black;">JAM KE</th>
                            </tr>
                            <tr>
                                <th style="text-align: center; border-bottom: none; border-top: none; border-bottom: 2px solid black;">L</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">1</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">2</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">3</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">4</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">5</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">6</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">7</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">8</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">9</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">10</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">1</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">2</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">3</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">4</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">5</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">6</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">7</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">8</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-bottom: 2px solid black;">9</th>
                                <th width="25px"  style="text-align: center; background: #d8818c; border-right: 2px solid black; border-bottom: 2px solid black;">10</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                while($d = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                    $kl = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$d[id_kelas]'");
                                    $kls = mysqli_fetch_array($kl);
                                    $tgl = date('d-m-Y', strtotime($d['tgl_daftar'])); // Ubah format tanggal jadi dd-mm-yyyy
                                ?>
                                    <tr>
                                        <td style="border-left: 2px solid black; text-align: center;"><?php echo $no; ?></td>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td style="text-align:center; mso-number-format:\@;"><?php echo $d['nisn']; ?></td>
                                        <td style="text-align:center; mso-number-format:\@;"><?php echo $d['no_formulir']; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="border-right: 2px solid black;"></td>
                                    </tr>
                                <?php
                                $no++;
                                }
                            }else{ // Jika data tidak ada
                                echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
                            }
                            ?>
                                    <tr>
                                        <td style="border-top: 2px solid; border-left: 2px solid black; "></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;">KODE GURU</td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid;"></td>
                                        <td style="border-top: 2px solid; border-right: 2px solid black;"></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom: 2px solid; border-left: 2px solid black"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;">PARAF</td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid;"></td>
                                        <td style="border-bottom: 2px solid; border-right: 2px solid black;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="25" style="padding-left: 30px; border-left: 2px solid black; border-right: 2px solid black;">Catatan :</td>
                                    </tr>
                                    <tr>
                                        <td colspan="25" style="color: white; border-bottom: 2px solid black; border-left: 2px solid black; border-right: 2px solid black;">|</td>
                                    </tr>
                                </tbody>
                        </table>
                        <table border="0" style="font-size: 10pt; margin-top: 20px;">
                                    <tr>
                                <td colspan="25" style="color: white;">|</td>
                            </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="10" style="">WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="10" style="color: white; border: none;">WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td  colspan="10" style="color: white; border: none;">WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td  colspan="10" style="border: none;">NAMA WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td  colspan="10" style="border: none;">NIP. -</td>
                                    </tr>
                    </table>
</body>
</html>