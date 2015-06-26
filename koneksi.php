<?php  
	function koneksi(){
		$konek = mysql_connect('localhost','root','');
		if ($konek) {
			$konek = mysql_select_db('smpn1paseh_db');
			date_default_timezone_set("Asia/Bangkok");
		}else{
			echo "Unable to connect to DB: " . mysql_error();
		}
	}
?>