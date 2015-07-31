<?php
	if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$id_mapel = $_GET['id'];
	$nip = $_GET['nip'];
	$nis = $_SESSION['nis'];
?>
<h2>Kelas yang dipilih</h2>
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
							    	$selectKelas = mysql_query("SELECT mapel.mapel, g.nama, m.nama_file FROM tbl_pembelajaran_materi m JOIN tbl_data_mapel mapel ON m.id_mapel=mapel.id JOIN tbl_data_guru g ON m.nip = g.nip WHERE m.id_mapel = '$id_mapel'");
							    	while ($data = mysql_fetch_array($selectKelas)) {
							    ?>   
								    <tr>
								        <td><?php echo $i; ?></td>        
					        			<td><?php echo $data['mapel']; ?></td>
					        			<td><?php echo $data['nama']; ?></td>
								        <td align="center">
									        <?php
									        	$namaFile = $data['nama_file'];
									        	$arNamaFile = explode(".", $namaFile);
									        	$ext = $arNamaFile[1];
									        	if ($ext == "mp4") {
									        		?>
									        		<a href='javascript:;'  onClick="window.open('../directory_files/materi/<?php echo $namaFile ?>','scrollwindow','top=200,left=300,width=800,height=500')" title='download'>Lihat</a>
									        		<?php
									        	}
									        ?>
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
										<th width="60%" align="center"><b style="color:red">**</b> File tidak boleh lebih dari 20mb</th>
									</tr>
								</thead>
								<tbody>
									<form method="post" action="../siswa/act.php?act=kirim_tugas" id="contact-form" class="contact-form" enctype='multipart/form-data'>
										<tr>
											<td>
													<input type="hidden" name="nis" value="<?php echo $nis ?>">
													<input type="hidden" name="mapel" value="<?php echo $id_mapel ?>">
													<input type="hidden" name="nip" value="<?php echo $nip ?>">
													<input type="text" name="judul" required>
													<div class="alert alert-info">
														<i class="icon-info-sign"></i>
														format kelas_mapel_judul. Contoh: VII_MATEMATIKA_TUGAS1
													</div>
												
											</td>
											<td align="center">
												<input type="file" name="tugas"/ required><br/><br/>
												<input type="submit" name="btnKirim" class="btn" value="Kirim">
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
									        <?php
									        	$namaFile = $dataTugas['nama_file'];
									        	$arNamaFile = explode(".", $namaFile);
									        	$ext = $arNamaFile[1];
									        	if ($ext == "mp4") {
									        		?>
									        		<a href='javascript:;'  onClick="window.open('../directory_files/tugas/<?php echo $namaFile ?>','scrollwindow','top=200,left=300,width=800,height=500')" title='download'>Lihat</a>
									        		<?php
									        	}
									        ?>
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
							<form method="post" action="../siswa/act.php?act=buat_diskusi" id="contact-form" class="contact-form" enctype='multipart/form-data'>
								<tr>
									<td>
										<input type="hidden" name="nis" value="<?php echo $nis ?>">
										<input type="hidden" name="mapel" value="<?php echo $id_mapel ?>">
										<input type="hidden" name="nip" value="<?php echo $nip ?>">
										<div class="field">
											<label for="judul">Judul:</label>
											<input type="text" name="judul" required>
										</div>
										<div class="field">
											<label for="comments">Deskripsi:</label>
											<textarea name="deskripsi" id="comments" cols="20" rows="5" required></textarea>
										</div>
										<div class="button-wrapper">
											<input type="submit" name="btnKirim" class="btn" value="Buat Diskusi">
										</div>
									</td>
								</tr>
							</form>
							<br />
							<br />
							<br />
							<h3 align="center">Daftar Diskusi</h3>
							<table class="zebra" id="dataTabel2">
							    <thead>
							    <tr>
							        <th>#</th>        
							        <th>Judul Diskusi</th>
							        <th>Tanggal Dibuat</th>
							        <th>Dibuat Oleh</th>
							        <th>Aksi</th>
							    </tr>
							    </thead>
							    <?php
							    	$i = 1;
							    	$selectDiskusi = mysql_query("SELECT * FROM tbl_diskusi WHERE id_mapel = '$id_mapel' and nip = '$nip'");
							    	while($dataDiskusi = mysql_fetch_array($selectDiskusi))
							    	{
							    ?>
									    <tr>
									        <td><?php echo $i; ?></td>        
									        <td><?php echo $dataDiskusi['judul']; ?></td>
									        <td><?php echo converter($dataDiskusi['tgl_dibuat']); ?></td>
									        <td>
									        	<?php
									        		if ($dataDiskusi['is_guru'] == true) 
										    		{
										    			$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$dataDiskusi[id_pembuat]'");
										    			$dataGuru = mysql_fetch_array($selectGuru);
										    			echo $dataGuru['nama']." (Guru)";
										    		}
										    		else
										    		{
										    			$selectSiswa = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$dataDiskusi[id_pembuat]'");
										    			$dataSiswa = mysql_fetch_array($selectSiswa);
										    			echo $dataSiswa['nama']." (Siswa)";
										    		}
									        	?>
								        	</td>
									        <td align="center">
								        		<a href="?menu=beranda_siswa&amp;aksi=diskusi&amp;id_diskusi=<?php echo $dataDiskusi['id_diskusi'] ?>&amp;id_mapel=<?php echo $id_mapel ?>&amp;id_user=<?php echo $nis ?>&amp;nip=<?php echo $nip ?>">Lihat</a>
								        		<?php
								        			if ($dataDiskusi['id_pembuat'] == $nis) {
								        		?>
								        			<a href='../siswa/act.php?act=hapus_diskusi&amp;id=<?php echo $dataDiskusi['id_diskusi']; ?>&amp;nip=<?php echo $nip ?>&amp;id_mapel=<?php echo $id_mapel ?>' style="color:red" title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus Diskusi ini ?')">
			   											<i class="icon-trash icon-2x"></i>
			   										</a>
								        		<?php
								        			}
								        		?>
							        		</td>
									    </tr>   
								<?php
									$i++;
									}
								?>       
							</table>
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