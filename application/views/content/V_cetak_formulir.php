<?php
/******************************************
* Filename    : V_cetak_formulir.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-10
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Konten untuk mencetak formulir
*
******************************************/
$pdf = new FPDF('P','cm','A4');
$pdf->SetTitle("Formulir PPDB Online MAN 1 Cianjur", false);
$pdf->SetDisplayMode("real", "default");
$pdf->SetLeftMargin(2.2);
$pdf->SetRightMargin(2.7);
$pdf->SetTopMargin(2.3);
$pdf->SetAutoPageBreak(true, 2.3);
$pdf->AddPage();

//===================================Header=====================================
$pdf->Image(base_url().'assets/images/logo_man.jpg',2.95,2.1,2);

$pdf->SetFont('times','B',14);
$pdf->Cell(0,0,'PENERIMAAN PESERTA DIDIK BARU (PPDB)',0,1,'C');

$pdf->SetFont('times','B',14);
$pdf->Cell(0,1.2,'MAN 1 CIANJUR',0,1,'C');

$pdf->SetFont('times','B',12);
$pdf->Cell(0,0,'TAHUN AJARAN '.Date("Y").' / '.(Date("Y")+1),0,1,'C');

$pdf->SetFont('','B',10);
$pdf->Cell(0,1,'Alamat: Jl.Pangeran Hidayatullah No.39',0,1,'C');

$pdf->Cell(0,-0.5,'',0,1);
// Line header
$pdf->SetLineWidth(0.1);
$garis = 4.4;
$pdf->Line(2.95,$garis,18.05,$garis);
$pdf->SetLineWidth(0.01);
$pdf->Line(2.91,$garis+0.1,18.09,$garis+0.1);

//==============================================================================

//===============================Data Pendaftar=================================
// print_r('R awal='.$rasio);
// echo "<br>";
// print_r('R Akhir='.$rasio);
// echo "<br>";
// print_r($w_foto);
// echo "<br>";
// print_r($h_foto);
$pdf->SetFont('','B',12);
$pdf->Cell(0,2.3,'DATA PENDAFTAR',0,1,'C');
$pdf->Cell(0,-0.53,'',0,1);
// $pdf->Cell(0,0,'',0,1);

// Foto Diri
// Mendapatkan ukuran real foto
$uk_foto = getimagesize(base_url().decrypt_url($file['path']));
$w_foto = 2.475;
$h_foto = 3.3;
// print_r(7.35+floatval($w_foto));
$pdf->ClippingRect(2.95, (2.95*2), 2.475, 3.3);
$pdf->Image(base_url().decrypt_url($file['path']),2.95,(2.95*2),0,3.3);
$pdf->UnsetClipping();
// $pdf->Image(base_url().decrypt_url($file['path']),2.95,(2.95*2),$w_foto,$h_foto);

// Identitas Umum
$kiri_semua = 0.6;
$wrap_umum = 10.4-$w_foto;
$kiri_umum = $w_foto + $kiri_semua + 0.5;

$pdf->SetFont('','B',12);
$pdf->Cell($kiri_umum,0,'',0,0);
$pdf->Cell(4.2,0.6,'NAMA',0,0);
$pdf->Cell(0.3,0.6,':',0,0);
$pdf->SetFont('','',12);
$pdf->MultiCell($wrap_umum,0.6,$siswa['nama']);
// $pdf->MultiCell($wrap_umum,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$jalur = '';
if ($pendaftaran['jalur_daftar'] == 'prestasi'){
	$jalur = 'P';
}else{
	$jalur = 'U';
}
$no_peserta = 'MAN-'.$pendaftaran['id'].$jalur;
$pdf->SetFont('','B',12);
$pdf->Cell($kiri_umum,0,'',0,0);
$pdf->Cell(4.2,0.6,'NO. PESERTA',0,0);
$pdf->Cell(0.3,0.6,':',0,0);
$pdf->SetFont('','',12);
$pdf->MultiCell($wrap_umum,0.6,$no_peserta);
// $pdf->MultiCell($wrap_umum,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','B',12);
$pdf->Cell($kiri_umum,0,'',0,0);
$pdf->Cell(4.2,0.6,'JALUR DAFTAR',0,0);
$pdf->Cell(0.3,0.6,':',0,0);
$pdf->SetFont('','',12);
$pdf->MultiCell($wrap_umum,0.6,strtoupper($pendaftaran['jalur_daftar']));
// $pdf->MultiCell($wrap_umum,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','B',12);
$pdf->Cell($kiri_umum,0,'',0,0);
$pdf->Cell(4.2,0.6,'PILIHAN JURUSAN',0,0);
$pdf->Cell(0.3,0.6,':',0,0);
$pdf->SetFont('','',12);
$pdf->MultiCell($wrap_umum,0.6,strtoupper($pendaftaran['jurusan']));
// $pdf->MultiCell($wrap_umum,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','B',12);
$pdf->Cell($kiri_umum,0,'',0,0);
$pdf->Cell(4.2,0.6,'ASAL SEKOLAH',0,0);
$pdf->Cell(0.3,0.6,':',0,0);
$pdf->SetFont('','',12);
$pdf->MultiCell($wrap_umum,0.6,strtoupper($pendaftaran['nama_sekolah']));
// $pdf->MultiCell($wrap_umum,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$date = explode('-',explode(' ',$pendaftaran['tgl_daftar'])[0]);
$date[1] = $bulan[$date[1]];

