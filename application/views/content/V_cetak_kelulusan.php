<?php
/******************************************
* Filename	  : V_cetak_formulir.php
* Proggrammer : Robi Naufal Kaosar
* Date		  : 2020-06-14
* E-Mail	  : robinaufal11@upi.edu
* Deskripsi	  : Konten untuk mencetak surat kelulusan
*
******************************************/
$pdf = new FPDF('P','cm','legal');
$pdf->SetTitle("Surat Kelulusan PPDB Online MAN 1 Cianjur", false);
$pdf->SetDisplayMode("real", "default");
$pdf->SetLeftMargin(2.54);
$pdf->SetRightMargin(2.54);
$pdf->SetTopMargin(2.54);
$pdf->SetAutoPageBreak(true, 2.54);
$pdf->AddPage();

$line_spacing = 0.4;

//===================================Header=====================================
$pdf->Image(base_url().'assets/images/logo_kemenag.png',9.795,2.1,2);

$pdf->SetFont('times','B',9);
$pdf->cell(0,1.9,'',0,1);
$pdf->Cell(0,0,'KEMENTERIAN AGAMA',0,1,'C');

// Line header
$garis = 4.75;
$pdf->SetLineWidth(0.1);
$pdf->Line(2.54,$garis,19.05,$garis);
$pdf->SetLineWidth(0.01);
$pdf->Line(2.5,$garis+0.1,19.09,$garis+0.1);

$pdf->cell(0,0.7,'',0,1);
$pdf->Cell(0,0,'KEPUTUSAN KEPALA MADRASAH ALIYAH NEGERI 1 CIANJUR',0,1,'C');

$pdf->cell(0,$line_spacing,'',0,1);
$pdf->Cell(0,0,'Nomor: 233/Ma.10.10/PP.006/06/'.Date("Y").'',0,1,'C');

$pdf->cell(0,0.75,'',0,1);

$pdf->Cell(0,0,'TENTANG',0,1,'C');

$pdf->cell(0,0.75,'',0,1);

$pdf->Cell(0,0,'PENETAPAN CALON PESERTA DIDIK BARU',0,1,'C');

$pdf->cell(0,$line_spacing,'',0,1);
$pdf->Cell(0,0,'YANG DINYATAKAN DITERIMA MELALUI SELEKSI JALUR PRESTASI',0,1,'C');

$pdf->cell(0,$line_spacing,'',0,1);
$pdf->Cell(0,0,'PENERIMAAN PESERTA DIDIK BARU MAN 1 CIANJUR',0,1,'C');

$pdf->cell(0,$line_spacing,'',0,1);
$pdf->Cell(0,0,'TAHUN PELAJARAN '.Date("Y").'/'.(String)(Date("Y")+1),0,1,'C');

$pdf->Cell(0,1.2,'',0,1);


//==============================================================================

//===============================Data Pendaftar=================================
// print_r('R awal='.$rasio);
// echo "<br>";
// print_r('R Akhir='.$rasio);
// echo "<br>";
// print_r($w_foto);
// echo "<br>";
// print_r($h_foto);
// $pdf->Cell(0,0,'',0,1);

// Foto Diri
// Mendapatkan ukuran real foto
// $uk_foto = getimagesize(base_url().decrypt_url($file['path']));
// $w_foto = $uk_foto[0];
// $h_foto = $uk_foto[1];
// $rasio = $h_foto/3.3;
// $w_foto /= $rasio;
// $h_foto /= $rasio;
// // print_r(7.35+floatval($w_foto));
// $pdf->Image(base_url().decrypt_url($file['path']),2.95,(2.95*2),$w_foto,$h_foto);

// Identitas Umum
$kiri_semua = 0;
// $wrap_umum = 10.4-$w_foto;
// $kiri_umum = $w_foto + $kiri_semua + 0.5;

// $pdf->SetFont('','B');
// $pdf->Cell($kiri_umum,0,'',0,0);
// $pdf->Cell(4.2,$line_spacing,'NAMA',0,0);
// $pdf->Cell(0.3,$line_spacing,':',0,0);
// $pdf->SetFont('','');
// $pdf->MultiCell($wrap_umum,$line_spacing,$siswa['nama']);
// $pdf->MultiCell($wrap_umum,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

