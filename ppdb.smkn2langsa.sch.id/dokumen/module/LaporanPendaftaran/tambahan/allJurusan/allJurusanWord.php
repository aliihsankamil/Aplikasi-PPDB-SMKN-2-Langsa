<head>
                    <style>
                        body{
                            font-family: calibri;
                        }
                        table{
                            border-collapse: collapse;
                            font-size:11pt;
                            margin: 20px auto;
                        }
                        table th{border: 1px solid #aaa; font-size: 11pt; height: 40px;}
                        table td{
                            border: 1px solid #ddd;
                            text-align: left;
                            font-size: 10pt;
                            padding: 1px;
                        }
                    </style>
                </head>
                <?php
                    header("Content-type: application/force-download");
                    header("Cache-Control: no-cache, must-revalidate");
                    header("Content-Disposition: attachment; filename=LaporanPendaftaran.doc");
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
							<td><?php echo $d['nisn']; ?></td>
							<td><?php echo $d['no_formulir']; ?></td>
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