<?php
/******************************************
* Filename    : V_cetak_formulir.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-10
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Konten untuk mencetak kartu
*
******************************************/
$pdf = new FPDF('P','cm',array(8,11));
$pdf->SetLeftMargin(0.25);
$pdf->SetRightMargin(0.15);
$pdf->SetTopMargin(1);
$pdf->SetAutoPageBreak(true, 1);
$pdf->AddPage();

//========Border Header========
$pdf->SetLineWidth(0.03);
$pdf->Line(0.35,0.35,7.65,0.35);
$pdf->Line(7.65,0.35,7.65,3.4);
$pdf->Line(0.35,3.4,7.65,3.4);
// $pdf->Line(2.87,0.35,2.87,3.4);
$pdf->Line(0.35,0.35,0.35,3.4);
//=============================

//=====Isi Border (Header)=====
$pdf->ClippingRect(0.371, 0.371, 2.2575,3.01);
$pdf->Image(base_url().decrypt_url($file[0]['path']), 0.371, 0.371,0,3.01);
$pdf->UnsetClipping();
$pdf->Image(base_url().'assets/images/logo_man.jpg',3.25,0.6,1.15);
// $pdf->Image(base_url().decrypt_url($file[0]['path']),0.371,0.371,0,3.01);
//-------------------------
$pdf->SetFont('Arial','B',26);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(7.41,0,'MAN 1',0,1,'R');
//-------------------------
$pdf->SetFont('','B',17.5);
$pdf->Cell(7.3,1.2,'CIANJUR',0,1,'R');
//-------------------------
$pdf->SetLineWidth(0.03);
$pdf->SetDrawColor(0,71,158);
$pdf->Line(3,1.95,7.5,1.95);
//-------------------------
$pdf->SetFont('Times', '',11);
$pdf->Cell(7.385,0.2,'KARTU TANDA PESERTA',0,1,'R');
//-------------------------
$pdf->SetFont('Times', 'B',27);
$pdf->Cell(7.42,1,'PPDB '.date("Y"),0,1,'R');
//=============================

//=========Border Data=========
$pdf->Line(0.35,3.525,7.65,3.525); // Atas
$pdf->Line(0.35,3.525,0.35,7.75); // Kiri
$pdf->Line(0.35,7.75,7.65,7.75); // Bawah
$pdf->Line(7.65,3.525,7.65,7.75); // Kanan
//=============================

//=========Border Akun=========
$pdf->Line(0.35,7.875,7.65,7.875); // Atas
$pdf->Line(0.35,7.875,0.35,10.65); // Kiri
$pdf->Line(0.35,10.65,7.65,10.65); // Bawah
$pdf->Line(7.65,7.875,7.65,10.65); // Kanan
//=============================

//======Isi Data Peserta=======
// $pdf->SetFont('','B',6.5);
// $pdf->SetTextColor(0,71,158);
// $pdf->Cell(2.3,0.7,'NOMOR PESERTA',0,0,'R');
// $pdf->Cell(0.15,0.7,':',0,0,'R');
// $pdf->Cell(-0.1);
// $pdf->SetFont('','',6.5);
// $pdf->Cell(0,0.7,$siswa['nama'],0,1);
$jalur = '';
if ($pendaftaran['jalur_daftar'] == 'prestasi'){
	$jalur = 'P';
}else{
	$jalur = 'U';
}
$pdf->Cell(0,0.1875,'',0,1);
$no_peserta = 'MAN-'.$pendaftaran['id'].$jalur;
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'NOMOR PESERTA',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$pdf->Cell(0.05,0.375,$no_peserta,0,0);
// $pdf->Cell(3.3);
$pdf->SetTextColor(100,0,0);
$pdf->SetFont('','B',6.5);
$pdf->Cell(4.9,0.375,'('.strtoupper($pendaftaran['jalur_daftar']).')',0,1,'R');

$pdf->SetTextColor(0,71,158);
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'NISN',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$pdf->Cell(0,0.375,$siswa['nisn'],0,1);

$pdf->SetTextColor(0,71,158);
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'NAMA PESERTA',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$pdf->Cell(0,0.375,$siswa['nama'],0,1);

$pdf->SetTextColor(0,71,158);
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'GENDER',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$pdf->Cell(0,0.375,$siswa['gender'],0,1);

