<!-- Content Header (Page header) -->
<div class='content-header'>
			<div class='container-fluid'>
				<div class='row mb-2'>
					<div class='col-sm-6'>
						<h1 class='m-0 text-dark'>DAFTAR ULANG</h1>
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
          <div class="card card-info">
			<?php  
				if(isset($_GET['tipe'])){
					if($_GET['tipe']=='edit'){
						$sql = mysqli_query($koneksi, "SELECT * from pendaftar where id='$_GET[id]'");
						$de = mysqli_fetch_array($sql);
						?>

<!-- Form Edit Pendaftar -->

				<div class="card-header">
					<h3 class="card-title">EDIT DATA PENDAFTAR</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="module/DataPendaftar/proses_edit.php" method="post" role="form">
						<div class="card-body">
							<h3 class="text text-success">FORM BIODATA</h3>
							<hr>
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $de['id']; ?>">
								<label for="exampleInputEmail1">NISN</label>
								<input value="<?php echo $de['nisn']; ?>" name="nisn" type="number" required="" class="form-control form-control" placeholder="Masukkan NISN">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">No. Formulir</label>
								<input value="<?php echo $de['no_formulir']; ?>" name="noFormulir" required="" type="number" class="form-control form-control" placeholder="Masukkan Nomor Formulir">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Program Keahlian</label>
								<select class="custom-select" name="kdJurusan">
									<option value="" name="kdJurusan" slected>- Pilih Program Keahlian -</option>
									<?php  
										$prog = mysqli_query($koneksi, "SELECT * FROM jurusan order by nama_jurusan");
										while($p=mysqli_fetch_array($prog)){
											if($p['kd_jurusan'] == $de['kd_jurusan']){
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo "
											<option value='$p[kd_jurusan]' $selected>$p[nama_jurusan]</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Kelas</label>
								<select class="custom-select" name="kdJurusan">
									<option value="" name="kelas" slected>- Pilih Kelas -</option>
									<?php  
										$kelas = mysqli_query($koneksi, "SELECT * FROM kelas order by nama_kelas");
										while($p=mysqli_fetch_array($kelas)){
											if($p['id_kelas'] == $de['id_kelas']){
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo "
											<option value='$p[id_kelas]' $selected>$p[nama_kelas]</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Pendaftar</label>
								<input value="<?php echo $de['nama']; ?>" name="nmPendaftar" required="" type="text" class="form-control form-control" placeholder="Masukkan Nama Lengkap">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Asal Sekolah</label>
								<input value="<?php echo $de['asal_sekolah']; ?>" name="asalSekolah" required="" type="text" class="form-control form-control" placeholder="Asal Sekolah">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Jenis Kelamin</label>
								<select class="custom-select" name="jenkel">
									<option value="<?php echo $de['gender']; ?>"><?php echo $de['gender']; ?></option>
									<option>LAKI-LAKI</option>
									<option>PEREMPUAN</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Alamat</label>
								<textarea  value="<?php echo $de['alamat']; ?>" required="" name="alamat" class="form-control" rows="3" ><?php echo $de['alamat']; ?></textarea>
							</div>
						</div>
						<div class="card-footer">
							<input type="submit" class="btn btn-primary btn-sm" name="edit" value="Simpan">
							<input type="button" class="btn btn-danger btn-sm" onClick="history.back();" value="Batal">
						</div>
					</form>
				</div>
<!-- End Edit Pendaftar -->
						<?php
					}elseif($_GET['tipe']=='TambahKelas'){
						?>

<!-- Form tambah kelas -->

				<div class="card-header">
					<h3 class="card-title">TAMBAH KELAS</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="module/DaftarUlang/tambah_kelas.php" method="post" role="form">
						<div class="card-body">
							<h3 class="text text-success">FORM TAMBAH KELAS</h3>
							<hr>
							<?php  
								if(isset($_GET['pesan'])){
									if($_GET['pesan'] == "gagal"){
										echo "<font color='red'>DATA GAGAL DI UPDATE</font>";
									}else if($_GET['pesan'] == "berhasil"){
										echo "<font color='green'>Data Berhasil di Update</font>";
									}else if($_GET['pesan'] == "addkelasoke"){
										echo "<font color='green'>Data Kelas Berhasil di Simpan</font>";
									}else if($_GET['pesan'] == "kelaslangsung"){
										echo "<font color='green'>Kelas berhasil di Update</font>";
									}else if($_GET['pesan'] == "hapus"){
										echo "<font color='orange'>Kelas berhasil di Hapus</font>";
									}
								}
							?>
							<hr>
							<div class="form-group">
								<label for="exampleInputEmail1">Program Keahlian</label>
								<select class="custom-select" name="jurusan">
									<option value="">- Pilih Program Keahlian -</option>
									<?php  
										$kelas = mysqli_query($koneksi, "SELECT * FROM jurusan");
										while($p=mysqli_fetch_array($kelas)){
											echo "
											<option value='$p[kd_jurusan]' $selected>$p[kd_jurusan]</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Kelas</label>
								<input name="nm_kelas" type="text" required="" class="form-control form-control" placeholder="Masukkan Nama Kelas">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Jumlah Siswa Per-Kelas</label>
								<input name="jml" type="number" required="" class="form-control form-control" placeholder="Masukkan Jumlah Siswa">
							</div>
						</div>
						<div class="card-footer">
							<input type="submit" class="btn btn-primary btn-sm" name="simpan" value="Simpan">
							<input type="button" class="btn btn-danger btn-sm" onClick="history.back();" value="Batal">
						</div>
					</form>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped table-hover" style="font-size:9pt;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Jurusan</th>
                                    <th>Nama Kelas</th>
                                    <th>Jumlah Kuota</th>
                                    <th>Jumlah Siswa</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    $sql = mysqli_query($koneksi, "SELECT * from kelas order by kd_jurusan");
                                    while($d = mysqli_fetch_array($sql)){
                                        $jmll = mysqli_query($koneksi,"SELECT * from pendaftar where id_kelas = $d[id_kelas]");
										$jml = mysqli_num_rows($jmll);
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d['kd_jurusan']; ?></td>
                                    <td><?php echo $d['nama_kelas']; ?></td>
                                    <td><?php echo $d['jumlah_siswa']; ?></td>
                                    <td><?php echo $jml; ?></td>
                                    <td>
                                        <a style="width:30px; height: 30px; float:left;font-size: 9pt;" class="btn btn-block btn-outline-success btn-sm" href="?m=DaftarUlang&tipe=editkelas&id=<?php echo $d['id_kelas']; ?>"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <?php echo "
                                        <a style='width:30px; height: 30px; float:left; margin:0;' class='btn btn-block btn-outline-danger btn-sm' href='module/DaftarUlang/hapus_kelas.php?id=$d[id_kelas]' onClick='return confirm(\" Yakin ingin menghapus ? \")'><i class='ion ion-android-delete'></i></a>
                                        "; ?>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
				</div>
<!-- End Edit Pendaftar -->
						<?php
					}elseif($_GET['tipe']=='editkelas'){
						$sql = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$_GET[id]'");
						$de = mysqli_fetch_array($sql);
						?>

<!-- Form tambah kelas -->

				<div class="card-header">
					<h3 class="card-title">Edit KELAS</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="module/DaftarUlang/edit_kelas.php" method="post" role="form">
						<div class="card-body">
							<h3 class="text text-success">FORM EDIT KELAS</h3>
							<hr>
							<div class="form-group">
								<label for="exampleInputEmail1">Program Keahlian</label>
								<select class="custom-select" name="jurusan">
									<option value="">- Pilih Program Keahlian -</option>
									<?php  
										$kelas = mysqli_query($koneksi, "SELECT * FROM jurusan");
										while($p=mysqli_fetch_array($kelas)){
											if($p['kd_jurusan'] == $de['kd_jurusan']){
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo "
											<option value='$p[kd_jurusan]' $selected>$p[kd_jurusan]</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Kelas</label>
								<input name="id" value="<?php echo $de['id_kelas']; ?>" type="hidden">
								<input name="nm_kelas" value="<?php echo $de['nama_kelas']; ?>" type="text" required="" class="form-control form-control" placeholder="Masukkan Nama Kelas">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Jumlah Siswa Per-Kelas</label>
								<input name="jml"  value="<?php echo $de['jumlah_siswa']; ?>" type="number" required="" class="form-control form-control" placeholder="Masukkan Jumlah Siswa">
							</div>
						</div>
						<div class="card-footer">
							<input type="submit" class="btn btn-primary btn-sm" name="edit" value="Simpan">
							<input type="button" class="btn btn-danger btn-sm" onClick="history.back();" value="Batal">
						</div>
					</form>
				</div>
<!-- End Edit Pendaftar -->
						<?php
					}
				}else{
				?>

<!-- Menampilkan data pendaftar -->

            <div class="card-header">
              <h3 class="card-title">Data Siswa Daftar Ulang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="?m=DaftarUlang&tipe=TambahKelas" class="btn btn-success btn-sm">+ Tambah Kelas</a>

<!-- form cari pendaftar -->

				<form class="form-inline mb-4 ml-auto" style="float: right;" method="POST" action="?m=DaftarUlang">
					<div class="input-group input-group-sm">
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
					}else if($_GET['pesan'] == "addkelasoke"){
						echo "<font color='green'>Data Kelas Berhasil di Simpan</font>";
					}else if($_GET['pesan'] == "kelaslangsung"){
						echo "<font color='green'>Kelas berhasil di Update</font>";
					}else if($_GET['pesan'] == "penuh"){
						echo "<font color='red'>Kuota Kelas Sudah Penuh</font>";
					}
				}
			?>
			<div class="table-responsive">
				<table id="example4" class="table table-bordered table-striped table-hover" style="font-size:9pt;">
					<thead>
						<tr>
							<th>No</th>
							<th>Tgl. Daftar Ulang</th>
							<th>NISN</th>
							<th>No. Formulir</th>
							<th>Kode Jurusan</th>
                            <th>Nama Kelas</th>
							<th>Nama Pendaftar</th>
							<th>Asal Sekolah</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
                            <th>Edit Kelas</th>
							<!-- <th>Hapus</th> -->
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
								$sql = "SELECT * FROM pendaftar ORDER BY id_kelas DESC";
							}
							$pendaftar = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($pendaftar)){
								$adm = mysqli_query($koneksi, "SELECT * from user where id='$d[id_user]'");
                                $dadm = mysqli_fetch_array($adm);
                                $kls = mysqli_query($koneksi, "SELECT * from kelas where id_kelas='$d[id_kelas]'");
                                $klss = mysqli_fetch_array($kls);
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $d['tgl_daftar_ulang']; ?></td>
							<td><?php echo $d['nisn']; ?></td>
							<td><?php echo $d['no_formulir']; ?></td>
							<td><?php echo $d['kd_jurusan']; ?></td>
							<td width="150px">
                        <form method="post" action="module/DaftarUlang/editKelasLangsung.php">
                        <input type="hidden" value="<?php echo $d['id']; ?>" name="id">
                                <select class="custom-select" name="kelas">
									<option value="" slected></option>
									<?php  
										$kelas = mysqli_query($koneksi, "SELECT * FROM kelas where kd_jurusan='$d[kd_jurusan]'");
										while($p=mysqli_fetch_array($kelas)){
                                            if($p['id_kelas'] == $d['id_kelas']){
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo "
											<option value='$p[id_kelas]' $selected>$p[nama_kelas]</option>";
										}
									?>
								</select>
                            </td>
							<td><?php echo $d['nama']; ?></td>
							<td><?php echo $d['asal_sekolah']; ?></td>
							<td><?php echo $d['gender']; ?></td>
							<td><?php echo $d['alamat']; ?></td>
							<td>
								<input type="submit" name="edit2" value="Edit Kelas">
							</td>
                            </form>
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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

	