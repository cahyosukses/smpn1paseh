<?php
	if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$id_mapel = $_GET['id'];
	$nip = $_GET['nip'];
	$nis = $_SESSION['nis'];
?>
<h2>Masuk Kelas</h2>
<div class="grid_8 well">
	<div class="clearfix">.
		<?php
			$selectMapel = mysql_query("SELECT * FROM tbl_data_mapel WHERE id = '$id_mapel'");
			$dataMapel = mysql_fetch_array($selectMapel);
		?>
		<h3>Mata pelajaran <?php echo $dataMapel['mapel']; ?></h3>
		<div class="grid_8">
			<!-- BEGIN HORIZONTAL TABS -->
			<div class="tabs">
				<div class="tab-menu clearfix">
					<ul>
						<li><a href="#materi">Materi</a></li>
						<li><a href="#tugas">Tugas</a></li>
						<li><a href="#pengumuman">Pengumuman</a></li>
						<li><a href="#diskusi">Diskusi</a></li>
					</ul>
				</div>
				<div class="tab-wrapper">
					<!-- TAB MATERI -->
					<div id="materi" class="tab">
						<div class="clearfix">
							<table class="zebra" id="dataTabel">
							    <thead>
							    <tr>
							        <th>#</th>        
							        <th>Mata Pelajaran</th>
							        <th>Nama Guru</th>
							        <th>Aksi</th>
							    </tr>
							    </thead>
							    <?php
							    	include_once("../koneksi.php");
									koneksi();
							    	$i=1;
							    	$selectKelas = mysql_query("SELECT m.judul, g.nama, m.nama_file FROM tbl_pembelajaran_materi m JOIN tbl_data_mapel mapel ON m.id_mapel=mapel.id JOIN tbl_data_guru g ON m.nip = g.nip WHERE m.id_mapel = '$id_mapel'");
							    	while ($data = mysql_fetch_array($selectKelas)) {
							    ?>   
								    <tr>
								        <td><?php echo $i; ?></td>        
					        			<td><?php echo $data['judul']; ?></td>
					        			<td><?php echo $data['nama']; ?></td>
								        <td align="center">
								        	<a href="../assets/function/downloadMateri.php?nama_file=<?php echo $data['nama_file']; ?>" title="download"><i class="icon-download icon-2x"></i></a>
							        		
							        	</td>
								    </tr>    
						      	<?php
							    	$i++;
							    	}
					    		?>
							</table>
						</div>
					</div>
					<!-- END TAB MATERI -->
					<!-- TAB TUGAS -->
					<div id="tugas" class="tab">
						<div class="clearfix">
							<h3 align="center">KIRIM TUGAS</h3>
							<div class="hr-edited hr-dashed"></div>
							<table class="zebra">
								<thead>
									<tr>
										<th width="40%">Nama File</th>
										<th width="60%" align="center"><b style="color:red">**</b> File tidak boleh lebih dari 20mb <br/><b style="color:red">**</b>file yang di izinkan: *.jpg,*.jpeg, *.pdf, *.doc, *.docx, *.xls, *.xlsx, *.ppt, *.pptx, *.png</th>
									</tr>
								</thead>
								<tbody>
									<form method="post" action="../siswa/act.php?act=kirim_tugas" id="contact-form" class="contact-form" enctype='multipart/form-data'>
										<tr>
											<td>
													<input type="hidden" name="nis" value="<?php echo $nis ?>">
													<input type="hidden" name="mapel" value="<?php echo $id_mapel ?>">
													<input type="hidden" name="nip" value="<?php echo $nip ?>">
													<input type="text" name="judul">
													<div class="alert alert-info">
														<i class="icon-info-sign"></i>
														format kelas_mapel_tahunajarangenap/ganjil. Contoh: VII_MATEMATIKA_2011GENAP
													</div>
												
											</td>
											<td align="center">
												<input type="file" name="tugas" id="file" onchange="check_file()"/><br/><br/>
												<input type="submit" name="btnKirim" class="btn" id="btn" value="Kirim">
											</td>
										</tr>
									</form>
								</tbody>
							</table>
							<br/>
							<h3 align="center">TUGAS Yang Telah Dikirim</h3>
							<table class="zebra" id="dataTabel2">
							    <thead>
							    <tr>
							        <th>#</th>        
							        <th>Tanggal Upload</th>
							        <th>Nama File</th>
							        <th>Nilai</th>
							        <th>Aksi</th>
							    </tr>
							    </thead>
							    <?php
							    	$i = 1;
							    	$selectTugas = mysql_query("SELECT * FROM tbl_tugas_siswa WHERE nis = '$nis' and id_mapel = '$id_mapel'");
							    	while($dataTugas = mysql_fetch_array($selectTugas))
							    	{
							    ?>
									    <tr>
									        <td><?php echo $i; ?></td>        
									        <td><?php echo converter($dataTugas['tgl']); ?></td>
									        <td><?php echo $dataTugas['judul']; ?></td>
									        <td><?php echo ($dataTugas['nilai'] == 0)?"-":$dataTugas['nilai']; ?></td>
									        <td align="center">
								        	<a href="../assets/function/downloadTugas.php?nama_file=<?php echo $dataTugas['nama_file'] ?>"  title="download"><i class="icon-download icon-2x"></i></a>
							        		<a href='../siswa/act.php?act=hapus_tugas&amp;id=<?php echo $dataTugas['id']; ?>&amp;nip=<?php echo $nip ?>&amp;id_mapel=<?php echo $id_mapel ?>' style="color:red" title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus Tugas ini ?')">
	   											<i class="icon-trash icon-2x"></i>
	   										</a>
							        	</td>
									    </tr>   
								<?php
									$i++;
									}
								?>       
							</table>
						</div>
					</div>
					<!-- END TAB TUGAS -->
					<!-- TAB PENGUMUMAN -->
					<div id="pengumuman" class="tab">
						<div class="clearfix">
							<div class="grid_7">
								<?php
									$selectPengumuman = mysql_query("SELECT * FROM tbl_info_pengumuman_guru WHERE nip = '$_GET[nip]' AND id_mapel = '$_GET[id]'");
									while ($data = mysql_fetch_array($selectPengumuman)) {
								?>
										<!-- begin post heading -->
										<header class="entry-header clearfix">
											<div class="entry-header-inner">
												<h2 class="entry-title" align="left"><a href="#"><?php echo $data['judul'] ?></a></h2>
												<p class="post-meta">
													<span class="post-meta-cats"><i class="icon-tag"></i><a href="#"><?php echo converter($data['tgl']) ?></a></span>
												</p>
											</div>
											<div><?php echo $data['pengumuman'] ?></div>
										</header>
										<!-- end post heading -->
										<div class="hr-edited hr-dashed"></div>
								<?php
									}
								?>
							</div>
							
						</div>
					</div>
					<!-- END TAB PENGUMUMAN -->
					<!-- TAB DISKUSI -->
					<div id="diskusi" class="tab">
						<div class="clearfix">
							<h3><i class="icon-comment"></i> Diskusi</h3>
							<div class="hr-edited hr-dashed"></div>
							<div class="grid_7">
								<div class="comments-wrapper">
									<!-- BEGIN COMMENTS LIST -->
									<ol class="commentlist">
										<?php
											$selectDiskusi = mysql_query("SELECT * FROM tbl_pembelajaran_diskusi WHERE id_mapel = '$id_mapel' AND nip = '$nip' ORDER BY waktu");
											while ($data = mysql_fetch_array($selectDiskusi)) 
											{
												if ($data['is_guru'] == true ) 
												{
												
													$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$data[pengirim]'");
													$dataGuru = mysql_fetch_array($selectGuru);
										?>
												<li class="comment">
													<!-- BEGIN SINGLE COMMENT -->
													<div class="comment-wrapper">
														<div class="comment-author vcard">
															<p class="gravatar"><img src="../directory_files/foto_guru/<?php echo $dataGuru['foto'] ?>" alt="" width="60" height="60" /></p>
															<span class="author"><?php echo $dataGuru['nama'] ?></span>
														</div>
														<div class="comment-meta">
															<div class="comment-meta"><?php echo converter($data['waktu']) ?></div>
														</div>
														
														<div class="comment-body">
															<?php echo $data['isi'] ?>
														</div>
													</div>
													<!-- END SINGLE COMMENT -->
												</li>
												<div class="clearfix"></div>
												<?php
												}
												else
												{
													$selectSiswa = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$data[pengirim]'");
													$dataSiswa = mysql_fetch_array($selectSiswa);
													if ($data['pengirim'] == $nis) {
														$sendiri = "sendiri";
														$send = true;
													}
													else
													{
														$send = false;
														$sendiri = "";
													}
												?>
												<li class="comment <?php echo $sendiri; ?>">
													<!-- BEGIN SINGLE COMMENT -->
													<div class="comment-wrapper">
														<?php
															if ($send) {
																
															}
															else
															{
														?>
															<div class="comment-author vcard">
																<p class="gravatar"><img src="../directory_files/foto_siswa/<?php echo $dataSiswa['foto'] ?>" alt="" width="60" height="60" /></p>
																<span class="author"><?php echo $dataSiswa['nama'] ?></span>
															</div>
														<?php
															}
														?>
														<div class="comment-meta">
															<div class="comment-meta"><?php echo converter($data['waktu']) ?></div>
														</div>
														
														<div class="comment-body">
															<?php echo $data['isi'] ?>
														</div>
													</div>
													<!-- END SINGLE COMMENT -->
												</li>
												<div class="clearfix"></div>
												<?php
												} //END IF
											} //END WHILE
										?>
									</ol>
									<!-- END COMMENTS LIST -->
									
								</div>
								<!-- END COMMENTS -->
							</div>
							<div class="grid_7">
								<form method="POST" action="../siswa/act.php?act=chating">
									<input type="hidden" name="nis" value="<?php echo $nis ?>">
									<input type="hidden" name="nip" value="<?php echo $nip ?>">
									<input type="hidden" name="id_mapel" value="<?php echo $id_mapel ?>">
									<textarea name="pesan" style="width:550px"></textarea>
									<input type="submit" name="submit" id="submit" value="Kirim" style="float:right">
								</form>
							</div>
						</div>
						
					</div>
					<!-- END TAB DISKUSI -->
				</div>
			</div>
			<!-- END HORIZONTAL TABS -->
		</div>
	</div>
	
</div>

<!-- END ISSET LOGIN -->
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../frontend/index.php'> &nbsp; Login </a></h4>
		  </div>";
}