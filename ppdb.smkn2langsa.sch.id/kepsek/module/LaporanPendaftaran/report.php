<?php  
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }
    include "../../../inc/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="../../../admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../../admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../../../admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../../admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../../admin/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../../../admin/plugins/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body>
            <div class="card-body">
                <div class="container-fluid">
                    <p>
                    <a href="../../dashboard.php?m=LaporanPendaftaran" class="btn btn-danger btn-sm" >X Batal</a>
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
                        <option value="1">Per Tanggal</option>
                        <option value="2">Per Jurusan</option>
                    </select>
                    <br /><br />
                    <div id="form-tanggal">
                        <label>Tanggal</label><br>
                        <input type="date" name="tanggal1" value="<?php echo date('Y-m-d'); ?>"/>
                        <input type="date" name="tanggal2" value="<?php echo date('Y-m-d'); ?>"/>
                        <br /><br />
                    </div>
                    <div id="form-jurusan">
                        <label>Jurusan</label><br>
                        <select name="jurusan">
                            <option value="">Pilih</option>
                            <?php
                                include "../../../inc/config.php";
                                $sql = mysqli_query($koneksi, "SELECT * from jurusan order by nama_jurusan ASC");
                                while($j = mysqli_fetch_array($sql)){
                                    echo "
                                        <option value='$j[kd_jurusan]'>$j[nama_jurusan]</option>
                                    ";
                                }
                            ?>
                        </select>
                        <br /><br />
                    </div>

                    <button type="submit">Tampilkan</button>
                    <a href="report.php">Reset Filter</a>
                </form>
                <hr/>

                <?php
                    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                            $tgl1 = $_GET['tanggal1'];
                            $tgl2 = $_GET['tanggal2'];
                            echo '<b>Yang Mendaftar Tanggal '.$tgl1.' sampai '.$tgl2.'</b><br /><br />';
                            echo '
                                Eksport to :
                                <a href="printExcel.php?filter=1&tanggal1='.$_GET['tanggal1'].'&tanggal2='.$_GET['tanggal2'].'" target="_blank" type="button" class="btn btn-success">
                                    <span class="fas fa-file-export"></span> Excel
                                </a>
                                <a href="printPdf.php?filter=1&tanggal1='.$_GET['tanggal1'].'&tanggal2='.$_GET['tanggal2'].'" target="_blank" type="button" class="btn btn-danger">
                                    <span class="fas fa-file-export"></span> PDF
                                </a>
                                <a href="printWord.php?filter=1&tanggal1='.$_GET['tanggal1'].'&tanggal2='.$_GET['tanggal2'].'" target="_blank" type="button" class="btn btn-info">
                                    <span class="fas fa-file-export"></span> Word
                                </a>
                                <br /><br />
                            ';
                            $query = "SELECT * FROM pendaftar WHERE tgl_daftar between '$_GET[tanggal1]' AND '$_GET[tanggal2]'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
                        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                            echo '
                                Eksport to :
                                <a href="printExcel.php?filter=2&jurusan='.$_GET['jurusan'].'" target="_blank" type="button" class="btn btn-success">
                                    <span class="fas fa-file-export"></span> Excel
                                </a>
                                <a href="printPdf.php?filter=2&jurusan='.$_GET['jurusan'].'" target="_blank" type="button" class="btn btn-danger">
                                    <span class="fas fa-file-export"></span> PDF
                                </a>
                                <a href="printWord.php?filter=2&jurusan='.$_GET['jurusan'].'" target="_blank" type="button" class="btn btn-info">
                                    <span class="fas fa-file-export"></span> Word
                                </a>
                                <br /><br />
                            ';
                            $query = "SELECT * FROM pendaftar WHERE kd_jurusan='".$_GET['jurusan']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                        }
                    }else{ // Jika user tidak mengklik tombol tampilkan
                        echo '<b>Semua Data Pendaftar Urut Berdasarkan Tanggal Daftar</b><br /><br />';
                        echo '
                        <p>
                            Eksport to :
                            <a href="printExcel.php" target="_blank" type="button" class="btn btn-success">
                                <span class="fas fa-file-export"></span> Excel
                            </a>
                            <a href="printPdf.php" target="_blank" type="button" class="btn btn-danger">
                                <span class="fas fa-file-export"></span> PDF
                            </a>
                            <a href="printWord.php" target="_blank" type="button" class="btn btn-info">
                                <span class="fas fa-file-export"></span> Word
                            </a>
                        </p>
                        ';
                        $query = "SELECT * FROM pendaftar ORDER BY tgl_daftar"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
                    }
                    ?>
                    <table class="table table-bordered table-hover" style="font-size:9pt;" border="1">
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
                                        <td><?php echo $d['nisn']; ?></td>
                                        <td><?php echo $d['no_formulir']; ?></td>
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
            </div>
            <!-- /.card-body -->

    <script src="../../../admin/plugins/jquery/jquery.min.js"></script>
    <script src="../../../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../admin/plugins/chart.js/Chart.min.js"></script>
    <script src="../../../admin/plugins/sparklines/sparkline.js"></script>
    <script src="../../../admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="../../../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../../admin/plugins/moment/moment.min.js"></script>
    <script src="../../../admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../../../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../../../admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../../../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../../../admin/dist/js/adminlte.js"></script>
    <script src="../../../admin/dist/js/pages/dashboard.js"></script>
    <script src="../../../admin/dist/js/demo.js"></script>

    <script src="../../../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
        $('#form-tanggal, #form-jurusan').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-jurusan').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-jurusan').show(); // Tampilkan form bulan dan tahun
            }
            $('#form-tanggal input, #form-jurusan select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

</body>
</html>