<!-- BEGIN PAGE TITLE -->
<div id="page-title" class="page-title">
	<div class="container clearfix">
		<div class="grid_12">
			<div class="page-title-holder clearfix">
				<h1>Listing Materi</h1>
				<!-- Project Feed Filter -->
			</div>
		</div>
	</div>
</div>
<!-- END PAGE TITLE -->
<!-- BEGIN CONTENT WRAPPER -->
	<!-- Search Widget -->
	<!-- /Search Widget -->
	<div class="clearfix">
		<div class="grid_12">
		<?php
		?>	
		<table class="zebra" id="dataTabel">
		    <thead>
		    <tr>
		        <th>#</th>        
		        <th>Judul</th>
		        <th>Tanggal Upload</th>
		        <th>Mata Pelajaran</th>
		        <th>Nama Guru</th>
		        <th>Download</th>
		    </tr>
		    </thead>
		    <tfoot>
		    <tr>
		        <td>&nbsp;</td>        
		        <td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		    </tfoot> 
		    <?php
		    	include_once("../koneksi.php");
		    	include_once("../assets/function/fungsi.php");
				koneksi();
		    	$i=1;
				$selectMateri = mysql_query("SELECT m.id, m.tgl, m.judul, m.nama_file, mp.mapel, m.nip, g.nama FROM tbl_pembelajaran_materi m JOIN tbl_data_guru g ON m.nip = g.nip JOIN tbl_data_mapel mp ON m.id_mapel = mp.id ORDER BY m.tgl DESC ");

		    	while ($data = mysql_fetch_array($selectMateri)) {
		    ?>   
				    <tr>
				        <td><?php echo $i; ?></td>        
				        <td><?php echo $data['judul']; ?></td>
				        <td><?php echo $data['tgl']; ?></td>
				        <td><?php echo $data['mapel']; ?></td>
				        <td><?php echo $data['nama']; ?></td>
			         	<td>
				        	<a href="../directory_files/materi/<?php echo $data['nama_file']; ?>" title="download"><i class="icon-download icon-2x"></i></a>
	        			</td>
				    </tr>        
		    <?php
		    	$i++;
		    	}
		    ?>
		</table>
		</div>
	</div>
