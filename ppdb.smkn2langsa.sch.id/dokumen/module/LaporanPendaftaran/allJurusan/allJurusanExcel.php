<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=LaporanPendaftaran.xls");
?>
                <center><h1>Laporan Pendafataran Urut Berdasarkan Jurusan</h1></center>
                <table>
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
                            include "../../../../inc/config.php";
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
							<td style="mso-number-format:\@;"><?php echo $d['nisn']; ?></td>
							<td style="mso-number-format:\@;"><?php echo $d['no_formulir']; ?></td>
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

						?>
					</tbody>
				</table>