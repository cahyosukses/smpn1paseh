<?php  
	include_once '../koneksi.php';
	koneksi();
	session_start();
	$username =$_POST['username'];
	$password =md5($_POST['password']);
	$hak = $_POST['hak'];

	if ($hak == 'guru') {
		$query =mysql_query("SELECT * FROM tbl_data_guru WHERE nip='$username' AND password='$password'");
		$data_user =mysql_fetch_array($query);

		if($data_user['nip'] == $username and $data_user['password'] == $password){
			//men-set data sesi
			
			$_SESSION['login']=true;
			$_SESSION['guru']= true;
			$_SESSION['nip']= $data_user['nip'];
			$_SESSION['mapel']= $data_user['mapel'];
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['foto'] = $data_user['foto'];
			header('location:index.php?menu=beranda_guru');
		}
		else {
			?>
			<script>
				alert('Username atau Password salah');
				window.location.href='index.php';
			</script>
			<?php
			
		}
	}
	elseif ($hak == 'siswa') {
		$query =mysql_query("SELECT * FROM tbl_data_siswa WHERE nis='$username' AND password='$password'");
		$data_user =mysql_fetch_array($query);

		if($data_user['nis'] == $username and $data_user['password'] == $password){
			//men-set data sesi
			$_SESSION['nis']= $data_user['nis'];
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['login']=true;
			$_SESSION['siswa']=true;
			$_SESSION['foto'] = $data_user['foto'];
			header('location:index.php?menu=beranda_siswa');
		}
		else 
		{
			?>
			<script>
				alert('Username atau Password salah');
				window.location.href='index.php';
			</script>
			<?php

		}
	}
	else{
		echo "<script>
				alert('Ada Kesalahan');
				window.location.href='index.php?menu=beranda';
			</script>";
	}
	
	
?>
