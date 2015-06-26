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
		<a href='?modul=pengumuman_tambah' class='btn btn-success btn-sm margin-right'>
			<i class='fa fa-plus'></i>&nbsp;Tambah
		</a>
	</div>
</div>
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th>#</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Tanggal/jam</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
		<?php
    	include_once("../koneksi.php");
    	include_once("../assets/function/fungsi.php");
    	koneksi();
    	$i=1;
	    $select = mysql_query("SELECT * FROM tbl_info_pengumuman_admin");
	    while ($data = mysql_fetch_array($select)) {
		    ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo ucwords($data['judul']); ?></td>
				<td><?php echo $data['pengumuman']; ?></td>
				<td><?php echo converter($data['tgl']); ?></td>
				<td class="ha">
				<a href="?modul=pengumuman_ubah&amp;id=<?php echo $data['id']; ?>" class='btn btn-success btn-xs' title='Edit Data'>
	            	<i class='fa fa-edit'></i>
	            </a>
	          	<a href='modul/mod_pengumuman/act.php?act=hapus&amp;id=<?php echo $data['id']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
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