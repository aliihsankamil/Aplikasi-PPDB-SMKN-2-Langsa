<!-- Content Header (Page header) -->
<div class='content-header'>
			<div class='container-fluid'>
				<div class='row mb-2'>
					<div class='col-sm-6'>
						<h1 class='m-0 text-dark'>DATA USER</h1>
					</div>
					<!-- /.col -->
					<div class='col-sm-6'>
						<ol class='breadcrumb float-sm-right'>
							<li class='breadcrumb-item'><a href='#'>Data User</a></li>
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
					<h3 class="card-title">TAMBAH USER</h3>
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
                                        <span class='info-box-text'>Data Berhasil DItambah, <b><a class='text text-warning' href='?m=DataUser'>Lihat Data</a></b></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                </font>";
							}
						}
                    ?>
                <form action="module/DataUser/proses_tambah.php" method="post" role="form">
							<div class="card-body">
								<h3 class="text text-success">FORM TAMBAH USER</h3>
								<hr>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama</label>
									<input name="nama" type="text" required="" class="form-control form-control" placeholder="Masukkan Nama">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Username</label>
									<input name="user" required="" type="text" class="form-control form-control" placeholder="Masukkan Username">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label>
									<input name="pass" required="" type="password" class="form-control form-control" placeholder="Masukkan Password">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Level</label>
									<select class="custom-select" name="level">
										<option>-- Pilih Program Keahlian --</option>
									<?php 
										$sql = mysqli_query($koneksi, "SELECT * FROM jabatan");
										while($d = mysqli_fetch_array($sql)){
									?>
										<option value="<?php echo $d['nm_jabatan']; ?>"><?php echo $d['nm_jabatan']; ?></option>
									<?php
										}
									?>
									</select>
								</div>
							</div>
							<div class="card-footer">
                                <input type="submit" class="btn btn-success btn-sm" name="simpan" value="Simpan">
                                <a href="?m=DataUser&tipe=tambah" class="btn btn-info btn-sm">Reset</a>
                                <a href="?m=DataUser" class="btn btn-danger btn-sm">X Batal</a>
							</div>
						</form>
				</div>
