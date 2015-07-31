<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$id_mapel = $_GET['id_mapel'];
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
			<form method="post" action="../guru/act.php?act=buat_diskusi" id="contact-form" class="contact-form" enctype='multipart/form-data'>
				<tr>
					<td>
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
				        		<a href="?menu=beranda_guru&amp;aksi=diskusi_detail&amp;id_diskusi=<?php echo $dataDiskusi['id_diskusi'] ?>&amp;id_mapel=<?php echo $id_mapel ?>&amp;id_user=<?php echo $nip ?>&amp;nip=<?php echo $nip ?>">Lihat</a>
				        		<?php
				        			if ($dataDiskusi['id_pembuat'] == $nip) {
				        		?>
				        			<a href='../guru/act.php?act=hapus_diskusi&amp;id=<?php echo $dataDiskusi['id_diskusi']; ?>&amp;nip=<?php echo $nip ?>&amp;id_mapel=<?php echo $id_mapel ?>' style="color:red" title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus Diskusi ini ?')">
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
			<div class="grid_7">
				<form method="POST" action="../guru/act.php?act=chating">
					<input type="hidden" name="nip" value="<?php echo $nip ?>">
					<input type="hidden" name="id_mapel" value="<?php echo $_GET['id_mapel'] ?>">
					<textarea name="pesan" style="width:550px" required></textarea>
					<input type="submit" name="submit" id="submit" value="Kirim" style="float:right" >
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