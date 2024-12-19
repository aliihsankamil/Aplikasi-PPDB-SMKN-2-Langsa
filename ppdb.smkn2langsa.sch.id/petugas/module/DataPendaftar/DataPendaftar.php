<!-- Content Header (Page header) -->
<div class='content-header'>
			<div class='container-fluid'>
				<div class='row mb-2'>
					<div class='col-sm-6'>
						<h1 class='m-0 text-dark'>DATA PENDAFTAR</h1>
					</div>
					<!-- /.col -->
					<div class='col-sm-6'>
						<ol class='breadcrumb float-sm-right'>
							<li class='breadcrumb-item'><a href='#'>Data Pendaftar</a></li>
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
			<?php  
				if(isset($_GET['tipe'])){
					if($_GET['tipe']=='tambah'){
						?>

<!-- Form Edit Pendaftar -->

				<div class="card-header">
					<h3 class="card-title">TAMBAH PENDAFTAR</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
                <?php  
						if(isset($_GET['pesan'])){
							if($_GET['pesan'] == "gagal"){
								echo "<font color='red'>DATA GAGAL DI SIMPAN</font>";
							}else if($_GET['pesan'] == "berhasil"){
                                echo "
                                <div class='info-box mb-12 bg-success'>
                                    <span class='info-box-icon'><i class='ion ion-clipboard mr-1'></i></span>

                                    <div class='info-box-content'>
                                        <span class='info-box-text'><b>Informasi</b></span>
                                        <span class='info-box-text'>Data Berhasil DItambah, <b><a class='text text-warning' href='?m=DataPendaftar'>Lihat Data</a></b></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                </font>";
							}
						}
                    ?>
                <form action="module/DataPendaftar/proses_tambah.php" method="post" role="form">
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
									<input name="bind" required="" type="text" class="form-control form-control" placeholder="Masukkan Nilai B.Indonesia">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Matematika</label>
									<input name="mtk" required="" type="text" class="form-control form-control" placeholder="Masukkan Nilai Matematika">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Bahasa Inggris</label>
									<input name="bing" required="" type="text" class="form-control form-control" placeholder="Masukkan Nilai B.Inggris">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">IPA</label>
									<input name="ipa" required="" type="text" class="form-control form-control" placeholder="Masukkan Nilai IPA">
								</div>
							</div>
							<div class="card-footer">
                                <input type="submit" class="btn btn-success btn-sm" name="simpan" value="Simpan">
                                <a href="?m=DataPendaftar&tipe=tambah" class="btn btn-info btn-sm">Reset</a>
                                <a href="?m=DataPendaftar" class="btn btn-danger btn-sm">X Batal</a>
							</div>
						</form>
				</div>
<!-- End Edit Pendaftar -->
						<?php
					}elseif($_GET['tipe']=='tambahh'){
						echo "Tidak dapat mengentri";
					}
				}else{
				?>

<!-- Menampilkan data pendaftar -->

            <div class="card-header">
              <h3 class="card-title">Data Pendaftar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

<!-- form cari pendaftar -->
                <a style="width: 170px;float:left; margin-right: 10px;"  class="btn btn-block btn-success btn-sm" href="?m=DataPendaftar&tipe=tambah">Tambah Pendaftar</a>
				<form style="width: 100%" class="form-inline mb-4 mt-5 ml-auto" method="POST" action="?m=DataPendaftar">
					<div style="width:100%;" class="input-group input-group-sm">
						<input class="form-control form-control-navbar" name="keyword" type="search" placeholder="Cari Pendaftar" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-success" type="submit" name="pencarian">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>

<!-- End Form Cari -->
			<?php  
				if(isset($_GET['pesan'])){
					if($_GET['pesan'] == "gagal"){
						echo "<font color='red'>DATA GAGAL DI UPDATE</font>";
					}else if($_GET['pesan'] == "berhasil"){
						echo "<font color='green'>Data Berhasil di Update</font>";
					}
				}
			?>
			<div class="table-responsive">
				<table id="example2" class="table table-hover table-striped" style="font-size:9pt;">
					<thead>
						<tr>
							<th>No</th>
							<th>Tgl. Daftar</th>
							<th>NISN</th>
							<th>No. Formulir</th>
							<th>Kode Jurusan</th>
							<th>Nama Pendaftar</th>
							<th>Asal Sekolah</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>Yang Bertanggung Jawab</th>
							<th>B.Indonesia</th>
							<th>B.Inggris</th>
							<th>Matematika</th>
							<th>IPA</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							if(isset($_POST['pencarian'])){
								// query pencarian data
								$keyword = $_POST['keyword'];
								$sql = "SELECT * from pendaftar where nama like '%$keyword%'";
							}else{
								// query menampilkan data biasa
								$sql = "SELECT * FROM pendaftar ORDER BY tgl_daftar ASC";
							}
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
							<td><?php echo $d['kd_jurusan']; ?></td>
							<td><?php echo $d['nama']; ?></td>
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

						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.card-body -->

<!-- End Tampil data pendaftar -->

				<?php
				}
			?>
		</div>
		  <!-- /.card -->
	</section>

	</div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    <strong>&copy; 2020 <a href="http://smkn2langsa.sch.id">SMKN 2 Langsa</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1
    </div>
</footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

	