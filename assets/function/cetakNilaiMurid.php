<?php
include '../../koneksi.php'; // ini untuk membuka koneksi ke Database
	koneksi(); // ini untuk membuka koneksi ke Database
	require '../../fpdf/fpdf.php';
//$tgl = date('d-M-Y');
$id = $_GET['nis'];
$nip = $_GET['nip'];
$selectGuru = mysql_query("SELECT * FROM tbl_data_kelas WHERE nip = '$nip'");
$dataGuru = mysql_fetch_array($selectGuru);
$kelas = $dataGuru['id'];
$select = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$id'");
$datasiswa = mysql_fetch_array($select);
$sql1 = mysql_query("SELECT m.mapel, p.uts, p.uas, p.kuis FROM tbl_pilihkelas p JOIN tbl_data_mapel m ON p.id_mapel = m.id WHERE p.nis = '$id' GROUP BY p.id_mapel");
$hitung = mysql_num_rows($sql1);
$jumlah=0;
while ($data = mysql_fetch_array($sql1)) {
	$nilai_akhir = round((0.3*$data['uts'])+(0.5*$data['uas'])+(0.2*$data['kuis']));
	$jumlah += $nilai_akhir;
}
$sql = mysql_query("SELECT m.mapel, p.uts, p.uas, p.kuis, round(((0.3*p.uts)+(0.5*p.uas)+(0.2*p.kuis))) as jumlah FROM tbl_pilihkelas p JOIN tbl_data_mapel m ON p.id_mapel = m.id WHERE p.nis = '$id' GROUP BY p.id_mapel");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
array_push($data, $row);
}
#setting judul laporan dan header tabel
$judul = "Indeks Nilai Atas Nama $datasiswa[nama]";
$header = array(
array("label"=>"Mata Pelajaran", "length"=>30, "align"=>"L"),
array("label"=>"UTS", "length"=>20, "align"=>"L"),
array("label"=>"UAS", "length"=>20, "align"=>"L"),
array("label"=>"Kuis", "length"=>20, "align"=>"L"),
array("label"=>"Nilai Akhir", "length"=>20, "align"=>"L"),
);
#sertakan library FPDF dan bentuk objek
$pdf = new FPDF();
$pdf->AddPage();
#tampilkan judul laporan
$pdf->SetFont('arial','B','12');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
#buat header tabel
$pdf->SetFont('arial','','11');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->SetLeftmargin(50);
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0',
	$kolom['align'], true);

}
$pdf->Ln();
$pdf->setx(50);

#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('arial','','10');
$fill=false;
foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0',
		$kolom['align'], $fill);
		$i++;

	}
	$fill = !$fill;
	$pdf->Ln();
	$pdf->setx(50);
}

//buat footer rata-rata
$footer = array(
array("label"=>"Nilai Rata - Rata", "length"=>90, "align"=>"L"),
array("label"=>round($jumlah/$hitung), "length"=>20, "align"=>"L"),
);
$pdf->SetFont('arial','','11');
$pdf->SetFillColor(0,0,255);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($footer as $kolom) {
	$pdf->SetLeftmargin(50);
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0',
	$kolom['align'], true);

}
$pdf->Ln();
#output file PDF
$pdf->Output();
?>