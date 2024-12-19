<?php  
	if(isset($_GET['m'])){
		if($_GET['m']=='sekolah'){
			include "module/sekolah/sekolah.php";
		}elseif($_GET['m']=='DataPendaftar'){
			include "module/DataPendaftar/DataPendaftar.php";
		}elseif($_GET['m']=='LaporanPendaftaran'){
			include "module/LaporanPendaftaran/LaporanPendaftaran.php";
		}elseif($_GET['m']=='TambahPendaftar'){
			include "module/TambahPendaftar/TambahPendaftar.php";
		}else{
			echo "<h3>Module tidak ditemukan<p>Silahkan pilih menu yang lain !</p></h3>";
		}
	}else{
		echo"
		<!-- Content Header (Page header) -->
		<div class='content-header'>
			<div class='container-fluid'>
				<div class='row mb-2'>
					<div class='col-sm-6'>
						<h1 class='m-0 text-dark'>BERANDA</h1>
					</div>
					<!-- /.col -->
					<div class='col-sm-6'>
						<ol class='breadcrumb float-sm-right'>
							<li class='breadcrumb-item'><a href='#'>Beranda</a></li>
						</ol>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		
		<!-- Main content -->
		<section class='content'>
			<div class='container-fluid'>
				<!-- Small boxes (Stat box) -->
				<div class='row'>
					<div class='col-lg-3 col-6'>
						<!-- small box -->
						<div class='small-box bg-success'>
							<div class='inner'> ";?>
								<h3>
									<?php $j = mysqli_query($koneksi,"SELECT * from pendaftar");
									$j2 = mysqli_num_rows($j); 
									echo "
									<b>$j2</b>";
									?> Pendaftar
								</h3>
						<?php echo "
								<p>Data Pendaftar</p>
							</div>
							<div class='icon'>
								<i class='ion ion-ios-people'></i>
							</div>
							<a href='dashboard.php?m=DataPendaftar' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class='col-lg-3 col-6'>
						<!-- small box -->
						<div class='small-box bg-warning'>
							<div class='inner'>
								<h3>Tambah +</h3>

								<p>Tambah Pendaftar</p>
							</div>
							<div class='icon'>
								<i class='ion ion-person-add'></i>
							</div>
							<a href='dashboard.php?m=TambahPendaftar' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class='col-lg-3 col-6'>
						<!-- small box -->
						<div class='small-box bg-danger'>
							<div class='inner'>
								<h3>Laporan</h3>

								<p>Laporan Pendaftaran</p>
							</div>
							<div class='icon'>
								<i class='ion ion-ios-printer'></i>
							</div>
							<a href='dashboard.php?m=LaporanPendaftaran' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
						</div>
					</div>
					<!-- ./col -->
				</div>

				<!-- /.card-footer-->
			</div>
			<!--/.direct-chat -->

			<div class='card'>
				<div class='card-header'>
					<h3 class='card-title'>
						<i class='ion ion-clipboard mr-1'></i> Info Pendaftar Per Jurusan
					</h3><br><br>   

					<div class='table-responsive'>
						<table id='example3' class='table table-hover table-striped'>
							<thead>
								<tr>
									<th>No.</th>
									<th>Kompetensi Keahlian</th>
									<th>Jumlah Pendaftar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Teknik Elektronika</td>
									<td> 
									";?>
									<?php 
										$jm = mysqli_query($koneksi,"SELECT * from pendaftar where kd_jurusan='TEL'");
										$jml = mysqli_num_rows($jm); 
										echo "
										<b>$jml</b>";
									?>
									<?php echo "
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Teknik Ketenagalistrikan</td>
									<td>
									";?>
									<?php 
										$jm = mysqli_query($koneksi,"SELECT * from pendaftar where kd_jurusan='TL'");
										$jml = mysqli_num_rows($jm); 
										echo "
										<b>$jml</b>";
									?>
									<?php echo "
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Teknik Komputer dan Informatika</td>
									<td>
									";?>
									<?php 
										$jm = mysqli_query($koneksi,"SELECT * from pendaftar where kd_jurusan='TI'");
										$jml = mysqli_num_rows($jm); 
										echo "
										<b>$jml</b>";
									?>
									<?php echo "
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Teknik Konstruksi dan Properti</td>
									<td>
									";?>
									<?php 
										$jm = mysqli_query($koneksi,"SELECT * from pendaftar where kd_jurusan='TKP'");
										$jml = mysqli_num_rows($jm); 
										echo "
										<b>$jml</b>";
									?>
									<?php echo "
									</td>
								</tr>
								<tr>
									<td>5</td>
									<td>Teknik Mesin</td>
									<td>
									";?>
									<?php 
										$jm = mysqli_query($koneksi,"SELECT * from pendaftar where kd_jurusan='TM'");
										$jml = mysqli_num_rows($jm); 
										echo "
										<b>$jml</b>";
									?>
									<?php echo "
									</td>
								</tr>
								<tr>
									<td>6</td>
									<td>Teknik Otomotif</td>
									<td>
									";?>
									<?php 
										$jm = mysqli_query($koneksi,"SELECT * from pendaftar where kd_jurusan='TO'");
										$jml = mysqli_num_rows($jm); 
										echo "
										<b>$jml</b>";
									?>
									<?php echo "
									</td>
								</tr>
								<tr>
									<td>7</td>
									<td>Teknik Seni Rupa (Furniture)</td>
									<td>
									";?>
									<?php 
										$jm = mysqli_query($koneksi,"SELECT * from pendaftar where kd_jurusan='TF'");
										$jml = mysqli_num_rows($jm); 
										echo "
										<b>$jml</b>";
									?>
									<?php echo "
									</td>
								</tr>
								<tr>
								    <td colspan='2' align='right'><b>Total</b></td>
								    <td>
								    ";?>
								    <?php
								    $j = mysqli_query($koneksi,"SELECT * from pendaftar");
									$j2 = mysqli_num_rows($j); 
									echo "
									<b>$j2</b>";
									?>
									<?php echo "
								    </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</section>
		";
	}
?>