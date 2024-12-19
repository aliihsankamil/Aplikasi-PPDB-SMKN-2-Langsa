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
							<br>
							<h3 class="text text-success">FORM NILAI RATA-RATA AKHIR</h3>
							<hr>
							<div class="form-group">
								<label for="exampleInputEmail1">Bahasa Indonesia</label>
								<input value="<?php echo $de['bind']; ?>" name="bind" required="" type="bind" class="form-control form-control" placeholder="Masukkan Nilai B.Indonesia">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Bahasa Inggris</label>
								<input value="<?php echo $de['bing']; ?>" name="bing" required="" type="bing" class="form-control form-control" placeholder="Masukkan Nilai B.Inggris">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Matematika</label>
								<input value="<?php echo $de['mtk']; ?>" name="mtk" required="" type="mtk" class="form-control form-control" placeholder="Masukkan Nilai Matematika">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">IPA</label>
								<input value="<?php echo $de['ipa']; ?>" name="ipa" required="" type="ipa" class="form-control form-control" placeholder="Masukkan Nilai IPA">
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
              <h3 class="card-title">DATA PENDAFTAR</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

<!-- form cari pendaftar -->

				<form class="form-inline mb-4 ml-auto" method="POST" action="?m=DataPendaftar">
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
					}
				}
			?>
			<div class="table-responsive">
				<table id="example2" class="table table-bordered table-striped table-hover" style="font-size:9pt;">
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
							<th>Edit</th>
							<th>Hapus</th>
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
							<td>
								<a style="width:30px; height: 30px; float:left;font-size: 9pt;" class="btn btn-block btn-outline-success btn-sm" href="?m=DataPendaftar&tipe=edit&id=<?php echo $d['id']; ?>"><i class="fas fa-edit"></i></a>
							</td>
							<td>
								<?php echo "
								<a style='width:30px; height: 30px; float:left; margin:0;' class='btn btn-block btn-outline-danger btn-sm' href='module/DataPendaftar/proses_hapus.php?nisn=$d[nisn]' onClick='return confirm(\" Yakin ingin menghapus ? \")'><i class='ion ion-android-delete'></i></a>
								"; ?>
							</td>
						</tr>
						<?php
						$no++;
							}

						?>
					</tbody>
					<!-- <tfoot>
						<th>No</th>
						<th>NISN</th>
						<th>No. Formulir</th>
						<th>Kode Jurusan</th>
						<th>Nama Pendaftar</th>
						<th>Asal Sekolah</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Tgl. Daftar</th>
						<th>Yang Bertanggung Jawab</th>
						<th>Aksi</th>
					</tfoot> -->
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
    <?php include "footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

	