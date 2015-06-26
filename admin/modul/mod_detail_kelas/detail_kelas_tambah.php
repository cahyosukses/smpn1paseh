<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
?>
<script type="text/javascript">
	var ajaxku=buatajax();
	function ajaxnis(id){
	    var url="modul/mod_detail_kelas/select_nis.php?nis="+id+"&sid="+Math.random();
	    ajaxku.onreadystatechange=stateChanged;
	    ajaxku.open("GET",url,true);
	    ajaxku.send(null);
	}
	function buatajax(){
	    if (window.XMLHttpRequest){
	    return new XMLHttpRequest();
	    }
	    if (window.ActiveXObject){
	    return new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    return null;
	}
	function stateChanged(){
	    var data;
	    if (ajaxku.readyState==4){
	    data=ajaxku.responseText;
	    if(data.length>=0){
	    document.getElementById("nama").innerHTML = data
	    }else{
	    document.getElementById("nama").value = "";
	    }
	    }
	}
</script>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_detail_kelas/act.php?act=tambah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
	           	<label class="control-label col-lg-4">NIS Siswa</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="nis" tabindex="12" onchange="ajaxnis(this.value)">
		              	<option value="">Pilih NIS</option>
		              	<?php
					    	$select = mysql_query("SELECT * FROM tbl_data_siswa");
					    	while ($data=mysql_fetch_array($select)) {
					    		echo "<option value='$data[nis]'>$data[nis] - $data[nama]</option>";
					    	}
					    ?>
		            </select>
	         	</div>
	        </div>
	        <!-- <div class='form-group'>
			    <label class="control-label col-lg-4">Nama Siswa</label>
			    <div class="col-lg-8">
			    	<input type='text' name='nama' id="nama" class='form-control' tabindex="2" readonly="readonly" />
			    </div>
			</div> -->
	        <div class="form-group">
	           	<label class="control-label col-lg-4">Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="kelas" tabindex="2">
		              	<option value="">Pilih Kelas</option>
		              	<?php
					    	$selectKelas = mysql_query("SELECT * FROM tbl_data_kelas ORDER BY kelas,detil_kelas");
					    	while ($data=mysql_fetch_array($selectKelas)) {
					    		echo "<option value='$data[id]'>".$data['kelas'].$data['detil_kelas']."</option>";
					    	}
					    ?>

		            </select>
	         	</div>
	        </div>
	        
	        
			<div class="form-group">
				<label class="control-label col-lg-4"></label>
			    <div class="col-lg-8">
					<button type='submit' name="btnTambah" class='btn btn-success' tabindex="18">Simpan</button>
					<a type='button' href="javascript:history.back()" class='btn btn-danger' tabindex="19">Kembali</a>
				</div>
			</div>
		</div> <!-- END COL 2 -->
	</div> <!-- END ROW -->
<form>

<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../../index.php'> Login </a></h4>
		  </div>";
}