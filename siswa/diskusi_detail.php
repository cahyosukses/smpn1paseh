<?php
	if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
	$nip = $_GET['nip'];
	$id_diskusi = $_GET['id_diskusi'];
	$id_mapel = $_GET['id_mapel'];
	$selectDiskusi = mysql_query("SELECT * FROM tbl_diskusi WHERE id_diskusi = '$id_diskusi'");
	$dataDiskusi = mysql_fetch_array($selectDiskusi);
	$selectMapel = mysql_query("SELECT * FROM tbl_data_mapel WHERE id = '$id_mapel'");
	$dataMapel = mysql_fetch_array($selectMapel);
?>
		<h2>Diskusi Mata Pelajaran <?php $dataMapel['mapel'] ?></h2>
		<div class="grid_8 well">
			<div class="info-box">
				<h3 align="center"><?php echo $dataDiskusi['judul'] ?></h3>
				<div class="comments-wrapper">
					<!-- BEGIN COMMENTS LIST -->
					<ol class="commentlist">
					<li class="comment">
						<!-- BEGIN SINGLE COMMENT -->
						<div class="comment-wrapper">
							<div class="comment-author vcard">
								<span class="author">
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
								</span>
							</div>
							<div class="comment-meta">
								<div class="comment-meta"><?php echo converter($dataDiskusi['tgl_dibuat']) ?></div>
							</div>
							
							<div class="comment-body">
								<?php echo $dataDiskusi['deskripsi'] ?>
							</div>
						</div>
						<!-- END SINGLE COMMENT -->
					</li>
					</ol>
				</div>
			</div>
			<div class="info-box"  >
				<div class="clearfix">
					<div class="comments-wrapper" style="overflow:auto; max-height:500px">
						<!-- BEGIN COMMENTS LIST -->
						<ol class="commentlist">
						<li class="comment">
							<?php
								$selectDetail = mysql_query("SELECT * FROM tbl_diskusi_detail WHERE id_diskusi = '$id_diskusi'");
								while ($data = mysql_fetch_array($selectDetail)) {
							?>
								<!-- BEGIN SINGLE COMMENT -->
								<div class="comment-wrapper">
									<div class="comment-author vcard">
										<span class="author">
											<?php 
												if ($data['is_guru'] == true) 
									    		{
									    			$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$data[id_user]'");
									    			$dataGuru = mysql_fetch_array($selectGuru);
									    			echo $dataGuru['nama']." (Guru)";
									    		}
									    		else
									    		{
									    			$selectSiswa = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$data[id_user]'");
									    			$dataSiswa = mysql_fetch_array($selectSiswa);
									    			echo $dataSiswa['nama']." (Siswa)";
									    		}
											?>
										</span>
									</div>
									<div class="comment-meta">
										<div class="comment-meta"><?php echo converter($data['tgl']) ?></div>
									</div>
									
									<div class="comment-body">
										<?php echo $data['komen'] ?>
									</div>
								</div>
								<!-- END SINGLE COMMENT -->
								<div class="clearfix"></div>
							<?php
								}
							?>
						</li>
						</ol>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="info-box">
				<form method="POST" action="../siswa/act.php?act=komen_diskusi">
					<input type="hidden" name="id_diskusi" value="<?php echo $_GET['id_diskusi'] ?>">
					<input type="hidden" name="nis" value="<?php echo $_GET['id_user'] ?>">
					<input type="hidden" name="nip" value="<?php echo $_GET['nip'] ?>">
					<input type="hidden" name="id_mapel" value="<?php echo $_GET['id_mapel'] ?>">
					<textarea name="pesan" style="width:550px" required></textarea>
					<a href="?menu=beranda_siswa&aksi=kelas&id=<?php echo $_GET['id_mapel'] ?>&nip=<?php echo $_GET['nip'] ?>" class="red" style="float:right"> Back </a>
					<input type="submit" name="submit" id="submit" value="Kirim" style="float:right">
				</form>
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