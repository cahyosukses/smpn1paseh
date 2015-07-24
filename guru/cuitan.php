<?php
	if(isset($_SESSION['login'])){
?>
<h2>Cuitan Guru</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<h3>Buat Cuitan</h3>
		<div class="hr-edited hr-dashed"></div>
		<div class="grid_7">
			<!-- BEGIN CONTACT FORM -->
			<form method="post" action="../guru/act.php?act=tambah_cuitan" id="contact-form" class="contact-form">
				<div class="field">
					<label for="contact-message">Pesan :</label>
					<input type="hidden" name="nip" value="<?php echo $_SESSION['nip']; ?>">
					<textarea name="pesan" id="comments" cols="30" rows="2" required></textarea>
				</div>
				<div class="button-wrapper">
					<input type="submit" name="submit" id="submit" value="Kirim">
					<input type="reset"  value="Batal" >
				</div>
				<div id="response"></div>
			</form>
			<!-- END CONTACT FORM -->
		</div>
	</div>
	<div class="hr-edited hr-dashed"></div>
	<div class="clearfix">
		<h3>Cuitan Sebelumnya</h3>
		<div class="hr-edited hr-dashed"></div>
		<div class="grid_7">
			<?php
				include_once("../koneksi.php");
				include_once("../assets/function/fungsi.php");
				koneksi();
				$batas   = 3;
				$halaman=0;
				if(isset($_GET['halaman'])){
						   $halaman=$_GET['halaman'];
						}
				if(empty($halaman)){
					$posisi  = 0;
					$halaman = 1;
				}
				else{
					$posisi = ($halaman-1) * $batas;
				}
				$nip = $_SESSION['nip'];
				$select = mysql_query("SELECT * FROM tbl_info_cuitan WHERE nip = '$nip' ORDER BY id DESC LIMIT $posisi,$batas");
				while ($data = mysql_fetch_array($select)) {
				?>
				<!-- begin post heading -->
				<header class="entry-header clearfix">
					<div class="entry-header-inner">
						<h2 class="entry-title" align="left"><a href="../guru/act.php?act=hapus_cuitan&amp;id=<?php echo $data['id']; ?>" onClick="return confirm('Anda yakin ingin menghapus cuitan ini ?')" class="red" style="float:right;color:white">Hapus</a></h2>
						<p class="post-meta">
							<span class="post-meta-cats"><i class="icon-tag"></i><a href="#"><?php echo converter($data['tgl']); ?></a></span>
						</p>
					</div>
					<div><?php echo $data['isi'] ?></div>
				</header>
				<!-- end post heading -->
				<div class="hr-edited hr-dashed"></div>
				<?php
				}
			?>
		</div>
		
	</div>
	<div class="clearfix">
  		<div class="grid_12">
			<ul class='pagination'>
			<!-- Pagination -->
			<?php
			$tampil2=mysql_query("SELECT * FROM tbl_info_cuitan WHERE nip = '$nip'");
			$jmldata=mysql_num_rows($tampil2);
			$jmlhal= ceil($jmldata/$batas);
					
			
			
				if($halaman>1){
					$prev=$halaman-1;
					echo "<li class=prev><a href=index.php?menu=beranda_guru&aksi=pengumuman&halaman=$prev>&larr;</a></li>";
				}
				for($i = 1; $i <= $jmlhal; $i++){   //mengurutkan agar yang tampil i+3 dan i-3            
			if ((($i >= $halaman - 2) && ($i <= $halaman + 2)) || ($i == 1) || ($i == $jmlhal))            
				{               
					if($i==$jmlhal && $halaman <= $jmlhal-5) echo "...";               
					if ($i == $halaman) echo "<li><span class=current>$i</span></li>";               
					else echo "<li><a href=index.php?menu=beranda_guru&aksi=pengumuman&halaman=$i>$i</a></li>";               
					if($i==1 && $halaman >= 6) echo "<li><span class=gap>...</span></li>";  
					         
				}   
			}
			if($halaman < $jmlhal){
				$next=$halaman+1;
				echo "<li class=next><a href=index.php?menu=beranda_guru&aksi=pengumuman&halaman=$next>&rarr;</a></li>";
			}
			?>
			</ul>		
			<!-- /Pagination -->	
  		</div>
  	</div>
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