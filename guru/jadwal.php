<?php
	if(isset($_SESSION['login'])){
	$nip = $_SESSION['nip'];
?>
<h2>Jadwal</h2>
<div class="grid_8 well">
	<div class="info-box">
		<div class="clearfix">
			<h3 align="center">Jadwal mengjar tahun ajaran 2015 semester genap</h3>
	        <h3 align="center"><a href="javascript:;" onClick="window.open('../cetak.php?nip=<?php echo $nip ?>','scrollwindow','top=200,left=300,width=800,height=500');"><i class="icon-download icon-2x"></i> DOWNLOAD</a></h3>
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