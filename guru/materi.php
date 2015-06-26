<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$id_mapel = $_GET['id_mapel'];
?>
<h2>Materi</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<h3 align="center">KIRIM MATERI</h3>
		<div class="hr-edited hr-dashed"></div>
		<div class="info-box">
			<form id="defaultForm" class='form-horizontal' method='post' action='../guru/act.php?act=tambah_materi&amp;id_mapel=<?php echo $id_mapel ?>' id='frm' enctype='multipart/form-data' autocomplete='off' >
				<table class="zebra">
					<thead>
						<tr>
							<th width="40%">Judul Materi</th>
							<td width="60%" align="center"><b style="color:red">**</b> File tidak boleh lebih dari 20mb</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<form>
									<input type="hidden" name="nip" value="<?php echo $_SESSION['nip']; ?>">
									<input type="text" name="judul">
									<!-- <div class="field">
										<label for="contact-message">Mata Pelajaran:</label>
										<select name="mapel" id="mapel">
											<option value="">Pilih mata pelajaran</option>
											<?php
												// $selectMapel = mysql_query("SELECT * FROM tbl_detail_guru d JOIN tbl_data_mapel m ON d.id_mapel = m.id WHERE d.nip = '$_SESSION[nip]'");
												// while ($data = mysql_fetch_array($selectMapel)) {
												// 	echo "<option value='$data[id_mapel]'>$data[mapel]</option>";
												// }
											?>
										</select>
									</div> -->
									<div class="alert alert-info">
										<i class="icon-info-sign"></i>
										Isi dengan format kelas_mapel_judul. Contoh: VII_MATEMATIKA_ALJABAR
									</div>
								</form>
							</td>
							<td align="center">
								<input type="file" name="materi"/><br/><br/>
								<input type="submit" name="btnKirim" class="btn" value="Kirim">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="hr-edited hr-dashed"></div>
		<h3 align="center">Materi Yang Telah Dikirim</h3>
		<div class="info-box">
			<table class="zebra" id="dataTabel">
			    <thead>
			    <tr>
			        <th>#</th>        
			        <th>Materi</th>
			        <th>Tanggal Upload</th>
			        <th>Mata Pelajaran</th>
			        <th>Aksi</th>
			    </tr>
			    </thead>
			    <?php
			    	
			    	$i=1;
			    	$nip = $_SESSION['nip'];
			    	$selectMateri = mysql_query("SELECT m.id, m.tgl, m.judul, m.nama_file, mp.mapel, m.nip  FROM tbl_pembelajaran_materi m JOIN tbl_data_guru g ON m.nip = g.nip JOIN tbl_data_mapel mp ON m.id_mapel = mp.id WHERE m.nip = '$nip' AND m.id_mapel = '$id_mapel' ORDER BY m.tgl DESC ");
			    	while ($data = mysql_fetch_array($selectMateri)) {
			    ?>   
					    <tr>
					        <td><?php echo $i; ?></td>        
					        <td><?php echo $data['judul']; ?></td>
					        <td><?php echo $data['tgl']; ?></td>
					        <td><?php echo $data['mapel']; ?></td>
					        <td>
					        	<a href="../assets/function/downloadMateri.php?nama_file=<?php echo $data['nama_file'] ?>" title="download"><i class="icon-download icon-2x"></i></a>
			        			<a href="../guru/act.php?act=hapus_materi&amp;id=<?php echo $data['id']; ?>&amp;id_mapel=<?php echo $id_mapel; ?>" style="color:red;" onClick="return confirm('Anda yakin ingin menghapus materi ini ?')" title="delete"><i class="icon-trash icon-2x"></i></a>
		        			</td>
					    </tr>        
			    <?php
			    	$i++;
			    	}
			    ?>
			</table>
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