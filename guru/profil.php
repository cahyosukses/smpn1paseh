<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$nip = $_SESSION['nip'];
	$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$nip'");
	$data= mysql_fetch_array($selectGuru);
?>
<h2>Profil</h2>
<div class="grid_8 well">
	<div class="info-box">
		<div class="clearfix">
			<h3>Profil</h3>
			<div class="hr-edited hr-dashed"></div>
			<div class="grid_7">
				<!-- BEGIN CONTACT FORM -->
				<form method="post" action="../guru/act.php?act=setting_profile" id="contact-form" class="contact-form" enctype='multipart/form-data'>
					<div class="field">
						<label for="contact-message">Nip:</label>
						<input type="text" name="nip" readonly="readonly" value="<?php echo $nip; ?>" />
					</div>
					<div class="field">
						<label for="contact-message">Nama:</label>
						<input type="text" name="nama" value="<?php echo $data['nama']; ?>"/>
					</div>
					<div class="field">
						<label for="contact-message">Email:</label>
						<input type="text" name="email" value="<?php echo $data['email']; ?>" />
					</div>
					<div class="field">
						<label for="contact-message">No Telepon:</label>
						<input type="text" name="telepon" value="<?php echo $data['telepon']; ?>" maxlength="12"/>
					</div>
					<div class="field">
						<label for="contact-message">Alamat:</label>
						<textarea name="alamat" id="comments" cols="30" rows="5"><?php echo $data['alamat']; ?></textarea>
					</div>
					<div class="field">
						<label for="contact-message "><b>Catatan</b>: Biarkan ketiga inputan password di bawah ini kosong bila tidak akan mengubah password dengan password yang baru.</label>
					</div>
					<div class="field">
						<label for="contact-message">Password Lama</label>
						<input type="password" name="passlama" />
					</div>
					<div class="field">
						<label for="contact-message">Password baru</label>
						<input type="password" name="passbaru" />
					</div>
					<div class="field">
						<label for="contact-message">Tulis Kembali Password Baru</label>
						<input type="password" name="konfpassbaru" />
					</div>
					<div class="button-wrapper">
						<input type="submit" name="submit" id="submit" value="Ubah">
						<a href="index.php?menu=beranda_guru&amp;aksi=beranda" class="red" >Batal</a>
					</div>
					<div id="response"></div>
				</form>
				<!-- END CONTACT FORM -->
			</div>
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