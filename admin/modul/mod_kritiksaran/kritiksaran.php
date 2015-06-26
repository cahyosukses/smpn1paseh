<?php
	if(isset($_SESSION['login'])){
?>
<!-- ISSET LOGIN -->
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Alamat Email</th>
        <th>Deskripsi</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	include_once("../koneksi.php");
    	koneksi();
    	$i=1;
	    $select = mysql_query("SELECT * FROM tbl_info_kritik_saran ORDER BY id DESC");
	    while ($data = mysql_fetch_array($select)) {
		    ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo ucwords($data['nama']); ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['komentar']; ?></td>
				<td class="ha">
	          	<a href='modul/mod_kritiksaran/act.php?act=hapus&amp;id=<?php echo $data['id']; ?>' class='btn btn-danger btn-xs' title='Delete Data' onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
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