<!-- End Edit Pendaftar -->
						<?php
					}elseif($_GET['tipe']=='edit'){
						$sql = mysqli_query($koneksi, "SELECT * from user where id='$_GET[id]'");
						$de = mysqli_fetch_array($sql);
						?>

<!-- Form Edit Pendaftar -->

				<div class="card-header">
					<h3 class="card-title">EDIT USER</h3>
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
                                        <span class='info-box-text'>Data Berhasil DItambah, <b><a class='text text-warning' href='?m=DataUser'>Lihat Data</a></b></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                </font>";
							}
						}
                    ?>
                <form action="module/DataUser/proses_edit.php" method="post" role="form">
							<div class="card-body">
								<h3 class="text text-success">FORM EDIT USER</h3>
								<hr>
								<div class="form-group">
								    <input type="hidden" value="<?php echo $de['id']; ?>" name="id">
									<label for="exampleInputEmail1">Nama</label>
									<input value="<?php echo $de['nama_lengkap']; ?>" name="nama" type="text" required="" class="form-control form-control" placeholder="Masukkan Nama">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Username</label>
									<input value="<?php echo $de['username']; ?>"  name="user" required="" type="text" class="form-control form-control" placeholder="Masukkan Username">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label><br/>
									<a href="?m=DataUser&tipe=edituser&id=<?php echo $de['id']; ?>">Ubah Password</a>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Level</label>
									<select class="custom-select" name="level">
										<option value="" selected>- Pilih Level -</option>
										<?php  
											$prog = mysqli_query($koneksi, "SELECT * FROM jabatan");
											while($p=mysqli_fetch_array($prog)){
												if($p['nm_jabatan'] == $de['level']){
													$selected = "selected";
												}else{
													$selected = "";
												}
												echo "
												<option value='$p[nm_jabatan]' $selected>$p[nm_jabatan]</option>";
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Satus Keaktifan</label>
									<select class="custom-select" name="aktif">
										<option>-- Pilih Status --</option>
										<option value="<?php echo $de['aktif']; ?>" selected><?php echo $de['aktif']; ?> </option>
										<option value="Y">Y (Aktif)</option>
										<option value="T">T (Tidak Aktif)</option>
									</select>
								</div>
							<div class="card-footer">
                                <input type="submit" class="btn btn-success btn-sm" name="edit" value="Simpan">
                                <a href="?m=DataUser&tipe=tambah" class="btn btn-info btn-sm">Reset</a>
                                <a href="?m=DataUser" class="btn btn-danger btn-sm">X Batal</a>
							</div>
						</form>
				</div>
<!-- End Edit Pendaftar -->
						<?php
					}elseif($_GET['tipe']=='edituser'){
						$sql = mysqli_query($koneksi, "SELECT * from user where id='$_GET[id]'");
						$de = mysqli_fetch_array($sql);
						?>

<!-- Form Edit Pendaftar -->

				<div class="card-header">
					<h3 class="card-title">EDIT PASSWORD</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
                <form action="module/DataUser/EditPassword.php" method="post" role="form">
							<div class="card-body">
								<h3 class="text text-success">FORM EDIT PASSWORD USER</h3>
								<hr>
								<div class="form-group">
								    <input type="hidden" value="<?php echo $de['id']; ?>" name="id">
									<label for="exampleInputEmail1">Nama</label>
									<input value="<?php echo $de['nama_lengkap']; ?>" name="nama" type="text" disabled required="" class="form-control form-control" placeholder="Masukkan Nama" >
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Username</label>
									<input value="<?php echo $de['username']; ?>"  name="user" required="" disabled type="text" class="form-control form-control" placeholder="Masukkan Username">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label><br/>
									<input value="<?php echo $de['password']; ?>"  name="pass" required="" type="text" class="form-control form-control" placeholder="Masukkan Password">
								</div>
							<div class="card-footer">
                                <input type="submit" class="btn btn-success btn-sm" name="edit" value="Simpan">
                                <a href="?m=DataUser&tipe=tambah" class="btn btn-info btn-sm">Reset</a>
                                <a href="?m=DataUser" class="btn btn-danger btn-sm">X Batal</a>
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
              <h3 class="card-title">Data User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

<!-- form cari pendaftar -->
                <a style="width: 170px;float:left; margin-right: 10px;"  class="btn btn-block btn-success mb-4 btn-sm" href="?m=DataUser&tipe=tambah">Tambah User</a>

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
							<th>Nama</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
							<th>Aktif</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							$sql = mysqli_query($koneksi, "SELECT * FROM user");
							while($d = mysqli_fetch_array($sql)){
						?>
						<tr><input type="hidden" value="<?php echo $d['id']; ?>">
							<td><?php echo $no; ?></td>
							<td><?php echo $d['nama_lengkap']; ?></td>
							<td><?php echo $d['username']; ?></td>
							<td><?php echo $d['password']; ?></td>
							<td><?php echo $d['level']; ?></td>
							<td><?php echo $d['aktif']; ?></td>
							<td>
								<a style="width:30px; height: 30px; float:left;font-size: 9pt;" class="btn btn-block btn-outline-success btn-sm mr-2" href="?m=DataUser&tipe=edit&id=<?php echo $d['id']; ?>"><i class="fas fa-edit"></i></a>
								<?php echo "
								<a style='width:30px; height: 30px; float:left; margin:0;' class='btn btn-block btn-outline-danger btn-sm' href='module/DataUser/proses_hapus.php?id=$d[id]' onClick='return confirm(\" Yakin ingin menghapus ? \")'><i class='ion ion-android-delete'></i></a>
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

	