$jalur = '';
if ($pendaftaran['jalur_daftar'] == 'prestasi'){
	$jalur = 'P';
}else{
	$jalur = 'U';
}
$sekolah= '';
if ($pendaftaran['sekolah'] == 'smp'){
	$sekolah = 'S';
}else{
	$sekolah = 'M';
}
$no_peserta = 'MAN-'.$pendaftaran['id'].$jalur.$sekolah;
// $pdf->SetFont('','B');
// $pdf->Cell($kiri_umum,0,'',0,0);
// $pdf->Cell(4.2,$line_spacing,'NO. PESERTA',0,0);
// $pdf->Cell(0.3,$line_spacing,':',0,0);
// $pdf->SetFont('','');
// $pdf->MultiCell($wrap_umum,$line_spacing,$no_peserta);
// // $pdf->MultiCell($wrap_umum,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

// $pdf->SetFont('','B');
// $pdf->Cell($kiri_umum,0,'',0,0);
// $pdf->Cell(4.2,$line_spacing,'JALUR DAFTAR',0,0);
// $pdf->Cell(0.3,$line_spacing,':',0,0);
// $pdf->SetFont('','');
// $pdf->MultiCell($wrap_umum,$line_spacing,strtoupper($pendaftaran['jalur_daftar']));
// // $pdf->MultiCell($wrap_umum,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

// $pdf->SetFont('','B');
// $pdf->Cell($kiri_umum,0,'',0,0);
// $pdf->Cell(4.2,$line_spacing,'PILIHAN JURUSAN',0,0);
// $pdf->Cell(0.3,$line_spacing,':',0,0);
// $pdf->SetFont('','');
// $pdf->MultiCell($wrap_umum,$line_spacing,strtoupper($pendaftaran['jurusan']));
// // $pdf->MultiCell($wrap_umum,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

// $pdf->SetFont('','B');
// $pdf->Cell($kiri_umum,0,'',0,0);
// $pdf->Cell(4.2,$line_spacing,'ASAL SEKOLAH',0,0);
// $pdf->Cell(0.3,$line_spacing,':',0,0);
// $pdf->SetFont('','');
// $pdf->MultiCell($wrap_umum,$line_spacing,strtoupper($pendaftaran['nama_sekolah']));
// // $pdf->MultiCell($wrap_umum,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

// $date = explode('-',explode(' ',$pendaftaran['tgl_daftar'])[0]);
// $date[1] = $bulan[$date[1]];

// $pdf->SetFont('','B');
// $pdf->Cell($kiri_umum,0,'',0,0);
// $pdf->Cell(4.2,$line_spacing,'TANGGAL DAFTAR',0,0);
// $pdf->Cell(0.3,$line_spacing,':',0,0);
// $pdf->SetFont('','');
// $pdf->MultiCell($wrap_umum,$line_spacing,$date[2].' '.$date[1].' '.$date[0]);
// // $pdf->MultiCell($wrap_umum,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

// $pdf->Cell(0,0.4,'',0,1);
//==============================================================================
//================================ Pertimbangan ================================
$tab = 2.5;
$titik2 = 0.4;
$nomor = 0.4;
$wrap_semua = 21.59-($tab+$nomor+$kiri_semua+$titik2+$kiri_semua+5.08);

$pdf->SetFont('','','');
$pdf->Cell(0,$line_spacing,'Kepala Madrasah Aliyah Negeri 1 Cianjur setelah :',0,1);

$pdf->SetFont('','B');
// $pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,$line_spacing,'Menimbang',0);
$pdf->SetFont('','');
$pdf->Cell($titik2,$line_spacing,':',0);
$pdf->Cell($nomor,$line_spacing,'1.',0);
$pdf->MultiCell($wrap_semua,0.4,'Bahwa untuk memberikan informasi yang pasti dan keputusan akhir perihal seleksi calon peserta didik baru yang mendaftar tahun pelajaran  '.Date("Y").'/'.(String)(Date("Y")+1).', maka dipandang perlu penetapan daftar calon peserta didik baru MAN 1 Cianjur yang dinyatakan diterima dalam seleksi');
$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'2.',0);
$pdf->MultiCell($wrap_semua,0.4,'Bahwa untuk keperluan tersebut dipandang perlu adanya surat keputusan Kepala Madrasah Aliyah Negeri 1 Cianjur.');
// $pdf->MultiCell($wrap_semua,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

$pdf->Cell(0,0.2,'',0,1);

