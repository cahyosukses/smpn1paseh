<?php
	if(isset($_SESSION['login'])){
?>
HALAMAN BERANDA<br>
<center><img src="../assets/img/pasone.png" ></center>
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../../index.php'> Login </a></h4>
		  </div>";
}