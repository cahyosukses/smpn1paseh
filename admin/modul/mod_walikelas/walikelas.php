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
		<a href='?modul=walikelas_tambah' class='btn btn-success btn-sm margin-right'>
			<i class='fa fa-plus'></i>&nbsp;Tambah
		</a>
	</div>
</div>
<table class="table table-hover table-bordered" id="dataTabel">
    <thead>
      <tr>
        <th>#</th>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Wali Kelas</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="ha">
			<a href='?modul=walikelas_ubah' class='btn btn-success btn-xs' title='Edit Data'>
            	<i class='fa fa-edit'></i>
            </a>
          	<a href='' class='btn btn-danger btn-xs' title='Delete Data' onClick=\"return confirm('Anda yakin ingin menghapus data ini ?')\">
   				<span class='glyphicon glyphicon-trash'></span>
   			</a>
			</td>
		</tr>
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