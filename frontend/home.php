						
<!-- LOGIN -->
<div class="hr hr-dashed" id="login"></div>
<div class="clearfix" >
	<div class="sidebar grid_6">
		<h2>Login</h2>
		<div class="info-box">
			<!-- BEGIN CONTACT FORM -->
			<form method="post" onsubmit="return IsEmpty();" action="login_proses.php" id="contact-form" class="contact-form" name="Form">
				<div class="field">
					<label for="name">Username</label>
					<input type="text" name="username" id="name" required>
				</div>
				<div class="field">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" required>
				</div>
				<div class="field">
					<label >Login Sebagai</label><br/>
					<input type="radio" value="guru" name="hak" id="guru"> <label class="label-custom" for="guru">Guru &nbsp; &nbsp; &nbsp; &nbsp;</label>
					<input type="radio" value="siswa" name="hak" id="siswa"> <label class="label-custom" for="siswa">Siswa</label>

				</div>
				<br/>
				<div class="button-wrapper">
					<input type="submit" name="btnLogin" id="submit" value="Login" style="width:150px">
				</div>
				<div id="response"></div>
			</form>
			<!-- END CONTACT FORM -->
		</div>
	</div>
	<div class="sidebar grid_6">
		<h2>Lupa Password</h2>
		<div class="info-box">
			<!-- BEGIN CONTACT FORM -->
			<form method="post" action="" id="contact-form" class="contact-form">
				<div class="field">
					<label for="name">NIP/NIS</label>
					<input type="text" name="username" id="name">
				</div>
				<div class="field">
					<label for="email">Alamat Email</label>
					<input type="email" name="password" id="email">
				</div>
				<div class="alert alert-info">
					<i class="icon-info-sign"></i>
					Password baru akan dikirim ke alamat email anda jika data yang dimasukan sesuai.
				</div><!-- //.warning -->
				<div class="button-wrapper">
					<input type="submit" onclick="IsEmpty();" name="submit" id="submit" value="Kirim" style="width:150px">
				</div>
				<div id="response"></div>
			</form>
			<!-- END CONTACT FORM -->
		</div>
	</div>
</div>
<!-- TENTANG SEKOLAH -->
<div class="hr hr-dashed" id="tentang"></div>
<div class="clearfix" >
	<div class="grid_12">
		<h2>Tentang Sekolah</h2>
		<div class="info-box">
			<img src="images/samples/img220x200.jpg" height="200" width="220" alt="" class="alignright halfwidth">
			<p><strong>Fusce ac pharetra urna</strong>. Duis non lacus sit amet lacus interdum facilis sed non est. Ut mi metus, semper eu dictum nec, condimentum sed sapien. Nullam lobortis nunc semper ipsum luctus ut viverra ante eleifend. Nunc pretium velit sed augue luctus accumsan. </p>
			<p>
			Aliquam laoreet consequat malesuada. Integer vitae diam sed dolor euismod laoreet eget ac felis. Donec non erat sed elit bibendum sodales. Donec eu cursus velit. Proin nunc lacus, gravida mollis dictu ut, vulputate eu turpis. Sed felis sapien. commodo in iaculis in, feugiat sed enim. Sed nunc ipsum, fermentum varius dignis.
			</p>
			<div class="clear"></div>
		</div>
	</div>
</div>

<!-- BERITA -->
<div class="hr hr-dashed" id="artikel"></div>

<div class="clearfix">
	<!-- BEGIN SIDEBAR -->
	<div class="sidebar grid_6">
		<h2>Berita dan Artikel Pendidikan</h2>
		<div class="info-box">
			<?php
				include_once("../koneksi.php");
				include_once("../assets/function/fungsi.php");
				koneksi();
				$selectBerita = mysql_query("SELECT * FROM tbl_info_berita ORDER BY id DESC");
				while ($data = mysql_fetch_array($selectBerita)) {
			?>
				<!-- Icon Box -->
				
					
				
				<div class="ico-box">
					<div class="ico-holder-edited">
						<i class="icon-circle"></i>
					</div>
					<div class="ico-box-content">
						<h4><a href="<?php echo $data['link']; ?>" target="_blank"><?php echo $data['judul']; ?></a></h4>
						<i><?php echo converter($data['tgl']); ?></i>
					</div>
				</div>
				<div class="hr-edited hr-dashed"></div>
				
			<?php
				}
			?>
		</div>
	</div>
	<!-- END SIDEBAR -->

	<div class="sidebar grid_6">
		<h2>Visi</h2>
		<blockquote>Pelopor pembaharuan dalam bidang teknologi informasi pendidikan, sehat jasmani rohani, dan memiliki sumber daya manusia yang Optimal</blockquote>
		<h2>Misi</h2>
		<blockquote>1.Mewujudkan perangkat kurikulum yang lengkap dan berwawasan kedepan.</blockquote>
		<blockquote>2.Mewujudkan penyelenggaraan pembelajaran yang aktif, kreatif, efektif dan menyenangkan.</blockquote>
		<h2>Motto</h2>
		<blockquote>Beriman, Bersih, Indah & Nyaman</blockquote>
	</div>
</div>
<div class="hr hr-dashed"></div>
<div class="clearfix">
	<!-- BEGIN SIDEBAR -->
	<div class="sidebar grid_8">
		<h2>Kritik dan Saran</h2>
		<div class="info-box">
			<!-- BEGIN CONTACT FORM -->
			<form method="post" action="act.php?act=saran" id="contact-form" class="contact-form">
				<div class="field">
					<label for="name">Nama:</label>
					<input type="text" name="nama" id="name">
				</div>
				<div class="field">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email">
				</div>
				<div class="field">
					<label for="contact-message">Komentar:</label>
					<textarea name="komentar" id="comments" cols="30" rows="10"></textarea>
				</div>
				<div class="button-wrapper">
					<input type="submit" name="btnSaran" id="submit" value="Kirim">
					<input type="reset" value="Reset">
				</div>
				<div id="response"></div>
			</form>
		</div>
		<!-- END CONTACT FORM -->
	</div>
	<!-- END SIDEBAR -->
	<aside class="sidebar grid_4">
	<!-- Contact Widget -->
	<div class="contact-widget widget widget__sidebar">
		<h3 class="widget-title">Alamat</h3>
		<div class="info-box">
			<div class="widget-content">
				
					<i class="icon-home"></i><strong>Jalan Kadatuan no 1 desa mekarpawtitan
					Kecamatan Pase 
					Kabupaten bandung 40383
					Jawa Barat</strong><br>
					<i class="icon-phone"></i> 022-5950012<br>
					<i class="icon-envelope-alt"></i> <a href="mailto:smpn1paseh@gmail.com">smpn1paseh@gmail.com</a><br>
				</address>
					<br/>
					
			</div>
		</div>
		<br/>
		<h3 class="widget-title">Ikuti Kami Di Sosial Media</h3>
		<div class="widget-content">
			<div class="info-box">
				<!-- Social Links -->
				<ul class="social-links unstyled" align="center">
					<li class="ico-twitter"><a href="#">Twitter</a></li>
					<li class="ico-facebook"><a href="#">Facebook</a></li>
					<li class="ico-googleplus"><a href="#">Google+</a></li>
				</ul>
				<!-- /Social Links -->
				<br/>
			</div>
		</div>
	</div>
	<!-- /Contact Widget -->
</aside>
</div>
<script type="text/javascript">
function IsEmpty(){
  if(document.forms['Form'].hak.value == "")
  {
    alert("Isi Dulu Semua Field Untuk Melakukan Login ");
    return false;
  }
    return true;
}
</script>


					
		
		