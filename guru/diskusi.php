<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$nip = $_SESSION['nip'];
	$selectMapel2 = mysql_query("SELECT * FROM tbl_data_mapel WHERE id = '$_GET[id_mapel]'");
	$dataMapel = mysql_fetch_array($selectMapel2);
?>
<h2>Forum Diskusi</h2>
<div class="grid_8 well">
	<div class="hr-edited hr-dashed"></div>
	<div class="info-box">
		<div class="clearfix">
			<h3><i class="icon-comment"></i> Diskusi Mata pelajaran <?php echo $dataMapel['mapel']; ?></h3>
			<div class="hr-edited hr-dashed"></div>
			<div class="grid_7">
				<div class="comments-wrapper">
					<!-- BEGIN COMMENTS LIST -->
					<ol class="commentlist">
						<?php
							$selectDiskusi = mysql_query("SELECT * FROM tbl_pembelajaran_diskusi WHERE id_mapel = '$_GET[id_mapel]' AND nip = '$nip' ORDER BY waktu");
							while ($data = mysql_fetch_array($selectDiskusi)) {
								if ($data['is_guru'] == true ) 
								{
									$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$data[pengirim]'");
									$dataGuru = mysql_fetch_array($selectGuru);
								
						?>
								<li class="comment sendiri">
									<!-- BEGIN SINGLE COMMENT -->
									<div class="comment-wrapper">
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
								?>
								<li class="comment">
									<!-- BEGIN SINGLE COMMENT -->
									<div class="comment-wrapper">
										<div class="comment-author vcard">
											<p class="gravatar"><img src="../directory_files/foto_siswa/<?php echo $dataSiswa['foto'] ?>" alt="" width="60" height="60" /></p>
											<span class="author"><?php echo $dataSiswa['nama'] ?></span>
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
							} //END while
						?>
					</ol>
					<!-- END COMMENTS LIST -->
				</div>
				<!-- END COMMENTS -->
			</div>
			<div class="grid_7">
				<form method="POST" action="../guru/act.php?act=chating">
					<input type="hidden" name="nip" value="<?php echo $nip ?>">
					<input type="hidden" name="id_mapel" value="<?php echo $_GET['id_mapel'] ?>">
					<textarea name="pesan" style="width:550px"></textarea>
					<input type="submit" name="submit" id="submit" value="Kirim" style="float:right">
				</form>
			</div>
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