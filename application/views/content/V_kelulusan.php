<?php
/******************************************
* Filename    : V_kelulusan.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-05-31
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten hasil kelulusan
*
******************************************/
date_default_timezone_set('Asia/Jakarta');
?>
<div class="container" style="margin-top:100px; margin-bottom:30px;">
  <div class="card">
    <!-- isi konten disini -->
    <h3 class="card-header">Info Kelulusan MAN 1 Cianjur</h3>
    <div class="card-body">
      <h1 class="card-title">Pengumuman Kelulusan <?=date("Y")?></h1>
      <table class="table table-bordered">
        <tr>
          <td>Nomor Peserta</td>
          <?php
          $jalur = '';
          $date_ex = '';
          if ($pendaftaran['jalur_daftar'] == 'prestasi'){
          	$jalur = 'P';
          	$date_ex = date_create("2021-05-29");
          }else{
          	$jalur = 'U';
          	$date_ex = date_create("2021-06-07");
          }
          $date_ex = date_create("2021-05-23");
          $no_peserta = 'MAN-'.$pendaftaran['id'].$jalur;
          ?>
          <td><?=$no_peserta?></td>
        </tr>
        <tr>
          <td>Nama Siswa</td>
          <td><?=$siswa['nama']?></td>
        </tr>
        <tr>
          <td>Asal Sekolah</td>
          <td><?=$pendaftaran['nama_sekolah']?></td>
        </tr>
        <tr>
          <td>Program Pilihan</td>
          <td><?=$pendaftaran['jurusan']?></td>
        </tr>
      </table>
      <?php
      $date_now = date_create(date("Y-m-d"));
      $diff = date_diff($date_ex, $date_now);
      if ($pendaftaran['kelulusan'] == "" || $diff->format("%R%a") < 0){
        ?>
        <div class="alert alert-warning text-center" role="alert">
          <b>MAAF!</b> Informasi kelulusan belum tersedia.</b>
        </div>
        <?php
      }else
      if ($pendaftaran['kelulusan'] == "cadangan"){
        ?>
        <div class="alert alert-warning text-center" role="alert">
          <b>LULUS CADANGAN!</b> Anda dapat melakukan registrasi jika terdapat calon siswa - siswi yang mengundurkan diri. Hubungi admin atau panitia untuk informasi lebih lanjut.</b>
        </div>
        <?php
      }else
      if ($pendaftaran['kelulusan'] == "tidak_lulus"){
        ?>
        <div class="alert alert-danger text-center" role="alert">
          <b>MAAF!</b> Anda dinyatakan <b>TIDAK LULUS</b>
        </div>
        <?php
      }else
      if ($pendaftaran['kelulusan'] == 'lulus') {
        ?>
        <div class="alert alert-success text-center" role="alert">
          <b>SELAMAT!</b> Anda dinyatakan <b>LULUS</b>
        </div>
        <div class="card-text mt-4">
          <div class="row">
            <div class="col-md-2">
              File Formulir :<br><a href="<?=base_url('c_cetak_formulir')?>" class="btn btn-primary">Download</a>
            </div>
            <div class="col-md-2">
              File Surat Kelulusan :<br><a href="<?=base_url('c_cetak_kelulusan')?>" class="btn btn-primary">Download</a>
            </div>
            <div class="col-md-2">
              File Surat Pernyataan :<br><a href="<?=base_url()?>/assets/usr/SURAT_PERNYATAAN_PESERTA_DIDIK_BARU.docx" target="_blank" class="btn btn-primary">Download</a>
            </div>
          </div>
        </div>
        <div class="card-text mt-4">
          Catatan : .......
        </div>
        <?php
      }
       ?>
    </div>

  </div><!-- isi konten sampai sini -->
</div>
