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
		<a href='?modul=kelas_tambah' class='btn btn-success btn-sm margin-right'>
			<i class='fa fa-plus'></i>&nbsp;Tambah
		</a>
	</div>
</div>
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th>#</th>
        <th>Kelas</th>
        <th>Detil Kelas</th>
        <th>Wali Kelas</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	include_once("../koneksi.php");
    	koneksi();
    	$i=1;
	    $select = mysql_query("SELECT k.id, k.kelas, k.detil_kelas, g.nama FROM tbl_data_kelas k JOIN tbl_data_guru g ON k.nip = g.nip");
	    while ($data = mysql_fetch_array($select)) {
		    ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo strtoupper($data['kelas']); ?></td>
				<td><?php echo strtoupper($data['detil_kelas']); ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td class="ha">
				<a href="?modul=kelas_ubah&amp;id=<?php echo $data['id']; ?>" class='btn btn-success btn-xs' title='Edit Data'>
	            	<i class='fa fa-edit'></i>
	            </a>
	          	<a href='modul/mod_kelas/act.php?act=hapus&amp;id=<?php echo $data['id']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
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