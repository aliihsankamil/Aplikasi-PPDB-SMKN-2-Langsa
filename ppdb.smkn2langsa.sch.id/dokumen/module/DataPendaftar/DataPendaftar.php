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
								<h3 class="text text-success">FORM NILAI</h3>
								<hr>
								<p>Untuk mengisi nilai yang berkoma harap memasukkan tanda koma nya dengan tanda titik(90.5).</p>
								<hr>
								<div class="table-responsive">
							<table id="example2" class="table table-hover table-striped" style="font-size:9pt;">
								<thead>
									<tr>
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
									<tr>
										<!-- VIII 1 -->
										<!-- BIND -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BIN_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BIN_VIII_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- MTK -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="MTK_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="MTK_VIII_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- BING -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BING_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BING_VIII_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- IPA -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="IPA_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="IPA_VIII_1_K" required="" type="text" class="form-control form-control"></td>

										<!-- VIII 2 -->
										<!-- BIND -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BIN_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BIN_VIII_2_K" required="" type="text" class="form-control form-control"></td>
										<!-- MTK -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="MTK_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="MTK_VIII_2_K" required="" type="text" class="form-control form-control"></td>
										<!-- BING -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BING_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BING_VIII_2_K" required="" type="text" class="form-control form-control"></td>
										<!-- IPA -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="IPA_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="IPA_VIII_2_K" required="" type="text" class="form-control form-control"></td>

										<!-- IX 1 -->
										<!-- BIND -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BIN_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BIN_IX_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- MTK -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="MTK_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="MTK_IX_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- BING -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BING_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="BING_IX_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- IPA -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="IPA_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" name="IPA_IX_1_K" required="" type="text" class="form-control form-control"></td>
									</tr>
								</tbody>
							</table>
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
					}elseif($_GET['tipe']=='edit'){
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
							<!--<hr>-->
							<!--<p>Untuk mengisi nilai yang berkoma harap memasukkan tanda koma nya dengan tanda titik(90.5).</p>-->
							<hr>
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $de['id']; ?>">
								<label for="exampleInputEmail1">NISN</label>
								<input value="<?php echo $de['nisn']; ?>" name="nisn" type="text" required="" class="form-control form-control" placeholder="Masukkan NISN">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">No. Formulir</label>
								<input value="<?php echo $de['no_formulir']; ?>" name="noFormulir" required="" type="text" class="form-control form-control" placeholder="Masukkan Nomor Formulir">
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
							<h3 class="text text-success">FORM NILAI</h3>
							<hr>
							<div class="table-responsive">
							<table id="example2" class="table table-hover table-striped" style="font-size:9pt;">
								<thead>
									<tr>
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
									<tr>
										<!-- VIII 1 -->
										<!-- BIND -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BIN_VIII_1_P']; ?>" name="BIN_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BIN_VIII_1_K']; ?>" name="BIN_VIII_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- MTK -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['MTK_VIII_1_P']; ?>" name="MTK_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['MTK_VIII_1_K']; ?>" name="MTK_VIII_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- BING -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BING_VIII_1_P']; ?>" name="BING_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BING_VIII_1_K']; ?>" name="BING_VIII_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- IPA -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['IPA_VIII_1_P']; ?>" name="IPA_VIII_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['IPA_VIII_1_K']; ?>" name="IPA_VIII_1_K" required="" type="text" class="form-control form-control"></td>

										<!-- VIII 2 -->
										<!-- BIND -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BIN_VIII_2_P']; ?>" name="BIN_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BIN_VIII_2_K']; ?>" name="BIN_VIII_2_K" required="" type="text" class="form-control form-control"></td>
										<!-- MTK -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['MTK_VIII_2_P']; ?>" name="MTK_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['MTK_VIII_2_K']; ?>" name="MTK_VIII_2_K" required="" type="text" class="form-control form-control"></td>
										<!-- BING -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BING_VIII_2_P']; ?>" name="BING_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BING_VIII_2_K']; ?>" name="BING_VIII_2_K" required="" type="text" class="form-control form-control"></td>
										<!-- IPA -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['IPA_VIII_2_P']; ?>" name="IPA_VIII_2_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['IPA_VIII_2_K']; ?>" name="IPA_VIII_2_K" required="" type="text" class="form-control form-control"></td>

										<!-- IX 1 -->
										<!-- BIND -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BIN_IX_1_P']; ?>" name="BIN_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BIN_IX_1_K']; ?>" name="BIN_IX_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- MTK -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['MTK_IX_1_P']; ?>" name="MTK_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['MTK_IX_1_K']; ?>" name="MTK_IX_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- BING -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BING_IX_1_P']; ?>" name="BING_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['BING_IX_1_K']; ?>" name="BING_IX_1_K" required="" type="text" class="form-control form-control"></td>
										<!-- IPA -->
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['IPA_IX_1_P']; ?>" name="IPA_IX_1_P" required="" type="text" class="form-control form-control"></td>
										<td style="padding:7px;"><input style="padding:4px; margin:0;" value="<?php echo $de['IPA_IX_1_K']; ?>" name="IPA_IX_1_K" required="" type="text" class="form-control form-control"></td>
									</tr>
								</tbody>
							</table>
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
              <h3 class="card-title">Data Pendaftar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

