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
		<a href='?modul=detail_guru_tambah' class='btn btn-success btn-sm margin-right'>
			<i class='fa fa-plus'></i>&nbsp;Tambah
		</a>
	</div>
</div>
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Guru</th>
        <th>Mapel</th>
        <th>Kelas</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
	    	include_once("../koneksi.php");
	    	include_once("../assets/function/fungsi.php");
	    	koneksi();
	    	$i=1;
		    $select = mysql_query("SELECT d.id_detail, g.nama, m.mapel, k.kelas, k.detil_kelas FROM tbl_detail_guru d
		    													JOIN tbl_data_kelas k ON d.id_kelas = k.id
		    													JOIN tbl_data_mapel m ON d.id_mapel = m.id
		    													JOIN tbl_data_guru g ON d.nip = g.nip");
		    while ($data = mysql_fetch_array($select)) {
    	?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['mapel']; ?></td>
				<td><?php echo $data['kelas'].$data['detil_kelas']; ?></td>
				<td class="ha">
				<a href='?modul=detail_guru_ubah&amp;id=<?php echo $data['id_detail']; ?>' class='btn btn-success btn-xs' title='Edit Data'>
	            	<i class='fa fa-edit'></i>
	            </a>
	          	<a href='modul/mod_detail_guru/act.php?act=hapus&amp;id=<?php echo $data['id_detail']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
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