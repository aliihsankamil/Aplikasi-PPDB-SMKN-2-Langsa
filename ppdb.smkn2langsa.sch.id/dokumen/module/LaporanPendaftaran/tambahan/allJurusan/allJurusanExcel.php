<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=LaporanPendaftaran.xls");
?>
                <center><h1>Laporan Pendafataran Urut Berdasarkan Jurusan</h1></center>
                <table style="font-size:9pt;" border="1">
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
                            include "../../../../../inc/config.php";
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