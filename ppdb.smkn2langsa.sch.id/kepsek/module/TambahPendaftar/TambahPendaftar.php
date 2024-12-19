<!-- Content Header (Page header) -->
<div class='content-header'>
			<div class='container-fluid'>
				<div class='row mb-2'>
					<div class='col-sm-6'>
						<h1 class='m-0 text-dark'>TAMBAH PENDAFTAR</h1>
					</div>
					<!-- /.col -->
					<div class='col-sm-6'>
						<ol class='breadcrumb float-sm-right'>
							<li class='breadcrumb-item'><a href='#'>Tambah Pendaftar</a></li>
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
    <section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">TAMBAH PENDAFTAR</h3>
					</div>
					<div class="card-body">
					<?php  
						if(isset($_GET['pesan'])){
							if($_GET['pesan'] == "gagal"){
								echo "<font color='red'>DATA GAGAL DI SIMPAN</font>";
							}else if($_GET['pesan'] == "berhasil"){
								echo "<font color='green'>Data Berhasil di Tambah</font>";
							}
						}
					?>
						<form action="module/TambahPendaftar/proses_tambah.php" method="post" role="form">
							<div class="card-body">
								<h3 class="text text-success">FORM BIODATA</h3>
								<hr>
								<div class="form-group">
									<label for="exampleInputEmail1">NISN</label>
									<input name="nisn" type="number" required="" class="form-control form-control" placeholder="Masukkan NISN">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">No. Formulir</label>
									<input name="noFormulir" required="" type="number" class="form-control form-control" placeholder="Masukkan Nomor Formulir">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Program Keahlian</label>
									<select class="custom-select" name="kdJurusan">
										<option>-- Pilih Program Keahlian --</option>
									<?php 
										$sql = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY nama_jurusan");
										while($d = mysqli_fetch_array($sql)){
									?>
										<option value="<?php echo $d['kd_jurusan']; ?>"><?php echo $d['nama_jurusan']; ?></option>
									<?php
										}
									?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Pendaftar</label>
									<input name="nmPendaftar" required="" type="text" class="form-control form-control" placeholder="Masukkan Nama Lengkap">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Asal Sekolah</label>
									<input name="asalSekolah" required="" type="text" class="form-control form-control" placeholder="Asal Sekolah">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Jenis Kelamin</label>
									<select class="custom-select" name="jenkel">
										<option>LAKI-LAKI</option>
										<option>PEREMPUAN</option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Alamat</label>
									<textarea required="" name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat (JL. JEND A YANI PAYA BUJOK SEULEMAK, KOTA LANGSA)"></textarea>
								</div>
								<br>
								<h3 class="text text-success">FORM NILAI RATA-RATA AKHIR</h3>
								<hr>
								<div class="form-group">
									<label for="exampleInputEmail1">Bahasa Indonesia</label>
									<input name="bind" required="" type="number" class="form-control form-control" placeholder="Masukkan Nilai B.Indonesia">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Bahasa Inggris</label>
									<input name="bing" required="" type="number" class="form-control form-control" placeholder="Masukkan Nilai B.Inggris">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Matematika</label>
									<input name="mtk" required="" type="number" class="form-control form-control" placeholder="Masukkan Nilai Matematika">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">IPA</label>
									<input name="ipa" required="" type="number" class="form-control form-control" placeholder="Masukkan Nilai IPA">
								</div>
							</div>
							<div class="card-footer">
                                <input type="submit" class="btn btn-success btn-sm" name="simpan" value="Simpan">
                                <a href="?m=TambahPendaftar" class="btn btn-info btn-sm">Reset</a>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>
	</section>

	</div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
	<script src="dist/js/demo.js"></script> -->