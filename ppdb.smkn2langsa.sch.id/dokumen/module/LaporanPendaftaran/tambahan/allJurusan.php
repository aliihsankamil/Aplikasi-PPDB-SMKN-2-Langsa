<?php  
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }
    include "../../../../inc/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="../../../../admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../../../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../../../admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../../../../admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../../../admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../../../admin/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../../../../admin/plugins/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../../../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body>
            <div class="card-body">
                <div class="container-fluid">
                    <p>
                    <input type="button" class="btn btn-danger btn-sm" onClick="history.back();" value="X Batal">
                    </p>
                    <div class="info-box mb-12 bg-info">
                        <span class="info-box-icon"><i class="far fa-edit"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Laporan Pendaftaran</span>
                            <span class="info-box-text">Urut Berdasarkan Jurusan</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <p>
                        Eksport to :
                        <a href="allJurusan/allJurusanExcel.php" target="_blank" type="button" class="btn btn-success">
                            <span class="fas fa-file-export"></span> Excel
                        </a>
                        <a href="allJurusan/allJurusanPdf.php" target="_blank" type="button" class="btn btn-danger">
                            <span class="fas fa-file-export"></span> PDF
                        </a>
                        <a href="allJurusan/allJurusanWord.php" target="_blank" type="button" class="btn btn-info">
                            <span class="fas fa-file-export"></span> Word
                        </a>
                    </p>
                </div>

                <table class="table table-bordered table-hover" style="font-size:9pt;" border="1">
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
                            $sql = "SELECT * FROM pendaftar ORDER BY kd_jurusan ASC";
							$pendaftar = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($pendaftar)){
								$adm = mysqli_query($koneksi, "SELECT * from user where id='$d[id_user]'");
								$dadm = mysqli_fetch_array($adm);
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

						?>
					</tbody>
				</table>
              
            </div>
            <!-- /.card-body -->

    <script src="../../../../admin/plugins/jquery/jquery.min.js"></script>
    <script src="../../../../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../../../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../admin/plugins/chart.js/Chart.min.js"></script>
    <script src="../../../../admin/plugins/sparklines/sparkline.js"></script>
    <script src="../../../../admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../../../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="../../../../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../../../admin/plugins/moment/moment.min.js"></script>
    <script src="../../../../admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../../../../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../../../../admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../../../../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../../../../admin/dist/js/adminlte.js"></script>
    <script src="../../../../admin/dist/js/pages/dashboard.js"></script>
    <script src="../../../../admin/dist/js/demo.js"></script>

    <script src="../../../../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
    
</body>
</html>