<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../../plugins/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body>
            <div class="card-body">
                <div class="container-fluid">
                    <p>
                    <a href="../../dashboard.php" class="btn btn-danger btn-sm" >X Batal</a>
                    </p>
                    <div class="info-box mb-12 bg-success">
                        <span class="info-box-icon"><i class="far fa-edit"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Laporan Pendaftaran</span>
                            <span class="info-box-text">Pilih berdasarkan format</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <form method="get" action="">
                    <label>Filter Berdasarkan</label><br>
                    <select name="filter" id="filter">
                        <option value="">Pilih</option>
                        <option value="1">Per Kelas</option>
                        <option value="2">Per Jurusan</option>
                    </select>
                    <br /><br />
                    <div id="form-kelas">
                        <label>Kelas</label><br>
                        <select name="kelas">
                            <option value="">Pilih</option>
                            <?php
                                include "../../../inc/config.php";
                                $sql = mysqli_query($koneksi, "SELECT * from kelas order by nama_kelas ASC");
                                while($j = mysqli_fetch_array($sql)){
                                    echo "
                                        <option value='$j[id_kelas]'>$j[nama_kelas]</option>
                                    ";
                                }
                            ?>
                        </select>
                        <br /><br />
                    </div>
                    <div id="form-jurusan">
                        <label>Jurusan</label><br>
                        <p>Tidak tersedia</p>
                    </div>

                    <button type="submit">Tampilkan</button>
                    <a href="CetakAbsen.php">Reset Filter</a>
                </form>
                <hr/>

                <?php
                    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                            echo '
                                Eksport to :
                                <a href="cetak.php?filter=1&kelas='.$_GET['kelas'].'" target="_blank" type="button" class="btn btn-success">
                                    <span class="fas fa-file-export"></span> Excel
                                </a>
                                <br /><br />
                            ';
                            $query = "SELECT * FROM pendaftar WHERE id_kelas='".$_GET['kelas']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                            $sql = mysqli_query($koneksi, $query);
                                    $klsd = mysqli_fetch_array($sql);
                                    $klsds = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$klsd[id_kelas]'");
                                    $klsf = mysqli_fetch_array($klsds);    
                        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                            echo '
                                Eksport to :
                                <a href="cetak.php?filter=2&jurusan='.$_GET['jurusan'].'" target="_blank" type="button" class="btn btn-success">
                                    <span class="fas fa-file-export"></span> Excel
                                </a>
                                <br /><br />
                            ';
                            $query = "SELECT * FROM pendaftar WHERE kd_jurusan='".$_GET['jurusan']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                            $sql = mysqli_query($koneksi, $query);
                                    $klsd = mysqli_fetch_array($sql);
                                    $klsds = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$klsd[id_kelas]'");
                                    $klsf = mysqli_fetch_array($klsds);
                        }
                    }else{ // Jika user tidak mengklik tombol tampilkan
                        echo '<b>Semua Data Pendaftar</b><br /><br />';
                        $query = "SELECT * FROM pendaftar ORDER BY id_kelas"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
                        $sql = mysqli_query($koneksi, $query);
                                    $klsd = mysqli_fetch_array($sql);
                                    $klsds = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$klsd[id_kelas]'");
                                    $klsf = 0;
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
                                <th style="border-left: none; border-right: none;" colspan="25">KELAS : <?php echo $klsf['nama_kelas']; ?></th>
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
                                <th colspan="10" style="border-top: 2px solid black;">HARI : </th>
                                <th colspan="10" style="border-right: 2px solid black; border-top: 2px solid black;">HARI : </th>
                            </tr>
                            <tr>
                                <th style="text-align: center; border-bottom: none; border-top: none;">P</th>
                                <th colspan="10">TGL :</th>
                                <th colspan="10" style="border-right: 2px solid black;">TGL :</th>
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
                                    $adm = mysqli_query($koneksi, "SELECT * from user where id='$d[id_user]'");
                                    $dadm = mysqli_fetch_array($adm);
                                    $kl = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$d[id_kelas]'");
                                    $kls = mysqli_fetch_array($kl);
                                    $tgl = date('d-m-Y', strtotime($d['tgl_daftar'])); // Ubah format tanggal jadi dd-mm-yyyy
                                ?>
                                    <tr>
                                        <td style="border-left: 2px solid black; text-align: center;"><?php echo $no; ?></td>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td style="text-align:center;"><?php echo $d['nisn']; ?></td>
                                        <td style="text-align:center;"><?php echo $d['no_formulir']; ?></td>
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
                                        <td colspan="25" style="padding-left: 1000px;">WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td colspan="25" style="color: white; border: none; padding-left: 1000px;">WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td  colspan="25" style="color: white; border: none; padding-left: 1000px;">WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td  colspan="25" style="padding-left: 900px; border: none; padding-left: 1000px;">NAMA WALI KELAS</td>
                                    </tr>
                                    <tr>
                                        <td  colspan="25" style="padding-left: 900px; border: none; padding-left: 1000px;">NIP. -</td>
                                    </tr>
                    </table>
            </div>
            <!-- /.card-body -->

    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <script src="../../plugins/sparklines/sparkline.js"></script>
    <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../../dist/js/adminlte.js"></script>
    <script src="../../dist/js/pages/dashboard.js"></script>
    <script src="../../dist/js/demo.js"></script>

    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('#form-kelas, #form-jurusan').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-jurusan').hide(); // Sembunyikan form bulan dan tahun
                $('#form-kelas').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-kelas').hide(); // Sembunyikan form tanggal
                $('#form-jurusan').show(); // Tampilkan form bulan dan tahun
            }
            $('#form-kelas input, #form-jurusan select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

</body>
</html>