<?php
	if(isset($_SESSION['login'])){
?>
<!-- ISSET LOGIN -->
<div class="well form-horizontal form-inline margin-bawah">
	<div class="form-group col-lg-6">
	</div>
	<div class="form-group">
    </div> 

	<div class="form-group pull-right">
		<a href='?modul=siswa_tambah' class='btn btn-success btn-sm margin-right'>
			<i class='fa fa-plus'></i>&nbsp;Tambah
		</a>
	</div>
</div>
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	include_once("../koneksi.php");
    	include_once("../assets/function/fungsi.php");
    	koneksi();
    	$i=1;
	    $select = mysql_query("SELECT * FROM tbl_data_siswa");
	    while ($data = mysql_fetch_array($select)) {
		    ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo ucwords($data['nama']); ?></td>
				<td><?php echo ucwords($data['tempat_lahir']).", ".converter($data['tanggal_lahir']); ?></td>
				<td><?php echo ucwords($data['telepon']); ?></td>
				<td><?php echo ucwords($data['alamat']); ?></td>
				<td class="ha">
				<a href="?modul=siswa_ubah&amp;id=<?php echo $data['nis']; ?>" class='btn btn-success btn-xs' title='Edit Data'>
	            	<i class='fa fa-edit'></i>
	            </a>
	          	<a href='modul/mod_siswa/act.php?act=hapus&amp;id=<?php echo $data['nis']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
	   				<span class='glyphicon glyphicon-trash'></span>
	   			</a>
				</td>
			</tr>
			<?php
			$i++;
		}
		?>
	</tbody>
</table>
<!-- END ISSET LOGIN -->
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../../index.php'> Login </a></h4>
		  </div>";
}