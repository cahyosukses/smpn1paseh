<?php
include 'koneksi.php'; // ini untuk membuka koneksi ke Database
	koneksi(); // ini untuk membuka koneksi ke Database
	require 'fpdf/fpdf.php';
//$tgl = date('d-M-Y');
$id = $_GET['nip'];
$select = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$id'");
$dataguru = mysql_fetch_array($select);
$query = "SELECT h.hari, k.kelas, k.detil_kelas, ja.mulai, ja.selesai, m.mapel, g.nama from tbl_jadwal j 
			JOIN tbl_data_hari h ON j.id_hari = h.id
            JOIN tbl_data_kelas k ON j.id_kelas = k.id
            JOIN tbl_data_jam ja ON j.id_jam = ja.id
            JOIN tbl_data_mapel m ON j.id_mapel = m.id
            JOIN tbl_data_guru g ON j.nip = g.nip WHERE j.nip = '$id'";
$sql = mysql_query ($query);
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
array_push($data, $row);
}
#setting judul laporan dan header tabel
$judul = "Jadwal Guru Atas Nama $dataguru[nama]";
$header = array(
array("label"=>"Hari", "length"=>20, "align"=>"L"),
array("label"=>"Kelas", "length"=>30, "align"=>"L"),
array("label"=>"Detil Kelas", "length"=>10, "align"=>"L"),
array("label"=>"Mulai", "length"=>25, "align"=>"L"),
array("label"=>"Selesai", "length"=>25, "align"=>"L"),
array("label"=>"Mata Pelajaran", "length"=>30, "align"=>"L"),
array("label"=>"Nama", "length"=>30, "align"=>"L")
);
#sertakan library FPDF dan bentuk objek
$pdf = new FPDF();
$pdf->AddPage();
#tampilkan judul laporan
$pdf->SetFont('arial','B','8');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
#buat header tabel
$pdf->SetFont('arial','','5');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0',
$kolom['align'], true);
}
$pdf->Ln();
#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('arial','','5');
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
}
#output file PDF
$pdf->Output();
?>