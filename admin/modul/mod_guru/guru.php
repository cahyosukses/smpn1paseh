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
		<a href='?modul=guru_import' class='btn btn-primary btn-sm margin-right'>
			<i class='fa fa-file-excel-o'></i>&nbsp;Import dari Excel
		</a>
		<a href='?modul=guru_tambah' class='btn btn-success btn-sm margin-right'>
			<i class='fa fa-plus'></i>&nbsp;Tambah
		</a>
	</div>
</div>
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th width="5%">#</th>
        <th>Nama</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	include_once("../koneksi.php");
    	include_once("../assets/function/fungsi.php");
    	koneksi();
    	$i=1;
	    $select = mysql_query("SELECT * FROM tbl_data_guru");
	    while ($data = mysql_fetch_array($select)) {
		    ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo ucwords($data['nama']); ?></td>
				<td><?php echo ucwords($data['tempat_lahir']).", ".converter($data['tanggal_lahir']); ?></td>
				<td><?php echo ucwords($data['telepon']); ?></td>
				<td><?php echo ucwords($data['alamat']); ?></td>
				<td class="ha">
				<a href="?modul=guru_ubah&amp;id=<?php echo $data['nip']; ?>" class='btn btn-success btn-xs' title='Edit Data'>
	            	<i class='fa fa-edit'></i>
	            </a>
	          	<a href='modul/mod_guru/act.php?act=hapus&amp;id=<?php echo $data['nip']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
	   				<span class='glyphicon glyphicon-trash'></span>
	   			</a>
	   			<!-- <a href='modul/mod_guru/act.php?act=non_aktif&amp;id=<?php //echo $data['nip']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Non Aktifkan Guru ini ?')">
	   				<span>Non Aktifkan</span>
	   			</a> -->
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