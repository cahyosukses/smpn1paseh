<!-- BEGIN PAGE TITLE -->
<div id="page-title" class="page-title">
	<div class="container clearfix">
		<div class="grid_12">
			<div class="page-title-holder clearfix">
				<h1>Listing Siswa</h1>
				<!-- Project Feed Filter -->
			</div>
		</div>
	</div>
</div>
<!-- END PAGE TITLE -->
	<div class="clearfix">
		<div class="grid_12">
			<table class="zebra" id="dataTabel">
		    <thead>
		    <tr>
		        <th>#</th>        
		        <th>NIS</th>
		        <th>Nama Guru</th>
		        <th>Email</th>

		    </tr>
		    </thead>
		    <?php
		    	include_once("../koneksi.php");
				koneksi();
		    	$i=1;
		    	$selectGuru = mysql_query("SELECT * FROM tbl_data_siswa ORDER BY nama");
		    	while ($data = mysql_fetch_array($selectGuru)) {
		    ?>   
				    <tr>
				        <td><?php echo $i; ?></td>        
				        <td><?php echo $data['nis']; ?></td>
				        <td><?php echo $data['nama']; ?></td>
				        <td><?php echo $data['email']; ?></td>
				    </tr>        
		    <?php
		    	$i++;
		    	}
		    ?>
		</table>
		</div>
	</div>      	
			      	
						