$pdf->SetFont('','B');
// $pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,$line_spacing,'Mengingat',0);
$pdf->SetFont('','');
$pdf->Cell($titik2,$line_spacing,':',0);
$pdf->Cell($nomor,$line_spacing,'1.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional.');
$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'2.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Keputusan Menteri Agama (KMA) Nomor 120 Tahun 1980 tentang Pendelegasian Tugas.');
$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'3.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Keputusan Kepala MAN 1 Cianjur Nomor 016/Ma.10.10/PP.006/06/'.Date("Y").' tentang Penetapan Panitia Penerimaan Peserta Didik Baru tahun pelajaran  '.Date("Y").'/'.(String)(Date("Y")+1).'.');
$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'4.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Kalender Pendidikan Madrasah Aliyah Kantor Kementrian Agama Propinsi Jawa Barat Tahun Pelajaran  '.Date("Y").'/'.(String)(Date("Y")+1).'.');
$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'5.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Edaran Kepala MAN 1 Cianjur tentang Pedoman/Petunjuk Teknis Penerimaan Peserta didik Baru (PPDB) tahun pelajaran  '.Date("Y").'/'.(String)(Date("Y")+1).'.');
// $pdf->MultiCell($wrap_semua,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

$pdf->Cell(0,0.2,'',0,1);

$pdf->SetFont('','B');
// $pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,$line_spacing,'Memperhatikan',0);
$pdf->SetFont('','');
$pdf->Cell($titik2,$line_spacing,':',0);
$pdf->MultiCell($wrap_semua+$nomor,$line_spacing,'Hasil Rapat Panitia Penerimaan Peserta Didik Baru (PPDB) MAN 1 Cianjur tentang penerimaan Peserta Didik Baru melalui jalur seleksi '.$pendaftaran['jalur_daftar'].' pada tanggal 18 Juni '.Date("Y").' dan hasil kelulusan Ujian Tingkat SMP/MTs pada tanggal 5 Juni 2020.');
// $pdf->MultiCell($wrap_semua,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

$pdf->Cell(0,0.2,'',0,1);

$pdf->SetFont('','B');
// $pdf->Cell($kiri_semua,0);
$pdf->Cell(0,$line_spacing,'Memutuskan',0,1,'C');
// $pdf->MultiCell($wrap_semua,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

$pdf->SetFont('','B');
// $pdf->Cell($kiri_semua,0);
$pdf->Cell($tab,$line_spacing,'Menetapkan',0);
$pdf->SetFont('','');
$pdf->Cell($titik2,$line_spacing,':',0);
$pdf->Cell($nomor,$line_spacing,'1.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Siswa Berikut');

$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'',0);
$pdf->cell(2,$line_spacing,'Nama');
$pdf->Cell($titik2,$line_spacing,':',0);
$pdf->MultiCell($wrap_semua-(2+$titik2),$line_spacing,$siswa['nama']);

$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'',0);
$pdf->cell(2,$line_spacing,'No. Peserta');
$pdf->Cell($titik2,$line_spacing,':',0);
$pdf->MultiCell($wrap_semua-(2+$titik2),$line_spacing,$no_peserta);

$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'',0);
$pdf->Cell(2,$line_spacing,'Asal Sekolah');
$pdf->Cell($titik2,$line_spacing,':',0);
$pdf->MultiCell($wrap_semua-(2+$titik2),$line_spacing,$pendaftaran['nama_sekolah']);

$pdf->Cell(0,0.2,'',0,1);

// Garis kurung
$tambahan = 0.38;
$h_kurung = 18.8+$tambahan;
$v_kurung = 13.7;
$pdf->Line($v_kurung,$h_kurung,21.59-$v_kurung,$h_kurung);
$pdf->Line($v_kurung,$h_kurung+0.9,21.59-$v_kurung,$h_kurung+0.9);
$pdf->Line($v_kurung,$h_kurung,$v_kurung,$h_kurung+0.9);
$pdf->Line(21.59-$v_kurung,$h_kurung+0.9,21.59-$v_kurung,$h_kurung);

// Garis coret
$pdf->Line(11.5,19.2+$tambahan,13.45,19.2+$tambahan);
$pdf->Line(11.5,19.25+$tambahan,13.45,19.25+$tambahan);

$pdf->SetFont('','B',16);
// $pdf->Cell($kiri_semua,0);
$pdf->Cell(0,1.2,'DITERIMA / TIDAK',0,1,'C');


$pdf->Cell(0,0.2,'',0,1);

$pdf->Cell($tab,$line_spacing,'',0);
$pdf->SetFont('','',9);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'2.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Kepada nama-nama tersebut di atas agar segera melakukan registrasi sebagai peserta didik baru MAN 1 Cianjur Tahun pelajaran '.Date("Y").'-'.(String)(Date("Y")+1).' antara tanggal '.$tgl_pengumuman.' sampai '.$tgl_akhir_registrasi.' '.Date("Y").' pada hari dan jam kerja.');
$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'3.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Surat keputusan ini diberikan kepada yang bersangkutan untuk diketahui dan dilaksanakan sebagaimana mestinya.');
$pdf->Cell($tab,$line_spacing,'',0);
$pdf->Cell($titik2,$line_spacing,'',0);
$pdf->Cell($nomor,$line_spacing,'4.',0);
$pdf->MultiCell($wrap_semua,$line_spacing,'Apabila dikemudian hari terdapat kekeliruan dalam keputusan ini akan diadakan perbaikan sebagaimana mestinya.');
// $pdf->MultiCell($wrap_semua,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