<!-- form cari pendaftar -->
                <a style="width: 170px; margin-right: 10px;"  class="btn btn-success btn-sm" href="?m=DataPendaftar&tipe=tambah"><b>+</b> Tambah Pendaftar</a><br><br>
				<!-- <h3 class="card-title">Data Pendaftar Per Kompetensi Keahlian</h3>
				<br>
				<hr>
                <a style="float:left; margin-right: 10px;"  class="btn btn-success btn-sm" href="?m=DataPendaftar&tipe=tambah">TEL</a>	
                <a style="float:left; margin-right: 10px;"  class="btn btn-warning btn-sm" href="?m=DataPendaftar&tipe=tambah">TF</a>	
                <a style="float:left; margin-right: 10px;"  class="btn btn-info btn-sm" href="?m=DataPendaftar&tipe=tambah">TI</a>	
                <a style="float:left; margin-right: 10px;"  class="btn btn-danger btn-sm" href="?m=DataPendaftar&tipe=tambah">TKP</a>	
                <a style="float:left; margin-right: 10px;"  class="btn btn-success btn-sm" href="?m=DataPendaftar&tipe=tambah">TL</a>	
                <a style="float:left; margin-right: 10px;"  class="btn btn-warning btn-sm" href="?m=DataPendaftar&tipe=tambah">TM</a>	
                <a style="float:left; margin-right: 10px;"  class="btn btn-danger btn-sm" href="?m=DataPendaftar&tipe=tambah">TO</a>	
				<br>
				<br>
				<br>
				<h3 class="card-title">Semua Data Pendaftar</h3>
				<br>
				<hr> -->
				
				<form style="width: 100%" class="form-inline mb-4 mt-1 ml-auto" method="POST" action="?m=DataPendaftar">
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
							<th rowspan="3">No</th>
							<th rowspan="3">Tgl. Daftar</th>
							<th rowspan="3">NISN</th>
							<th rowspan="3">No. Formulir</th>
							<th rowspan="3">Kode Jurusan</th>
							<th rowspan="3">Nama Pendaftar</th>
							<th rowspan="3">Asal Sekolah</th>
							<th rowspan="3">Jenis Kelamin</th>
							<th rowspan="3">Alamat</th>
							<th rowspan="3">Yang Bertanggung Jawab</th>
							<th colspan="6" style="text-align: center;">B. Indonesia</th>
							<th colspan="6" style="text-align: center;">Matematika</th>
							<th colspan="6" style="text-align: center;">B. Inggris</th>
							<th colspan="6" style="text-align: center;">IPA</th>
							<th rowspan="3">Edit</th>
							<th rowspan="3">Hapus</th>
						</tr>
						<tr>
							<th colspan="2" style="text-align: center;">VIII 1</th>
							<th colspan="2" style="text-align: center;">VIII 2</th>
							<th colspan="2" style="text-align: center;">IX 1</th>
							<th colspan="2" style="text-align: center;">VIII 1</th>
							<th colspan="2" style="text-align: center;">VIII 2</th>
							<th colspan="2" style="text-align: center;">IX 1</th>
							<th colspan="2" style="text-align: center;">VIII 1</th>
							<th colspan="2" style="text-align: center;">VIII 2</th>
							<th colspan="2" style="text-align: center;">IX 1</th>
							<th colspan="2" style="text-align: center;">VIII 1</th>
							<th colspan="2" style="text-align: center;">VIII 2</th>
							<th colspan="2" style="text-align: center;">IX 1</th>
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
							if(isset($_POST['pencarian'])){
								// query pencarian data
								$keyword = $_POST['keyword'];
								$sql = "SELECT * from pendaftar where nama like '%".$keyword."%' OR no_formulir like '%".$keyword."%'";
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
							<td><?php echo $d['BIN_VIII_1_P']; ?></td>
							<td><?php echo $d['BIN_VIII_1_K']; ?></td>
							<td><?php echo $d['BIN_VIII_2_P']; ?></td>
							<td><?php echo $d['BIN_VIII_2_K']; ?></td>
							<td><?php echo $d['BIN_IX_1_P']; ?></td>
							<td><?php echo $d['BIN_IX_1_K']; ?></td>
							<td><?php echo $d['MTK_VIII_1_P']; ?></td>
							<td><?php echo $d['MTK_VIII_1_K']; ?></td>
							<td><?php echo $d['MTK_VIII_2_P']; ?></td>
							<td><?php echo $d['MTK_VIII_2_K']; ?></td>
							<td><?php echo $d['MTK_IX_1_P']; ?></td>
							<td><?php echo $d['MTK_IX_1_K']; ?></td>
							<td><?php echo $d['BING_VIII_1_P']; ?></td>
							<td><?php echo $d['BING_VIII_1_K']; ?></td>
							<td><?php echo $d['BING_VIII_2_P']; ?></td>
							<td><?php echo $d['BING_VIII_2_K']; ?></td>
							<td><?php echo $d['BING_IX_1_P']; ?></td>
							<td><?php echo $d['BING_IX_1_K']; ?></td>
							<td><?php echo $d['IPA_VIII_1_P']; ?></td>
							<td><?php echo $d['IPA_VIII_1_K']; ?></td>
							<td><?php echo $d['IPA_VIII_2_P']; ?></td>
							<td><?php echo $d['IPA_VIII_2_K']; ?></td>
							<td><?php echo $d['IPA_IX_1_P']; ?></td>
							<td><?php echo $d['IPA_IX_1_K']; ?></td>
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

	