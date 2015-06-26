<?php
	if(isset($_SESSION['login'])){
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_siswa/act.php?act=tambah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
      	<div class="col-lg-6">
			<div class='form-group'>
			    <label class="control-label col-lg-4">NIS</label>
			    <div class="col-lg-8">
			    	<input type='text' name='nis' class='form-control' tabindex="1" placeholder='Nomor Induk Siswa' required />
			    </div>
			</div>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Nama Lengkap</label>
			    <div class="col-lg-8">
			    	<input type='text' name='nama' class='form-control' tabindex="2" placeholder='Nama Siswa' required />
			    </div>
			</div>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Alamat</label>
			    <div class="col-lg-8">
			    	<textarea name="alamat" rows="6" required  class="form-control" tabindex="3"></textarea>
			    </div>
			</div>
	        <div class='form-group'>
			    <label class="control-label col-lg-4">Tempat Lahir</label>
			    <div class="col-lg-8">
			    	<input type='text' name='tempat_lahir' class='form-control' placeholder='Tempat Lahir' tabindex="4" required />
			    </div>
			</div>
			<div class="form-group">
	          	<label class="control-label col-lg-4">Tanggal Lahir</label>
	          	<div class="col-lg-8">
	            	<div class="input-group">
	             		<input type="text"  id="tanggal" name="tanggal_lahir" class="form-control" tabindex="5"/>
	             		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            		</div> 
	          	</div>
	        </div>
	        <div class="control-group">
			  <label class="control-label col-lg-4"> Jenis Kelamin</label>
			  <div class="col-lg-8">
				  <div class="controls">
				  	<div class="radio">
					    <label>
					      <input type="radio" name="jk"  tabindex="6" checked value="l">
					      Laki - Laki
					    </label>
				    </div>
				    <div class="radio">
					    <label>
					      <input type="radio" name="jk" tabindex="7" value="p">
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
		                <img data-src="holder.js/100%x100%" >
		              </div>
	              	  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		              <div>
		                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Foto</span> <span class="fileinput-exists">Ganti</span> 
		                  <input type="file" name="foto" tabindex="4">
		                </span> 
		                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
		              </div>
	            	</div>
	            </div>
	        </div>
	        
			<div class='form-group'>
			    <label class="control-label col-lg-4">Telepon</label>
			    <div class="col-lg-8">
			    	<input type="text" name='telepon' class='form-control' placeholder='No Telepon' tabindex="8" maxlength="12" required/>
			    </div>
			</div>
			
			<div class='form-group'>
			    <label class="control-label col-lg-4">Email</label>
			    <div class="col-lg-8">
			    	<input type='email' name='email' class='form-control' required placeholder='Email' tabindex="11"/>
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
	if (isset($_POST['btnTambah'])) {
		echo 'hahaha';
	}
?>
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../../index.php'> Login </a></h4>
		  </div>";
}