<?php
function get_date(){
	$hari=date('w');
    $tgl =date('d');
    $bln =date('m');
    $thn =date('Y');
    switch($hari){      
        case 0 : {
                    $hari='Ahad';
                }break;
        case 1 : {
                    $hari='Senin';
                }break;
        case 2 : {
                    $hari='Selasa';
                }break;
        case 3 : {
                    $hari='Rabu';
                }break;
        case 4 : {
                    $hari='Kamis';
                }break;
        case 5 : {
                    $hari="Jum'at";
                }break;
        case 6 : {
                    $hari='Sabtu';
                }break;
        default: {
                    $hari='UnKnown';
                }break;
    }
     
switch($bln){       
        case 1 : {
                    $bln='Januari';
                }break;
        case 2 : {
                    $bln='Februari';
                }break;
        case 3 : {
                    $bln='Maret';
                }break;
        case 4 : {
                    $bln='April';
                }break;
        case 5 : {
                    $bln='Mei';
                }break;
        case 6 : {
                    $bln="Juni";
                }break;
        case 7 : {
                    $bln='Juli';
                }break;
        case 8 : {
                    $bln='Agustus';
                }break;
        case 9 : {
                    $bln='September';
                }break;
        case 10 : {
                    $bln='Oktober';
                }break;     
        case 11 : {
                    $bln='November';
                }break;
        case 12 : {
                    $bln='Desember';
                }break;
        default: {
                    $bln='UnKnown';
                }break;
    }
    return $hari.", ".$tgl." ".$bln." ".$thn;
}
function converter($string){
	$tahun =substr($string,0,4);
	$bulan = substr($string,5,2 );
	$bulan2 = '';
	switch ($bulan) {
		case '01':
			$bulan2 = "Januari";
			break;
		case '02':
			$bulan2 = "Februari";
			break;
		case '03':
			$bulan2 = "Maret";
			break;
		case '04':
			$bulan2 = "April";
			break;
		case '05':
			$bulan2 = "Mei";
			break;
		case '06':
			$bulan2 = "Juni";
			break;
		case '07':
			$bulan2 = "Juli";
			break;
		case '08':
			$bulan2 = "Agustus";
			break;
		case '09':
			$bulan2 = "September";
			break;
		case '10':
			$bulan2 = "Oktober";
			break;
		case '11':
			$bulan2 = "November";
			break;
		default:
			$bulan2 = "Desember";
			break;
	}
	$tanggal = substr($string,8,2);

	return $tanggal." ".$bulan2." ".$tahun;
}

function rupiah($string){
	return "Rp.&nbsp;".number_format($string,0,'','.').",-";
}

