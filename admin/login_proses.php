<?php  
	include_once '../koneksi.php';
	koneksi();
	session_start();
	$username =$_POST['username'];
	$password =md5($_POST['password']);

	$query =mysql_query("SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
	$data_user =mysql_fetch_array($query);

	if($data_user['username'] == $username and $data_user['password'] == $password){
		//men-set data sesi
		$_SESSION['id'] = $data_user['id_user'];
		$_SESSION['screen_name'] = $data_user['screen_name'];
		$_SESSION['login']=true;
		header('location:main.php?modul=beranda');
	}
	else {
		?>
		<script>
			alert('Username atau Password salah');
			window.location.href='index.php';
		</script>
		<?php
	}
	
?>
