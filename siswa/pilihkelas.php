<?php
	if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
	$nis = $_SESSION['nis'];
?>
<script type="text/javascript">
	var ajaxku=buatajax();
	function ajaxguru(id){
	    var url="../siswa/select_mapel.php?id_guru="+id+"&sid="+Math.random();
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
	    document.getElementById("mapel").innerHTML = data
	    }else{
	    document.getElementById("mapel").value = "<option selected>Pilih mata pelajaran</option>";
	    }
	    }
	}
	function stateChangedKelas(){
	    var data;
	    if (ajaxku.readyState==4){
	    data=ajaxku.responseText;
	    if(data.length>=0){
	    document.getElementById("kelas").innerHTML = data
	    }else{
	    document.getElementById("kelas").value = "<option selected>Pilih Kelas</option>";
	    }
	    }
	}
	function ajaxkelas(id){
	    var url="../siswa/select_kelas.php?kelas="+id+"&sid="+Math.random();
	    ajaxku.onreadystatechange=stateChangedKelas;
	    ajaxku.open("GET",url,true);
	    ajaxku.send(null);
	}
</script>
<h2>Pilih Kelas</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<h3>Silahkan Pilih Kelas dan Mata Pelajaran</h3>
		<div class="hr-edited hr-dashed"></div>
		<div class="grid_3">
			<!-- BEGIN CONTACT FORM -->
			<form method="post" action="../siswa/act.php?act=pilih_kelas" id="contact-form" class="contact-form">
				<div class="field">
					<label for="contact-message">Guru:</label>
					<select name="guru" id="guru" onchange="ajaxguru(this.value)">
						<option value="" required>Pilih Guru</option>
						<?php
					    	$selectGuru = mysql_query("SELECT * FROM tbl_data_guru");
					    	while ($data=mysql_fetch_array($selectGuru)) {
					    		echo "<option value='$data[nip]'>$data[nama]</option>";
					    	}
					    ?>
					</select>
				</div>
				<div class="field">
					<label for="contact-message">Mata Pelajaran:</label>
					<select name="mapel" id="mapel" onchange="ajaxkelas(this.value)">
						<option value="" required>Pilih Mata Pelajaran</option>
					</select>
				</div>
				<div class="field">
					<input type="hidden" name="nis" value="<?php echo $nis ?>">
					<label for="contact-message">Kelas:</label>
					<select name="kelas" id="kelas" >
						<option value="" required>Pilih Kelas</option>
					</select>
				</div>
				<!-- <div class="field">
					<label for="contact-message">Guru:</label>
					<select name="guru">
						<option value="">Pilih mata pelajaran</option>
						<option value="" selected="selected">Kimia</option>
						<option value="">Biologi</option>
						<option value="">Fisika</option>
					</select>
				</div> -->
				<div class="button-wrapper">
					<input type="submit" name="submit" id="submit" value="Masuk">
					<a href="index.php?menu=beranda_siswa&aksi=beranda" class="red" >Batal</a>
				</div>
				<div id="response"></div>
			</form>
			<!-- END CONTACT FORM -->
		</div>
	</div>
	
	<div class="hr-edited hr-dashed"></div>
	
</div>

<!-- END ISSET LOGIN -->
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../frontend/index.php'> &nbsp; Login </a></h4>
		  </div>";
}