<?php  
	session_start();
	if(!isset($_SESSION['login'])){
        header('location:../index.php');
	}
	include "../inc/config.php";
?>
        <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pendaftaran | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../admin/plugins/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/bootstrap.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Beranda</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">1 Pemberitahuan</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Penggunaan Aplikasi
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Informasi</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../images/avatar-01.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMK Negeri 2 Langsa</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div> -->
                    <div class="info">
                        <a href="#" class="d-block"><?php echo "$_SESSION[nama]"; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.php?m=DataPendaftar" class="nav-link">
                                <i class="nav-icon ion ion-ios-people"></i>
                                <p>
                                    Data Pendaftar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.php?m=DaftarUlang" class="nav-link">
                                <i class="nav-icon ion ion-edit"></i>
                                <p>
                                    Daftar Ulang
                                </p>
                            </a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a href="module/CetakAbsen/CetakAbsen.php" class="nav-link">-->
                        <!--        <i class="nav-icon ion ion-ios-printer"></i>-->
                        <!--        <p>-->
                        <!--            Cetak Absen-->
                        <!--        </p>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon ion ion-close-circled"></i>
                                <p>
                                    Keluar
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php 
            include "content.php"; 
            ?>

        </div>
        <!-- /.row (main row) -->

        <script src="../admin/plugins/jquery/jquery.min.js"></script>
        <script src="../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../admin/plugins/chart.js/Chart.min.js"></script>
        <script src="../admin/plugins/sparklines/sparkline.js"></script>
        <script src="../admin/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="../admin/plugins/moment/moment.min.js"></script>
        <script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="../admin/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="../admin/dist/js/adminlte.js"></script>
        <script src="../admin/dist/js/pages/dashboard.js"></script>
        <script src="../admin/dist/js/demo.js"></script>

        <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true,
            "autoWidth": true,
            });
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": false,
            });
            $('#example3').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
            });
            $('#example4').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": false,
            });
        });
        </script>
</body>

</html>