//==================================Kepala Sekolah==================================
$pdf->Cell(0,0.4,'',0,1);
// $pdf->Ln();

// $pdf->SetFont('','');
// $pdf->Cell($kiri_semua,0);
// $pdf->MultiCell($wrap_semua+$tab+$titik2+$nomor
// ,$line_spacing,'Dengan ini saya menyatakan bahwa data yang saya masukan benar dan jika data yang saya masukan tidak benar maka saya sanggup menerima segala konsekwensi yang ada.');

// $pdf->Ln();
$pdf->Cell($tab+$titik2+$nomor+8,$line_spacing,'',0);
$pdf->Cell(1.9,$line_spacing,'Ditetapkan di',0);
$pdf->Cell($titik2-0.1,$line_spacing,':',0);
$pdf->Cell(0,$line_spacing,'Cianjur',0,1);
$pdf->Cell($tab+$titik2+$nomor+8,$line_spacing,'',0);
$pdf->Cell(1.9,$line_spacing,'Pada Tanggal',0);
$pdf->Cell($titik2-0.1,$line_spacing,':',0);
$pdf->Cell(0,$line_spacing,$tgl_pengumuman.' '.Date("Y").'',0,1);

$pdf->Cell(0,0.4,'',0,1);

$pdf->Cell($tab+$titik2+$nomor+8,$line_spacing,'',0);
$pdf->Cell(1.9,$line_spacing,'Plt.KEPALA MAN 1 CIANJUR',0,1);

$pdf->Cell(0,1.5,'',0,1);

$pdf->Cell($tab+$titik2+$nomor+8,$line_spacing,'',0);
$pdf->Cell(1.9,$line_spacing,'DRS.SARAYA',0,1);
$pdf->Cell($tab+$titik2+$nomor+8,$line_spacing,'',0);
$pdf->Cell(1.9,$line_spacing,'NIP. 196504282005011002',0,1);

//==================================== Tembusan ====================================
$pdf->Cell(0,3,'',0,1);

$pdf->Cell(0,$line_spacing,'Tembusan disampaikan kepada :',0,1);
$pdf->Cell($nomor,$line_spacing,'1.',0);
$pdf->Cell(0,$line_spacing,'Yth. Kepala Kanwil Kementrian Agama Prop. Jawa Barat di Bandung',0,1);
$pdf->Cell($nomor,$line_spacing,'2.',0);
$pdf->Cell(0,$line_spacing,'Yth. Kepala Kantor Kementrian Agama Kab. Cianjur di Cianjur',0,1);
$pdf->Cell($nomor,$line_spacing,'3.',0);
$pdf->Cell(0,$line_spacing,'Yth. Kepala Dinas Pendidikan Kab.Cianjur di Cianjur',0,1);
$pdf->Cell($nomor,$line_spacing,'4.',0);
$pdf->Cell(0,$line_spacing,'Pertinggal',0,1);
$pdf->Image(base_url().'assets/images/ttd_kepsek.png',14.4,24.8,3);
$pdf->Image(base_url().'assets/images/cap_man1.png',11.5,24,4);
// $pdf->Cell(0,-0.4,'',0,1);
// $pdf->Cell($kiri_semua);
// $pdf->Cell(0,$line_spacing, '(................................)',0,1,'R');
// $pdf->MultiCell($wrap_semua,$line_spacing,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada pharetra mi in consequat. Nam nec odio nec odio venenatis congue. Quisque finibus placerat orci et tincidunt. Phasellus eu lacus scelerisque, lacinia odio non, eleifend risus. Quisque sodales dignissim felis ullamcorper commodo. Proin id orci a lacus blandit ornare. Aliquam lectus ex, tempor at vulputate id, blandit in enim. Morbi auctor, nisi sodales scelerisque mattis, ex arcu facilisis risus, eget varius neque odio at metus. Aenean porttitor risus quis leo elementum mattis. Etiam suscipit nec nisi sit amet imperdiet. Cras accumsan ullamcorper velit, non eleifend enim mollis nec.');

// Cetak PDF
$pdf->output();
// $pdf->output('D', 'Surat Kelulusan PPDB Online MAN 1 Cianjur.pdf');
?>
