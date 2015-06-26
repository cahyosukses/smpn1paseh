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
		<a href='?modul=detail_kelas_tambah' class='btn btn-success btn-sm margin-right'>
			<i class='fa fa-plus'></i>&nbsp;Tambah
		</a>
	</div>
</div>
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th>#</th>
        <th>Nim</th>
        <th>Nama Siswa</th>
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
		    $select = mysql_query("SELECT d.id, d.nis, s.nama, k.kelas, k.detil_kelas FROM tbl_detail_kelas d
		    													JOIN tbl_data_kelas k ON d.id_kelas = k.id
		    													JOIN tbl_data_siswa s ON d.nis = s.nis");
		    while ($data = mysql_fetch_array($select)) {
    	?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['nis']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['kelas'].$data['detil_kelas']; ?></td>
				<td class="ha">
				<a href='?modul=detail_kelas_ubah&amp;id=<?php echo $data['id']; ?>' class='btn btn-success btn-xs' title='Edit Data'>
	            	<i class='fa fa-edit'></i>
	            </a>
	          	<a href='modul/mod_detail_kelas/act.php?act=hapus&amp;id=<?php echo $data['id']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
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