$pdf->SetTextColor(0,71,158);
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'TANGGAL LAHIR',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
list($tgl,$bln,$thn) = explode("/",$siswa['tanggal_lahir']);
$arr_bln = ['Janunari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$pdf->Cell(0,0.375,$tgl.' '.$arr_bln[$bln-1].' '.$thn,0,1);

$pdf->SetTextColor(0,71,158);
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'ALAMAT',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$pdf->MultiCell(5,0.375,$siswa['alamat'],0,'L');
// $pdf->MultiCell(5,0.375,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');
$pdf->Cell(0.1);
$pdf->Cell(2.2,0,'',0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0,'',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$kabupaten['nama'] = explode(' ', strtolower($kabupaten['nama']));
$kabupaten['nama'][1][0] = strtoupper($kabupaten['nama'][1][0]);
$kab = $kabupaten['nama'][1];
if (count($kabupaten['nama']) > 2){
  $kabupaten['nama'][2][0] = strtoupper($kabupaten['nama'][2][0]);
  $kab .= ' '.$kabupaten['nama'][2];
}
$pdf->MultiCell(5,0.375,'Ds.'.$desa['nama'].', Kec.'.$kecamatan['nama'].', Kab.'.$kab.', Prov.'.$provinsi['nama'].', '.$siswa['kode_pos'], 0, 'L');

$pdf->SetTextColor(0,71,158);
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'PILIHAN JURUSAN',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$pdf->Cell(0,0.375,$pendaftaran['jurusan'],0,1);

$pdf->SetTextColor(0,71,158);
$pdf->SetFont('','B',6.5);
$pdf->SetTextColor(0,71,158);
$pdf->Cell(0.1);
$pdf->Cell(2.2,0.375,'ASAL SEKOLAH',0,0);
// $pdf->Cell(-0.1);
$pdf->Cell(0.05,0.375,':',0,0);
$pdf->Cell(0.1);
$pdf->SetFont('','',6.5);
$pdf->Cell(0,0.375,$pendaftaran['nama_sekolah'],0,1);

if ($password != ''){
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetTextColor(0,71,158);
	$pdf->SetFont('','B',6.5);
	$pdf->SetTextColor(0,71,158);
	$pdf->Cell(0.1);
	$pdf->Cell(2.2,0.375,'AKUN PPDB ONLINE:',0,0);
	// $pdf->Cell(-0.1);
	$pdf->Cell(0.1);
	$pdf->SetFont('','',6.5);
	$pdf->Cell(0,0.375,'',0,1);

	$pdf->SetTextColor(0,71,158);
	$pdf->SetFont('','B',6.5);
	$pdf->SetTextColor(0,71,158);
	$pdf->Cell(0.1);
	$pdf->Cell(2.2,0.375,'USERNAME',0,0);
	$pdf->Cell(-0.8);
	$pdf->Cell(0.05,0.375,':',0,0);
	$pdf->Cell(0.1);
	$pdf->SetFont('','',6.5);
	$pdf->Cell(0,0.375,$siswa['nisn'],0,1);

	$pdf->SetTextColor(0,71,158);
	$pdf->SetFont('','B',6.5);
	$pdf->SetTextColor(0,71,158);
	$pdf->Cell(0.1);
	$pdf->Cell(2.2,0.375,'PASSWORD',0,0);
	$pdf->Cell(-0.8);
	$pdf->Cell(0.05,0.375,':',0,0);
	$pdf->Cell(0.1);
	$pdf->SetFont('','',6.5);
	$pdf->Cell(0,0.375,$password,0,1);

	$pdf->SetTextColor(0,71,158);
	$pdf->SetFont('','B',6.5);
	$pdf->SetTextColor(0,71,158);
	$pdf->Cell(0.1);
	$pdf->Cell(2.2,0.375,'LINK LOGIN',0,0);
	$pdf->Cell(-0.8);
	$pdf->Cell(0.05,0.375,':',0,1);

	$pdf->SetTextColor(0,71,158);
	$pdf->SetFont('','',6.5);
	$pdf->SetTextColor(0,71,158);
	$pdf->Cell(0.1);
	$pdf->Cell(2.2,0.375,base_url('C_login'),0,0);
}

// QR Code Generator
$informasi =  base_url('C_cetak_kartu').'?token='.encrypt_url($siswa['id'])."\n";
QRcode::png($informasi,'./assets/usr/'.encrypt_url($siswa['id']).'.png', QR_ECLEVEL_L, 2, 0);

$pdf->Image(base_url().'assets/usr/'.encrypt_url($siswa['id']).'.png',5.25,8.25);
unlink('./assets/usr/'.encrypt_url($siswa['id']).'.png');
//=============================
// $pdf->SetFont('','B',14);
// $pdf->Cell(2.3);
// $pdf->Cell(0,1.5,'MAN 1 CIANJUR',0,1,'C');
//
// $pdf->SetFont('','B',10);
// $pdf->Cell(2.3);
// $pdf->Cell(0,-0.3,'Alamat: Jl.Pangeran Hidayatullah N0.39',0,1,'C');
//
// $pdf->SetFont('','B',12);
// $pdf->Cell(0,3.5,'DATA PENDAFTAR',0,1,'C');

// $pdf->SetLineWidth(0.05);
// $pdf->Line(2.95,4.4,18.05,4.4);
$pdf->output('I', 'Kartu Peserta PPDB Online MAN 1 Cianjur.pdf');
?>
