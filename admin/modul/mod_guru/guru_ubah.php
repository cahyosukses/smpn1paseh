<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$id = $_GET['id'];
	$select = mysql_query("SELECT * FROM tbl_data_guru WHERE nip='$id'");
	$data = mysql_fetch_assoc($select);
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_guru/act.php?act=ubah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
      	<div class="col-lg-6">
			<div class='form-group'>
			    <label class="control-label col-lg-4">NIP</label>
			    <div class="col-lg-8">
			    	<input type='text' name='nip' class='form-control' tabindex="1" placeholder='Nomor Induk' readonly="readonly" value="<?php echo $data['nip']; ?>" />
			    </div>
			</div>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Nama Lengkap</label>
			    <div class="col-lg-8">
			    	<input type='text' name='nama' class='form-control' tabindex="2" placeholder='Nama Lengkap' required value="<?php echo $data['nama']; ?>"/>
			    </div>
			</div>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Alamat</label>
			    <div class="col-lg-8">
			    	<textarea name="alamat" rows="6" required  class="form-control" tabindex="3"><?php echo $data['alamat']; ?></textarea>
			    </div>
			</div>
	        <div class='form-group'>
			    <label class="control-label col-lg-4">Tempat Lahir</label>
			    <div class="col-lg-8">
			    	<input type='text' name='tempat_lahir' class='form-control' placeholder='Tempat Lahir' tabindex="4" required value="<?php echo $data['tempat_lahir']; ?>"/>
			    </div>
			</div>
			<div class="form-group">
	          	<label class="control-label col-lg-4">Tanggal Lahir</label>
	          	<div class="col-lg-8">
	            	<div class="input-group">
	             		<input type="text"  id="tanggal" name="tanggal_lahir" class="form-control" tabindex="5" value="<?php echo $data['tanggal_lahir']; ?>"/>
	             		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            		</div> 
	          	</div>
	        </div>
	        <div class="control-group">
			  <label class="control-label col-lg-4"> Jenis Kelamin Anak</label>
			  <div class="col-lg-8">
				  <div class="controls">
				  	<div class="radio">
					    <label>
					      <input type="radio" name="jk"  tabindex="6" <?php echo ($data['jk'] == 'l')? 'checked':'' ?> value="l">
					      Laki - Laki
					    </label>
				    </div>
				    <div class="radio">
					    <label>
					      <input type="radio" name="jk" tabindex="7" <?php echo ($data['jk'] == 'p')? 'checked':'' ?> value="p">
					      Perempuan
					    </label>
				    </div>
				  </div>
				</div>
			</div>

		</div> <!-- END COL 2 -->
		<div class="col-lg-6">
			<div class="form-group">
	            <label class="control-label col-lg-4">Foto</label><br/>
			    <div class="col-lg-8">
	            	<div class="fileinput fileinput-new" data-provides="fileinput">
		              <div class="fileinput-new thumbnail" style="width: 200px; height: auto; min-height: 150px;">
		                <img data-src="holder.js/100%x100%" src="../directory_files/foto_guru/<?php echo $data['foto']; ?>">
		              </div>
	              	  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		              <div>
		                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Foto</span> <span class="fileinput-exists">Ganti</span> 
		                  <input type="file" name="foto" tabindex="8">
		                  <input type="hidden" name="oldfoto" value="<?php echo $data['foto']; ?>" />
		                </span> 
		                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
		              </div>
	            	</div>
	            </div>
	        </div>
	        
			<div class='form-group'>
			    <label class="control-label col-lg-4">Telepon</label>
			    <div class="col-lg-8">
			    	<input type="text" name='telepon' class='form-control' placeholder='No Telepon' tabindex="9" maxlength="12" required value="<?php echo $data['telepon']; ?>"/>
			    </div>
			</div>
			
			<div class='form-group'>
			    <label class="control-label col-lg-4">Email</label>
			    <div class="col-lg-8">
			    	<input type='email' name='email' class='form-control' required placeholder='Email' tabindex="10" value="<?php echo $data['email']; ?>"/>
				</div>
			</div>
			
			<div class="form-group">
	           	<label class="control-label col-lg-4">Mata Pelajaran</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="mapel" tabindex="12">
		              	<?php
		              		include_once("../koneksi.php");
		              		koneksi();
					    	$select = mysql_query("SELECT * FROM tbl_data_mapel");
					    	while ($datamapel=mysql_fetch_array($select)) {
					    		if ($datamapel['id']==$data['mapel']) {
					    			echo "
					    			<option value='$datamapel[id]' selected='selected' >
					    			$datamapel[mapel]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datamapel[id]' >
					    			$datamapel[mapel]</option>";
					    		}
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
	    <hr />
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