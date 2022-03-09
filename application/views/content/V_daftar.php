<?php
/******************************************
* Filename    : V_daftar.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-03
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten pendaftaran (Form Pendaftaran)
*
******************************************/
 ?>
<style type="text/css">
	body{
		color: #fff;
		/* background: #63738a; */
    background-image: url("<?=base_url()?>assets/images/kegiatan/background_daftar.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    background-attachment: fixed;
	}

  .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{
        border-radius: 3px;
    }
	.signup-form{
		/* width: 600px auto; */
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 15%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
    	margin-top: 30px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	/* .signup-form .form-group{
		margin-bottom: 20px;
	} */
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{
        font-size: 16px;
        font-weight: bold;
		    min-width: 140px;
        outline: none !important;
    }
	/* .signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	} */
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form a{
		color: #5cb85c;
		text-decoration: none;
	}
	.signup-form a:hover{
		text-decoration: underline;
	}
</style>

<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col col-md-8">
      <form action="<?=base_url('c_daftar')?>/add/1" method="post" enctype="multipart/form-data">

        <!-- Data Siswa Mulai -->
        <div class="signup-form">
          <h2>Data Siswa</h2>
          <!-- <p class="hint-text">Pendaftaran Peserta Didik Baru Tahun Ajaran 2020/2021</p> -->
          <div class="form-group">
            <label for="">Jalur Pendaftaran <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <?php 
              $date_ex = date_create("2021-05-29");
              $date_now = date_create(date("Y-m-d"));
              $diff = date_diff($date_ex, $date_now);
              if ($diff->format("%R%a") < 0){
                ?>
                <div class="col-sm-3">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jalur_daftar" id="jalur_daftar1" value="prestasi" onclick="tampil_prestasi()">
                    Jalur Prestasi
                  </div>
                </div>
                <?php
              }
              ?>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jalur_daftar" id="jalur_daftar2" value="umum" onclick="sembunyi_prestasi()">
                  Jalur Umum
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">NISN <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="nisn" id="nisn" placeholder="" required="required" onchange="cek_panjang_nisn()">
            </div>
            <div class="form-group col-sm-4">
              <label for="">NIK Siswa <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="nik" id="nik" placeholder="" required="required" onchange="cek_panjang_nik()">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-8">
              <label for="">Nama Lengkap <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="nama_lengkap" placeholder="" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="">Jenis Kelamin <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <div class="col-sm-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gender1" value="laki-laki">
                  Laki-laki
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gender2" value="perempuan">
                  Perempuan
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Agama <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="agama" id="agama">
                <option value="">--</option>
                <?php
                foreach ($agama as $_agama) {
                  ?>
                  <option value="<?=$_agama['agama']?>"><?=$_agama['agama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-line">
              <div class="form-group">
                <label for="">Tempat Lahir <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="tpt_lahir" placeholder="" required="required">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="tanggal_lahir">
                <label for="">Tanggal Lahir <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="tgl_lahir" placeholder="HH/BB/TTTT" required="required">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Hobi <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="hobi" id="hobi">
                <option value="">--</option>
                <?php
                foreach ($hobi as $_hobi) {
                  ?>
                  <option value="<?=$_hobi['hobi']?>"><?=$_hobi['hobi']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">Cita-cita <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="cita-cita" id="cita-cita">
                <option value="">--</option>
                <?php
                foreach ($citacita as $_citacita) {
                  ?>
                  <option value="<?=$_citacita['citacita']?>"><?=$_citacita['citacita']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-12">
              <label for="">Alamat <b style="color:red;">(WAJIB)*</b></label>
              <textarea class="form-control" name="alamat_rumah" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Provinsi <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="provinsi" id="provinsi" onchange="filter_kabupaten()">
                <option value="">Pilih Provinsi</option>
                <?php
                foreach ($provinsi as $_provinsi) {
                  ?>
                  <option value="<?=$_provinsi['id_prov']?>"><?=$_provinsi['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Kabupaten <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kabupaten" id="kabupaten" onchange="filter_kecamatan()">
                <option value="">--</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Kecamatan <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kecamatan" id="kecamatan" onchange="filter_desa()">
                <option value="">--</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Desa <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="desa" id="desa">
                <option value="">--</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Kode Pos <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="kode_pos" placeholder="" required="required">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Tempat Tinggal Siswa <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="tempat_tinggal" id="tempat_tinggal">
                <option value="">--</option>
                <?php
                foreach ($tempattinggal as $_tempattinggal) {
                  ?>
                  <option value="<?=$_tempattinggal['tempattinggal']?>"><?=$_tempattinggal['tempattinggal']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-4">
              <label for="">Jarak Lokasi ke Madrasah <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="jarak" id="jarak">
                <option value="">--</option>
                <?php
                foreach ($jarak as $_jarak) {
                  ?>
                  <option value="<?=$_jarak['jarak']?>"><?=$_jarak['jarak']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group col-sm-4">
              <label for="">Transportasi ke Madrasah <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="transportasi" id="transportasi">
                <option value="">--</option>
                <?php
                foreach ($transportasi as $_transportasi) {
                  ?>
                  <option value="<?=$_transportasi['transportasi']?>"><?=$_transportasi['transportasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="">Status Anak <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="status1" value="kandung">
                  Anak Kandung
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="status2" value="tiri">
                  Anak Tiri
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Anak Ke <b style="color:red;">(WAJIB)*</b></label>
              <input type="number" class="form-control" name="anak_ke" placeholder="" required="required">
            </div>
            <div class="form-group col-sm-4">
              <label for="">Jumlah Saudara <b style="color:red;">(WAJIB)*</b></label>
              <input type="number" class="form-control" name="jumlah_sdr" placeholder="" required="required">
            </div>
            <div class="form-group col-sm-4">
              <label for="">Tinggi Badan <b style="color:red;">(WAJIB)*</b></label>
              <input type="number" class="form-control" name="tinggi_bdn" placeholder="...Cm" required="required">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Nomor HP <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="hp_siswa" placeholder="" required="required">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Email <b style="color:red;">(WAJIB)*</b></label>
              <input type="email" class="form-control" name="email" placeholder="" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Foto Pendaftar <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="foto_diri" id="foto_diri" onchange="cek_ukuran1()" accept="image/jpeg, image/png" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload foto formal dengan format jpg, jpeg, png, dan sejenisnya  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="foto_diri_jenis" id="foto_diri_jenis" value="" hidden>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Akte <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="scan_akte" id="scan_akte" onchange="cek_ukuran2()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_akte_jenis" id="scan_akte_jenis" value="" hidden>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Surat Keterangan Sehat</label>
            <input type="file" class="form-control-file" name="scan_sehat" id="scan_sehat" onchange="cek_ukuran3()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_sehat_jenis" id="scan_sehat_jenis" value="" hidden>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Surat Kelakuan Baik</label>
            <input type="file" class="form-control-file" name="scan_baik" id="scan_baik" onchange="cek_ukuran4()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_baik_jenis" id="scan_baik_jenis" value="" hidden>
          </div>
        </div>
        <!-- Data Siswa Akhir -->

        <!-- Data Orang Tua Mulai -->
        <div class="signup-form">
          <h2>Data Orang Tua</h2>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">Nomor Kartu Keluarga <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="no_kk" placeholder="" required="required">
            </div>
            <div class="form-group col-sm-6">
              <label for="exampleInputFile">File Scan Kartu Keluarga <b style="color:red;">(WAJIB)*</b></label>
              <input type="file" class="form-control-file" name="scan_kk" id="scan_kk" onchange="cek_ukuran5()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp" required="required">
              <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
              <input type="text" class="form-control" name="scan_kk_jenis" id="scan_kk_jenis" value="" hidden>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="">NIK Ayah <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" onchange="cek_panjang_nik_ayah()" placeholder="" required="required">
              </div>
              <div class="form-group">
                <label for="">Nama Ayah <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="nama_ayah" placeholder="" required="required">
              </div>
              <div class="form-group" id="tanggal_lahir">
                <label for="">Tanggal Lahir <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="tgl_lahir_ayah" placeholder="HH/BB/TTTT" required="required">
              </div>
              <div class="form-group">
                <label for="">Pendidikan Ayah <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="pend_ayah" id="pend_ayah">
                  <option value="">--</option>
                  <?php
                  foreach ($pendidikan as $_pendidikan) {
                    ?>
                    <option value="<?=$_pendidikan['pendidikan']?>"><?=$_pendidikan['pendidikan']?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pekerjaan Ayah <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="kerja_ayah" id="kerja_ayah">
                  <option value="">--</option>
                  <?php
                  foreach ($kerja as $_kerja) {
                    ?>
                    <option value="<?=$_kerja['kerja']?>"><?=$_kerja['kerja']?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Penghasilan/Bulan <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="gaji_ortu" id="gaji_ortu">
                  <option value="">--</option>
                  <?php
                  foreach ($penghasilan as $_penghasilan) {
                    ?>
                    <option value="<?=$_penghasilan['penghasilan']?>"><?=$_penghasilan['penghasilan']?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">NIK Ibu <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" onchange="cek_panjang_nik_ibu()" placeholder="" required="required">
              </div>
              <div class="form-group">
                <label for="">Nama Ibu <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="nama_ibu" placeholder="" required="required">
              </div>
              <div class="form-group" id="tanggal_lahir">
                <label for="">Tanggal Lahir <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="tgl_lahir_ibu" placeholder="HH/BB/TTTT" required="required">
              </div>
              <div class="form-group">
                <label for="">Pendidikan Ibu <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="pend_ibu" id="pend_ibu">
                  <option value="">--</option>
                  <?php
                  foreach ($pendidikan as $_pendidikan) {
                    ?>
                    <option value="<?=$_pendidikan['pendidikan']?>"><?=$_pendidikan['pendidikan']?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pekerjaan Ibu <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="kerja_ibu" id="kerja_ibu">
                  <option value="">--</option>
                  <?php
                  foreach ($kerja as $_kerja) {
                    ?>
                    <option value="<?=$_kerja['kerja']?>"><?=$_kerja['kerja']?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nomor HP <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="hp_ortu" placeholder="" required="required">
              </div>
            </div>
          </div>
        </div>
        <!-- Data Orang Tua Selesai -->

        <!-- Data Wali Mulai -->
        <div class="signup-form">
          <h2>Data Wali</h2>

          <div class="row">
            <div class="form-group col-sm-7">
              <label for="">Nama Wali</label>
              <input type="text" class="form-control" name="nama_wali" placeholder="">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3" id="tanggal_lahir">
              <label for="">Tanggal Lahir</label>
              <input type="text" class="form-control" name="tgl_lahir_wali" placeholder="HH/BB/TTTT">
            </div>
            <div class="form-group col-sm-4">
              <label for="">NIK Wali</label>
              <input type="number" class="form-control" name="nik_wali" id="nik_wali" onchange="cek_panjang_nik_wali()" placeholder="">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Pendidikan Wali</label>
              <select class="form-control" name="pend_wali">
                <option value="">--</option>
                <?php
                foreach ($pendidikan as $_pendidikan) {
                  ?>
                  <option value="<?=$_pendidikan['pendidikan']?>"><?=$_pendidikan['pendidikan']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">Pekerjaan Wali</label>
              <select class="form-control" name="kerja_wali">
                <option value="">--</option>
                <?php
                foreach ($kerja as $_kerja) {
                  ?>
                  <option value="<?=$_kerja['kerja']?>"><?=$_kerja['kerja']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">Penghasilan Wali</label>
              <select class="form-control" name="gaji_wali">
                <option value="">--</option>
                <?php
                foreach ($penghasilan as $_penghasilan) {
                  ?>
                  <option value="<?=$_penghasilan['penghasilan']?>"><?=$_penghasilan['penghasilan']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>
        </div>
        <!-- Data Wali Selesai -->

        <!-- Sekolah Asal Mulai -->
        <div class="signup-form">
          <h2>Sekolah Asal (SMP/MTS)</h2>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Sekolah <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="sekolah" id="sekolah">
                <option value="">--</option>
                <option value="smp">SMP</option>
                <option value="mts">MTS</option>
              </select>
            </div>
            <div class="form-group col-sm-7">
              <label for="">Nama Sekolah <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="nama_sekolah" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="">Status Sekolah <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <div class="col-sm-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status_sekolah" id="status_sekolah1" value="negeri">
                  Negeri
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status_sekolah" id="status_sekolah2" value="swasta">
                  Swasta
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-12">
              <label for="">Alamat <b style="color:red;">(WAJIB)*</b></label>
              <textarea class="form-control" name="alamat_sekolah" required="required" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-7">
              <label for="">Kepala Sekolah <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="kepala_sekolah" required="required">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-3 form-line">
              <div class="form-group">
                <label for="">NPSN <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" name="npsn" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Tahun Lulus <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" name="thn_lulus" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-7">
              <div class="form-group">
                <label for="">No. Ijazah</label>
                <input type="text" name="no_ijazah" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File Scan Surat Keterangan Kelulusan</label>
            <input type="file" class="form-control-file" name="scan_lulus" id="scan_lulus" onchange="cek_ukuran6()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_lulus_jenis" id="scan_lulus_jenis" value="" hidden>
          </div>
        </div>
        <!-- Sekolah Asal Selesai -->

        <!-- Data Nilai Ujian Nasional Mulai -->
        <!-- <div class="signup-form">
          <h2>Data Nilai Ujian Nasional</h2>

          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">No. SKHUN</label>
              <input type="text" name="no_skhun" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label for="">No Peserta UN SMP/MTS</label>
              <input type="text" name="no_un" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="">Bahasa Inggris</label>
                <input type="number" class="form-control" name="un_inggris" placeholder="">
              </div>
              <div class="form-group">
                <label for="">Matematika</label>
                <input type="number" class="form-control" name="un_mtk" placeholder="">
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bahasa Indonesia</label>
                <input type="number" class="form-control" name="un_indo" placeholder="">
              </div>
              <div class="form-group">
                <label for="">IPA</label>
                <input type="number" class="form-control" name="un_ipa" placeholder="">
              </div>
            </div>
          </div>
        </div> -->
        <!-- Data Nilai Ujian Nasional Selesai -->

        <!-- Data Nilai Raport Semester 1 Mulai -->
        <div class="signup-form">
          <h2>Data Nilai Raport Semester 1</h2>

          <div class="row">
            <div class="col-sm-4 form-line">
              <div class="form-group">
                <label for="">Bahasa Indonesia <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms1_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms1_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms1_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms1_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms1_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms1_pai" class="form-control" required="required">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Rapot Semester 1 <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="scan_semester1" id="scan_semester1" onchange="cek_ukuran7()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_semester1_jenis" id="scan_semester1_jenis" value="" hidden>
          </div>
        </div>
        <!-- Data Nilai Raport Semester 1 Selesai -->

        <!-- Data Nilai Raport Semester 2 Mulai -->
        <div class="signup-form">
          <h2>Data Nilai Raport Semester 2</h2>

          <div class="row">
            <div class="col-sm-4 form-line">
              <div class="form-group">
                <label for="">Bahasa Indonesia <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms2_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms2_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms2_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms2_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms2_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms2_pai" class="form-control" required="required">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Rapot Semester 2 <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="scan_semester2" id="scan_semester2" onchange="cek_ukuran8()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_semester2_jenis" id="scan_semester2_jenis" value="" hidden>
          </div>
        </div>
        <!-- Data Nilai Raport Semester 2 Selesai -->

        <!-- Data Nilai Raport Semester 3 Mulai -->
        <div class="signup-form">
          <h2>Data Nilai Raport Semester 3</h2>

          <div class="row">
            <div class="col-sm-4 form-line">
              <div class="form-group">
                <label for="">Bahasa Indonesia <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms3_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms3_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms3_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms3_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms3_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms3_pai" class="form-control" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File Scan Rapot Semester 3 <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="scan_semester3" id="scan_semester3" onchange="cek_ukuran9()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_semester3_jenis" id="scan_semester3_jenis" value="" hidden>
          </div>
        </div>
        <!-- Data Nilai Raport Semester 3 Selesai -->

        <!-- Data Nilai Raport Semester 4 Mulai -->
        <div class="signup-form">
          <h2>Data Nilai Raport Semester 4</h2>

          <div class="row">
            <div class="col-sm-4 form-line">
              <div class="form-group">
                <label for="">Bahasa Indonesia <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms4_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms4_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms4_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms4_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms4_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms4_pai" class="form-control" required="required">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Rapot Semester 4 <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="scan_semester4" id="scan_semester4" onchange="cek_ukuran10()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_semester4_jenis" id="scan_semester4_jenis" value="" hidden>
          </div>
        </div>
        <!-- Data Nilai Raport Semester 4 Selesai -->

        <!-- Data Nilai Raport Semester 5 Mulai -->
        <div class="signup-form">
          <h2>Data Nilai Raport Semester 5</h2>

          <div class="row">
            <div class="col-sm-4 form-line">
              <div class="form-group">
                <label for="">Bahasa Indonesia <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms5_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms5_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms5_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms5_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms5_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input type="number" name="sms5_pai" class="form-control" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File Scan Rapot Semester 5 <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="scan_semester5" id="scan_semester5" onchange="cek_ukuran11()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_semester5_jenis" id="scan_semester5_jenis" value="" hidden>
          </div>
        </div>
        <!-- Data Nilai Raport Semester 5 Selesai -->

        <!-- Prestasi Yang Pernah Diraih Mulai -->
        <div class="signup-form" id="opsi_prestasi" style="display:none;">
          <h2>Prestasi Yang Pernah Diraih</h2>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Prestasi 1</label>
              <input type="text" name="pres1" class="form-control">
            </div>

            <div class="form-group col-sm-3">
              <label for="">Tingkat</label>
              <select class="form-control" name="tp1">
                <option value="">--</option>
                <?php
                foreach ($tingkat as $_tingkat) {
                  ?>
                  <option value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>

            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat1" id="sertifikat1" onchange="cek_ukuran12()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
              <input type="text" class="form-control" name="sertifikat1_jenis" id="sertifikat1_jenis" value="" hidden>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Prestasi 2</label>
              <input type="text" name="pres2" class="form-control">
            </div>

            <div class="form-group col-sm-3">
              <label for="">Tingkat</label>
              <select class="form-control" name="tp2">
                <option value="">--</option>
                <?php
                foreach ($tingkat as $_tingkat) {
                  ?>
                  <option value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>

            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat2" id="sertifikat2" onchange="cek_ukuran13()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
              <input type="text" class="form-control" name="sertifikat2_jenis" id="sertifikat2_jenis" value="" hidden>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Prestasi 3</label>
              <input type="text" name="pres3" class="form-control">
            </div>

            <div class="form-group col-sm-3">
              <label for="">Tingkat</label>
              <select class="form-control" name="tp3">
                <option value="">--</option>
                <?php
                foreach ($tingkat as $_tingkat) {
                  ?>
                  <option value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>

            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat3" id="sertifikat3" onchange="cek_ukuran14()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
              <input type="text" class="form-control" name="sertifikat3_jenis" id="sertifikat3_jenis" value="" hidden>
            </div>
          </div>
        </div>
        <!-- Prestasi Yang Pernah Diraih Selesai -->

        <!-- Konfirmasi Data Pendaftar Mulai -->
        <div class="signup-form">
          <h2>Konfirmasi Data Pendaftar</h2>

          <div class="form-group">
            <label for="">Memiliki KIP (Kartu Indonesia Pintar)?</label>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="kip" id="kip1" value="Iya" onclick="tampil_kip()">
                  Iya
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="kip" id="kip2" value="Tidak" onclick="sembunyi_kip()" checked>
                  Tidak
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="grupkip" style="display:none;">
            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File KIP</label>
              <input type="file" class="form-control-file" name="file_kip" id="file_kip" onchange="cek_ukuran15()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
              <input type="text" class="form-control" name="file_kip_jenis" id="file_kip_jenis" value="" hidden>
            </div>

          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Jurusan <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="jurusan" id="jurusan" onchange="filter_peminatan()">
                <option value="">--</option>
                <?php
                foreach ($jurusan as $_jurusan) {
                  ?>
                  <option value="<?=$_jurusan['jurusan']?>"><?=$_jurusan['jurusan']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-4" hidden>
              <label for="">Peminatan</label>
              <select class="form-control" name="peminatan" id="peminatan">
                <option value="">--</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required">Dengan ini saya menyatakan bahwa, Data yang saya isikan di Formulir ini adalah Benar adanya sesuai dengan bukti-bukti yang ada dan segera verifikasi data 1 minggu sebelum Tes</label>
          </div>
          <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="return cek_signup()">Daftar</button>
              </div>
            </div>
          </div>
          <div class="text-center">
            Sudah memiliki akun? <a href="<?=base_url('C_login')?>">Sign in</a>
          </div>
        </div>
        <!-- Konfirmasi Data Pendaftar Selesai -->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function cek_signup(){
    var nisn = document.getElementById('nisn').value;
    if (nisn != ""){
      var link = "<?=base_url('C_daftar')?>"+"/cek_nisn/"+nisn;
      var cek = -3;
      $(document).ready(function(){
        $.ajax({
          type:"GET",
          url:link,
          async:false,
          success:function(isi){
            cek = isi;
          }
        });
      });
      // alert(cek);
      if (cek == 1){
        if (confirm('Apakah data yang anda masukkan sudah benar?')) {
          // Save it!
          if(document.getElementById('jalur_daftar1').checked == false && document.getElementById('jalur_daftar2').checked == false){
            alert('Pilih terlebih dahulu jalur pendaftaran !!');
            return false;
          }
          if(document.getElementById('gender1').checked == false && document.getElementById('gender2').checked == false){
            alert('Pilih terlebih dahulu jenis kelamin !!');
            return false;
          }
          if(document.getElementById('agama').value == ""){
            alert('Isi terlebih dahulu pilihan Agama !!');
            return false;
          }
          if(document.getElementById('hobi').value == ""){
            alert('Isi terlebih dahulu pilihan hobi !!');
            return false;
          }
          if(document.getElementById('cita-cita').value == ""){
            alert('Isi terlebih dahulu pilihan cita-cita !!');
            return false;
          }
          if(document.getElementById('provinsi').value == ""){
            alert('Isi terlebih dahulu pilihan provinsi !!');
            return false;
          }
          if(document.getElementById('kabupaten').value == ""){
            alert('Isi terlebih dahulu pilihan kabupaten !!');
            return false;
          }
          if(document.getElementById('kecamatan').value == ""){
            alert('Isi terlebih dahulu pilihan kecamatan !!');
            return false;
          }
          if(document.getElementById('desa').value == ""){
            alert('Isi terlebih dahulu pilihan desa !!');
            return false;
          }
          if(document.getElementById('tempat_tinggal').value == ""){
            alert('Isi terlebih dahulu pilihan tempat tinggal !!');
            return false;
          }
          if(document.getElementById('jarak').value == ""){
            alert('Isi terlebih dahulu pilihan jarak lokasi ke madrasah !!');
            return false;
          }
          if(document.getElementById('transportasi').value == ""){
            alert('Isi terlebih dahulu pilihan transportasi ke madrasah !!');
            return false;
          }
          if(document.getElementById('status1').checked == false && document.getElementById('status2').checked == false){
            alert('Pilih terlebih dahulu status anak !!');
            return false;
          }
          if(document.getElementById('pend_ayah').value == ""){
            alert('Isi terlebih dahulu pilihan pendidikan ayah !!');
            return false;
          }
          if(document.getElementById('kerja_ayah').value == ""){
            alert('Isi terlebih dahulu pilihan pekerjaan ayah !!');
            return false;
          }
          if(document.getElementById('gaji_ortu').value == ""){
            alert('Isi terlebih dahulu pilihan penghasilan orang tua !!');
            return false;
          }
          if(document.getElementById('pend_ibu').value == ""){
            alert('Isi terlebih dahulu pilihan pendidikan ibu !!');
            return false;
          }
          if(document.getElementById('kerja_ibu').value == ""){
            alert('Isi terlebih dahulu pilihan pekerjaan ibu !!');
            return false;
          }
          if(document.getElementById('sekolah').value == ""){
            alert('Isi terlebih dahulu pilihan sekolah !!');
            return false;
          }
          if(document.getElementById('status_sekolah1').checked == false && document.getElementById('status_sekolah2').checked == false){
            alert('Pilih terlebih dahulu status sekolah !!');
            return false;
          }
          if(document.getElementById('jurusan').value == ""){
            alert('Isi terlebih dahulu pilihan jurusan !!');
            return false;
          }else{
            return true;
          }
          // alert('SELAMAT ANDA SUDAH TERDAFTAR!! Tunggu konfirmasi selanjutnya untuk mendapatkan akun PPDB anda.');
        } else {
          // Do nothing!
          // console.log('Thing was not saved to the database.');
          return false;
        }
      }else{
        alert("NISN Telah Digunakan");
        return false;
      }
    }
  }
  function cek_ukuran1(){
    var jenis  = "foto_diri";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran2(){
    var jenis  = "scan_akte";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran3(){
    var jenis  = "scan_sehat";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran4(){
    var jenis  = "scan_baik";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran5(){
    var jenis  = "scan_kk";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran6(){
    var jenis  = "scan_lulus";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran7(){
    var jenis  = "scan_semester1";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran8(){
    var jenis  = "scan_semester2";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran9(){
    var jenis  = "scan_semester3";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran10(){
    var jenis  = "scan_semester4";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran11(){
    var jenis  = "scan_semester5";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran12(){
    var jenis  = "sertifikat1";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran13(){
    var jenis  = "sertifikat2";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran14(){
    var jenis  = "sertifikat3";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_ukuran15(){
    var jenis  = "file_kip";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }else{
      if (document.getElementById('nisn').value != ""){
        var form_data = new FormData();
        form_data.append("file", gbr);
        form_data.append("nisn", document.getElementById('nisn').value);
        form_data.append("nama", jenis);
        $.ajax({
          type:"POST",
          url:"<?=base_url('C_daftar')?>/up_file",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            document.getElementById(jenis+"_jenis").value = data;
          }
        });
      }else{
        alert("NISN tidak boleh kosong !!");
        document.getElementById(jenis).value = "";
      }
    }
  }
  function cek_panjang_nik(){
    var value = document.getElementById('nik').value;
    if (value.length != 16){
      if (value.length < 16){
        alert('NIK yang anda masukkan kurang.');
      }else{
        alert('NIK yang anda masukkan terlalu panjang.');
      }
      alert('Panjang NIK harus 16 digit !!');
    }
  }
  function cek_panjang_nik_ayah(){
    var value = document.getElementById('nik_ayah').value;
    if (value.length != 16){
      if (value.length < 16){
        alert('NIK yang anda masukkan kurang.');
      }else{
        alert('NIK yang anda masukkan terlalu panjang.');
      }
      alert('Panjang NIK harus 16 digit !!');
    }
  }
  function cek_panjang_nik_ibu(){
    var value = document.getElementById('nik_ibu').value;
    if (value.length != 16){
      if (value.length < 16){
        alert('NIK yang anda masukkan kurang.');
      }else{
        alert('NIK yang anda masukkan terlalu panjang.');
      }
      alert('Panjang NIK harus 16 digit !!');
    }
  }
  function cek_panjang_nik_wali(){
    var value = document.getElementById('nik_wali').value;
    if (value.length != 16){
      if (value.length < 16){
        alert('NIK yang anda masukkan kurang.');
      }else{
        alert('NIK yang anda masukkan terlalu panjang.');
      }
      alert('Panjang NIK harus 16 digit !!');
    }
  }
  function cek_panjang_nisn(){
    var value = document.getElementById('nisn').value;
    if (value.length != 10){
      if (value.length < 10){
        alert('NISN yang anda masukkan kurang.');
      }else{
        alert('NISN yang anda masukkan terlalu panjang.');
      }
      alert('Panjang NISN harus 10 digit !!');
    }
  }
  function tampil_prestasi() {
    var prestasi = document.getElementById('opsi_prestasi');
    prestasi.style.display = "block";
  }
  function sembunyi_prestasi() {
    var prestasi = document.getElementById('opsi_prestasi');
    prestasi.style.display = "none";
  }

  function tampil_kip() {
    var kip = document.getElementById('grupkip');
    kip.style.display = "block";
  }
  function sembunyi_kip() {
    var kip = document.getElementById('grupkip');
    kip.style.display = "none";
  }

  function filter_peminatan(){
    var jurusan = document.getElementById('jurusan').value;
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_peminatan'?>",
      data: {jurusan:jurusan},
      cache: false,
      success: function(msg){
        $("#peminatan").html(msg);
      }
    });
  }
  function filter_kabupaten(){
    var provinsi = document.getElementById('provinsi').value;
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_kabupaten'?>",
      data: {provinsi:provinsi},
      cache: false,
      success: function(msg){
        $("#kabupaten").html(msg);
      }
    });
    if (provinsi == ""){
      document.getElementById('kecamatan').innerHTML = '<option value="">--</option>';
      document.getElementById('desa').innerHTML = '<option value="">--</option>';
    }
  }
  function filter_kecamatan(){
    var kabupaten = document.getElementById('kabupaten').value;
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_kecamatan'?>",
      data: {kabupaten:kabupaten},
      cache: false,
      success: function(msg){
        $("#kecamatan").html(msg);
      }
    });
    if (kabupaten == ""){
      document.getElementById('desa').innerHTML = '<option value="">--</option>';
    }
  }
  function filter_desa(){
    var kecamatan = document.getElementById('kecamatan').value;
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_desa'?>",
      data: {kecamatan:kecamatan},
      cache: false,
      success: function(msg){
        $("#desa").html(msg);
      }
    });
  }
</script>