$pdf->SetFont('','B',12);
$pdf->Cell($kiri_umum,0,'',0,0);
$pdf->Cell(4.2,0.6,'TANGGAL DAFTAR',0,0);
$pdf->Cell(0.3,0.6,':',0,0);
$pdf->SetFont('','',12);
$pdf->MultiCell($wrap_umum,0.6,$date[2].' '.$date[1].' '.$date[0]);
// $pdf->MultiCell($wrap_umum,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->Cell(0,0.4,'',0,1);
//==============================================================================
//=========================Identitas Calon Peserta Didik========================
$tab = 5.3;
$titik2 = 0.4;
$wrap_semua = 21-($tab+$kiri_semua+$titik2+$kiri_semua+4.4);

$pdf->SetFont('','B',14);
$pdf->Cell(0,0.8,'IDENTITAS CALON PESERTA DIDIK',0,1);

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'NISN',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['nisn']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Nomor Induk Kependudukan',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['nik']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Nama Lengkap',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['nama']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Jenis Kelamin',0);
$pdf->Cell($titik2,0.6,':',0);
$siswa['gender'][0] = strtoupper($siswa['gender'][0]);
$pdf->MultiCell($wrap_semua,0.6,$siswa['gender']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Tempat Lahir',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['tempat_lahir']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$tanggal = explode('/',$siswa['tanggal_lahir']);
$tanggal[1] = $bulan[$tanggal[1]];
$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Tanggal Lahir',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$tanggal[0].' '.$tanggal[1].' '.$tanggal[2]);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Alamat',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['alamat']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'',0);
$pdf->Cell($titik2,0.6,'',0);
$kabupaten['nama'] = explode(' ', strtolower($kabupaten['nama']));
$kabupaten['nama'][1][0] = strtoupper($kabupaten['nama'][1][0]);
$kab = $kabupaten['nama'][1];
if (count($kabupaten['nama']) > 2){
  $kabupaten['nama'][2][0] = strtoupper($kabupaten['nama'][2][0]);
  $kab .= ' '.$kabupaten['nama'][2];
}
$pdf->MultiCell($wrap_semua,0.6,'Ds.'.$desa['nama'].', Kec.'.$kecamatan['nama'].', Kab.'.$kab.', Prov.'.$provinsi['nama'].', '.$siswa['kode_pos'], 0, 'L');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Agama',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['agama']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Anak Ke-',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['anak_ke']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Jumlah Saudara',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['jumlah_sdr']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Status Anak',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['status_anak']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'No HP',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['no_hp']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

$pdf->SetFont('','',12);
$pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,0.6,'Email',0);
$pdf->Cell($titik2,0.6,':',0);
$pdf->MultiCell($wrap_semua,0.6,$siswa['email']);
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');
//
// $pdf->Cell(0,0.6,'',0,1);
// $pdf->SetFont('','B',14);
// $pdf->Cell(0,0.8,'B. IDENTITAS SEKOLAH',0,1);
//
// $pdf->SetFont('','',12);
// $pdf->Cell($kiri_semua,0);
// $pdf->Cell($tab,0.6,'Nama Sekolah',0);
// $pdf->Cell($titik2,0.6,':',0);
// $pdf->MultiCell($wrap_semua,0.6,strtoupper($pendaftaran['nama_sekolah']));
// // $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');
//
// $pdf->SetFont('','',12);
// $pdf->Cell($kiri_semua,0);
// $pdf->Cell($tab,0.6,'Status Sekolah',0);
// $pdf->Cell($titik2,0.6,':',0);
// $pendaftaran['status_sekolah'][0] = strtoupper($pendaftaran['status_sekolah'][0]);
// $pdf->MultiCell($wrap_semua,0.6,$pendaftaran['status_sekolah']);
// // $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');
//
// $pdf->SetFont('','',12);
// $pdf->Cell($kiri_semua,0);
// $pdf->Cell($tab,0.6,'NPSN',0);
// $pdf->Cell($titik2,0.6,':',0);
// $pdf->MultiCell($wrap_semua,0.6,$pendaftaran['npsn']);
// // $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');
//
// $pdf->SetFont('','',12);
// $pdf->Cell($kiri_semua,0);
// $pdf->Cell($tab,0.6,'Tahun Lulus',0);
// $pdf->Cell($titik2,0.6,':',0);
// $pdf->MultiCell($wrap_semua,0.6,$pendaftaran['thn_lulus']);
// // $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');
//==============================================================================
$pdf->Ln();

$pdf->SetFont('','',11);
$pdf->Cell($kiri_semua,0);
$pdf->MultiCell($wrap_semua+$tab+$titik2
,0.6,'Dengan ini saya menyatakan bahwa data yang saya masukan benar dan jika data yang saya masukan tidak benar maka saya sanggup menerima segala konsekwensi yang ada.');

$pdf->Ln();
$pdf->SetFont('','',12);
$pdf->Cell(0,1,'Cianjur, '.date("d ").$bulan[date("m")].date(" Y "),0,1,'R');

// $pdf->Cell(0,-0.4,'',0,1);
$pdf->Cell($kiri_semua);
$pdf->Cell(0,0.6, 'Orang Tua Siswa, ',0);
$pdf->Cell(0,0.6, 'Siswa,                 ',0,1,'R');
$pdf->Cell(0,1.5,'',0,1);

$pdf->Cell($kiri_semua);
$pdf->Cell(0,0.6, '(................................)',0);
$pdf->Cell(0,0.6, '(................................)',0,1,'R');
// $pdf->MultiCell($wrap_semua,0.6,'Awokawojediowajdi ojai aud hsa du ahs udu shadu h hdua shd sah duha suhd sdh sua dhs auhd iasuhdsa hduhau');

// $pdf->output();
$pdf->output('D', 'Formulir PPDB Online MAN 1 Cianjur.pdf');
?>
