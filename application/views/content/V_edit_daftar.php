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
  .gambar-bulat{
    object-fit: cover;
    object-position:top;
    width: 100px;
    height: 100px;
  }
</style>

<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col col-md-8">
      <form action="<?=base_url('c_edit_daftar')?>/update" method="post" enctype="multipart/form-data">

        <!-- Data Siswa Mulai -->
        <div class="signup-form">
          <div class="form-group" align="center">
            <div class="row justify-content-md-center">
              <div class="col-sm-5">
                <?php
                foreach ($file as $_file) {
                  if($_file['jenis'] == 'foto_diri'){
                    ?>
                    <img src="<?=decrypt_url($_file['path'])?>" class="gambar-bulat rounded-circle" alt="" height="100px;">
                    <?php
                    $path_foto_diri = decrypt_url($_file['path']);
                  }
                }
                 ?>
              </div>
            </div>
          </div>
          <h2>Data Siswa</h2>
          <!-- <p class="hint-text">Pendaftaran Peserta Didik Baru Tahun Ajaran 2020/2021</p> -->
          <div class="form-group">
            <label for="">Jalur Pendaftaran <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" <?php if($pendaftaran['jalur_daftar'] == 'prestasi'){ echo 'checked';} ?> type="radio" name="jalur_daftar" id="jalur_daftar1" value="prestasi" onclick="tampil_prestasi()">
                  Jalur Prestasi
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" <?php if($pendaftaran['jalur_daftar'] == 'umum'){ echo 'checked';} ?> type="radio" name="jalur_daftar" id="jalur_daftar2" value="umum" onclick="sembunyi_prestasi()">
                  Jalur Umum
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">NISN <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" readonly value="<?=$siswa['nisn']?>" class="form-control" name="nisn" id="nisn" placeholder="" required="required" onchange="cek_panjang_nisn()">
            </div>
            <div class="form-group col-sm-4">
              <label for="">NIK Siswa <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" value="<?=$siswa['nik']?>" class="form-control" name="nik" id="nik" placeholder="" required="required" onchange="cek_panjang_nik()">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-8">
              <label for="">Nama Lengkap <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" value="<?=$siswa['nama']?>" name="nama_lengkap" placeholder="" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="">Jenis Kelamin <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <div class="col-sm-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" <?php if($siswa['gender'] == 'laki-laki'){ echo 'checked';} ?> type="radio" name="gender" id="gender1" value="laki-laki">
                  Laki-laki
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" <?php if($siswa['gender'] == 'perempuan'){ echo 'checked';} ?> type="radio" name="gender" id="gender2" value="perempuan">
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
                  <option <?php if($_agama['agama'] == $siswa['agama']){ echo 'selected';} ?> value="<?=$_agama['agama']?>"><?=$_agama['agama']?></option>
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
                <input type="text" class="form-control" value="<?=$siswa['tempat_lahir']?>" name="tpt_lahir" placeholder="" required="required">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="tanggal_lahir">
                <label for="">Tanggal Lahir <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" value="<?=$siswa['tanggal_lahir']?>" name="tgl_lahir" placeholder="HH/BB/TTTT" required="required">
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
                  <option <?php if($_hobi['hobi'] == $siswa['hobi']){ echo 'selected';} ?> value="<?=$_hobi['hobi']?>"><?=$_hobi['hobi']?></option>
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
                  <option <?php if($_citacita['citacita'] == $siswa['cita-cita']){ echo 'selected';} ?> value="<?=$_citacita['citacita']?>"><?=$_citacita['citacita']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-12">
              <label for="">Alamat <b style="color:red;">(WAJIB)*</b></label>
              <textarea class="form-control" name="alamat_rumah" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"><?=$siswa['alamat']?></textarea>
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
                  <option <?php if($_provinsi['id_prov'] == $siswa['provinsi']){ echo 'selected';} ?> value="<?=$_provinsi['id_prov']?>"><?=$_provinsi['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Kabupaten <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kabupaten" id="kabupaten" onchange="filter_kecamatan()">
                <option value="">--</option><?php
                foreach ($kabupaten as $_kabupaten) {
                  ?>
                  <option <?php if($_kabupaten['id_kab'] == $siswa['kabupaten']){ echo 'selected';} ?> value="<?=$_kabupaten['id_kab']?>"><?=$_kabupaten['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Kecamatan <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kecamatan" id="kecamatan" onchange="filter_desa()">
                <option value="">--</option><?php
                foreach ($kecamatan as $_kecamatan) {
                  ?>
                  <option <?php if($_kecamatan['id_kec'] == $siswa['kecamatan']){ echo 'selected';} ?> value="<?=$_kecamatan['id_kec']?>"><?=$_kecamatan['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Desa <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="desa" id="desa">
                <option value="">--</option><?php
                foreach ($desa as $_desa) {
                  ?>
                  <option <?php if($_desa['id_kel'] == $siswa['desa']){ echo 'selected';} ?> value="<?=$_desa['id_kel']?>"><?=$_desa['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Kode Pos <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" value="<?=$siswa['kode_pos']?>" name="kode_pos" id="kode_pos" placeholder="" required="required">
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
                  <option <?php if($_tempattinggal['tempattinggal'] == $siswa['tempat_tinggal']){ echo 'selected';} ?> value="<?=$_tempattinggal['tempattinggal']?>"><?=$_tempattinggal['tempattinggal']?></option>
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
                  <option <?php if($_jarak['jarak'] == $siswa['jarak']){ echo 'selected';} ?> value="<?=$_jarak['jarak']?>"><?=$_jarak['jarak']?></option>
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
                  <option <?php if($_transportasi['transportasi'] == $siswa['transportasi']){ echo 'selected';} ?> value="<?=$_transportasi['transportasi']?>"><?=$_transportasi['transportasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Waktu Tempuh ke Madrasah <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="waktu" id="waktu">
                <option value="">--</option>
                <?php
                foreach ($waktu as $_waktu) {
                  ?>
                  <option <?php if($_waktu['waktu'] == $siswa['waktu']){ echo 'selected';} ?> value="<?=$_waktu['waktu']?>"><?=$_waktu['waktu']?></option>
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
                  <input class="form-check-input" <?php if($siswa['status_anak'] == 'kandung'){ echo 'checked';} ?> type="radio" name="status" id="status1" value="kandung">
                  Anak Kandung
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" <?php if($siswa['status_anak'] == 'tiri'){ echo 'checked';} ?> type="radio" name="status" id="status2" value="tiri">
                  Anak Tiri
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Anak Ke <b style="color:red;">(WAJIB)*</b></label>
              <input type="number" value="<?=$siswa['anak_ke']?>" class="form-control" name="anak_ke" placeholder="" required="required">
            </div>
            <div class="form-group col-sm-3">
              <label for="">Jumlah Saudara <b style="color:red;">(WAJIB)*</b></label>
              <input type="number" value="<?=$siswa['jumlah_sdr']?>" class="form-control" name="jumlah_sdr" placeholder="" required="required">
            </div>
            <div class="form-group col-sm-3">
              <label for="">Tinggi Badan <b style="color:red;">(WAJIB)*</b></label>
              <input type="number" value="<?=$siswa['tinggi']?>" class="form-control" name="tinggi_bdn" placeholder="...Cm" required="required">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-5">
              <label for="">Pernah Mengikuti PAUD <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="paud" id="paud">
                <option value="">--</option>
                <option value="Tidak" <?php if($siswa['paud'] == "Tidak"){ echo 'selected';} ?>>Tidak</option>
                <option value="Pernah" <?php if($siswa['paud'] == "Pernah"){ echo 'selected';} ?>>Pernah</option>
              </select>
            </div>
            <div class="form-group col-sm-5">
              <label for="">Pernah Mengikuti TK/RA <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="tk" id="tk">
                <option value="">--</option>
                <option value="Tidak" <?php if($siswa['tk'] == "Tidak"){ echo 'selected';} ?>>Tidak</option>
                <option value="Pernah" <?php if($siswa['tk'] == "Pernah"){ echo 'selected';} ?>>Pernah</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Nomor HP <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" value="<?=$siswa['no_hp']?>" class="form-control" name="hp_siswa" placeholder="" required="required">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Email <b style="color:red;">(WAJIB)*</b></label>
              <input type="email" value="<?=$siswa['email']?>" class="form-control" name="email" placeholder="" required="required">
            </div>
          </div>

          <label for="exampleInputFile">File Foto Pendaftar <b style="color:red;">(WAJIB)*</b></label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'foto_diri'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="foto_diri" id="foto_diri" onchange="cek_ukuran1()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload foto formal dengan format jpg, jpeg, png, dan sejenisnya <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
          </div>

          <label for="exampleInputFile">File Scan Akte <b style="color:red;">(WAJIB)*</b></label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_akte'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_akte" id="scan_akte" onchange="cek_ukuran2()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
          </div>

          <label for="exampleInputFile">File Scan Surat Keterangan Sehat</label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_sehat'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_sehat" id="scan_sehat" onchange="cek_ukuran3()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
          </div>

          <label for="exampleInputFile">File Scan Surat Kelakuan Baik</label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_baik'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_baik" id="scan_baik" onchange="cek_ukuran4()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
          </div>
        </div>
        <!-- Data Siswa Akhir -->

        <!-- Data Orang Tua Mulai -->
        <div class="signup-form">
          <h2>Data Orang Tua</h2>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Nomor Kartu Keluarga <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" value="<?=$ayah['no_kk']?>" class="form-control" name="no_kk" placeholder="" required="required">
            </div>
            <div class="form-group col-sm-2">
              <label for="">&nbsp;&nbsp;&nbsp;</label>
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_kk'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-6">
              <label for="exampleInputFile">File Scan Kartu Keluarga <b style="color:red;">(WAJIB)*</b></label>
              <input type="file" class="form-control-file" name="scan_kk" id="scan_kk" onchange="cek_ukuran5()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="">NIK Ayah <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" value="<?=$ayah['nik']?>" class="form-control" name="nik_ayah" id="nik_ayah" onchange="cek_panjang_nik_ayah()" placeholder="" required="required">
              </div>
              <div class="form-group">
                <label for="">Nama Ayah <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" value="<?=$ayah['nama']?>" class="form-control" name="nama_ayah" placeholder="" required="required">
              </div>
              <div class="form-group" id="tanggal_lahir">
                <label for="">Tanggal Lahir</label>
                <input type="text" value="<?=$ayah['tanggal_lahir']?>" class="form-control" name="tgl_lahir_ayah" placeholder="HH/BB/TTTT">
              </div>
              <div class="form-group">
                <label for="">Status Ayah <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="status_ayah" id="status_ayah">
                  <option value="">--</option>
                  <option value="Masih Hidup" <?php if($ayah['status_ortu'] == "Masih Hidup"){ echo 'selected';} ?> >Masih Hidup</option>
                  <option value="Sudah Meninggal" <?php if($ayah['status_ortu'] == "Sudah Meninggal"){ echo 'selected';} ?> >Sudah Meninggal</option>
                  <option value="Tidak Diketahui" <?php if($ayah['status_ortu'] == "Tidak Diketahui"){ echo 'selected';} ?> >Tidak Diketahui</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pendidikan Ayah <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="pend_ayah" id=pend_ayah>
                  <option value="">--</option>
                  <?php
                  foreach ($pendidikan as $_pendidikan) {
                    ?>
                    <option <?php if($_pendidikan['pendidikan'] == $ayah['pend']){ echo 'selected';} ?> value="<?=$_pendidikan['pendidikan']?>"><?=$_pendidikan['pendidikan']?></option>
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
                    <option <?php if($_kerja['kerja'] == $ayah['kerja']){ echo 'selected';} ?> value="<?=$_kerja['kerja']?>"><?=$_kerja['kerja']?></option>
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
                    <option <?php if($_penghasilan['penghasilan'] == $ayah['penghasilan']){ echo 'selected';} ?> value="<?=$_penghasilan['penghasilan']?>"><?=$_penghasilan['penghasilan']?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nama Kepala Keluarga <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" value="<?=$ayah['kepala_klg']?>" class="form-control" name="nama_kepala_klg" placeholder="" required="required">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">NIK Ibu <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" value="<?=$ibu['nik']?>" class="form-control" name="nik_ibu" id="nik_ibu" onchange="cek_panjang_nik_ibu()" placeholder="" required="required">
              </div>
              <div class="form-group">
                <label for="">Nama Ibu <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" value="<?=$ibu['nama']?>" class="form-control" name="nama_ibu" placeholder="" required="required">
              </div>
              <div class="form-group" id="tanggal_lahir">
                <label for="">Tanggal Lahir</label>
                <input type="text" value="<?=$ibu['tanggal_lahir']?>" class="form-control" name="tgl_lahir_ibu" placeholder="HH/BB/TTTT">
              </div>
              <div class="form-group">
                <label for="">Status Ibu <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="status_ibu" id="status_ibu">
                  <option value="">--</option>
                  <option value="Masih Hidup" <?php if($ibu['status_ortu'] == "Masih Hidup"){ echo 'selected';} ?>>Masih Hidup</option>
                  <option value="Sudah Meninggal" <?php if($ibu['status_ortu'] == "Sudah Meninggal"){ echo 'selected';} ?>>Sudah Meninggal</option>
                  <option value="Tidak Diketahui" <?php if($ibu['status_ortu'] == "Tidak Diketahui"){ echo 'selected';} ?>>Tidak Diketahui</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pendidikan Ibu <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="pend_ibu" id="pend_ibu">
                  <option value="">--</option>
                  <?php
                  foreach ($pendidikan as $_pendidikan) {
                    ?>
                    <option <?php if($_pendidikan['pendidikan'] == $ibu['pend']){ echo 'selected';} ?> value="<?=$_pendidikan['pendidikan']?>"><?=$_pendidikan['pendidikan']?></option>
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
                    <option <?php if($_kerja['kerja'] == $ibu['kerja']){ echo 'selected';} ?> value="<?=$_kerja['kerja']?>"><?=$_kerja['kerja']?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nomor HP <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" value="<?=$ayah['no_hp']?>" class="form-control" name="hp_ortu" placeholder="" required="required">
              </div>
            </div>
          </div>
        </div>
        <!-- Data Orang Tua Selesai -->
        
        <!-- Data Alamat Orang Tua Mulai -->
        <div class="signup-form">
          <h2>Alamat Orang Tua</h2>
          <div class="row">
            <div class="form-group col-sm-12">
              <label for="">Alamat <b style="color:red;">(WAJIB)*</b></label>
              <textarea class="form-control" name="alamat_rumah_ortu" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"><?= $ayah['alamat'] ?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Provinsi <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="provinsi_ortu" id="provinsi_ortu" onchange="filter_kabupaten_ortu()">
                <option value="">Pilih Provinsi</option>
                <?php
                foreach ($provinsi as $_provinsi) {
                  ?>
                  <option <?php if($_provinsi['id_prov'] == $ayah['provinsi']){ echo 'selected';} ?> value="<?=$_provinsi['id_prov']?>"><?=$_provinsi['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Kabupaten <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kabupaten_ortu" id="kabupaten_ortu" onchange="filter_kecamatan_ortu()">
                <option value="">Pilih Kabupaten</option>
                <?php
                foreach ($kabupaten_ortu as $_kabupaten) {
                  ?>
                  <option <?php if($_kabupaten['id_kab'] == $ayah['kabupaten']){ echo 'selected';} ?> value="<?=$_kabupaten['id_kab']?>"><?=$_kabupaten['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Kecamatan <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kecamatan_ortu" id="kecamatan_ortu" onchange="filter_desa_ortu()">
                <option value="">Pilih Kecamatan</option>
                <?php
                foreach ($kecamatan_ortu as $_kecamatan) {
                  ?>
                  <option <?php if($_kecamatan['id_kec'] == $ayah['kecamatan']){ echo 'selected';} ?> value="<?=$_kecamatan['id_kec']?>"><?=$_kecamatan['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Desa <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="desa_ortu" id="desa_ortu">
                <option value="">Pilih Desa</option>
                <?php
                foreach ($desa_ortu as $_desa) {
                  ?>
                  <option <?php if($_desa['id_kel'] == $ayah['desa']){ echo 'selected';} ?> value="<?=$_desa['id_kel']?>"><?=$_desa['nama']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Kode Pos</label>
              <input type="text" class="form-control" name="kode_pos_ortu" id="kode_pos_ortu" placeholder="" value="<?= $ayah['kode_pos'] ?>">
            </div>
            <div class="form-group col-sm-6">
              <label for="">Status Kepemilikan Rumah <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kepemilikan" id="kepemilikan">
                <option value="">--</option>
                <?php
                foreach ($kepemilikan as $_kepemilikan) {
                  ?>
                  <option <?php if($_kepemilikan['status'] == $ayah['kepemilikan_rumah']){ echo 'selected';} ?> value="<?=$_kepemilikan['status']?>"><?=$_kepemilikan['status']?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>
        </div>
        <!-- Data Alamat Orang Tua Selesai -->

        <!-- Data Wali Mulai -->
        <div class="signup-form">
          <h2>Data Wali</h2>

          <div class="row">
            <div class="form-group col-sm-7">
              <label for="">Nama Wali</label>
              <input type="text" value="<?php if(isset($wali['nama'])){ echo $wali['nama'];}?>" class="form-control" name="nama_wali" placeholder="">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3" id="tanggal_lahir">
              <label for="">Tanggal Lahir</label>
              <input type="text" value="<?php if(isset($wali['tanggal_lahir'])){ echo $wali['tanggal_lahir'];}?>" class="form-control" name="tgl_lahir_wali" placeholder="HH/BB/TTTT">
            </div>
            <div class="form-group col-sm-4">
              <label for="">NIK Wali</label>
              <input type="number" value="<?php if(isset($wali['nik'])){ echo $wali['nik'];}?>" class="form-control" name="nik_wali" id="nik_wali" onchange="cek_panjang_nik_wali()" placeholder="">
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
                  <option <?php if(isset($wali['pend']) && $wali['pend'] == $_pendidikan['pendidikan']){ echo 'selected';}?> value="<?=$_pendidikan['pendidikan']?>"><?=$_pendidikan['pendidikan']?></option>
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
                  <option <?php if(isset($wali['kerja']) && $wali['kerja'] == $_kerja['kerja']){ echo 'selected';}?> value="<?=$_kerja['kerja']?>"><?=$_kerja['kerja']?></option>
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
                  <option <?php if(isset($wali['penghasilan']) && $wali['penghasilan'] == $_penghasilan['penghasilan']){ echo 'selected';}?> value="<?=$_penghasilan['penghasilan']?>"><?=$_penghasilan['penghasilan']?></option>
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
                <option <?php if ($pendaftaran['sekolah'] == "smp"){ echo "selected"; } ?> value="smp">SMP</option>
                <option <?php if ($pendaftaran['sekolah'] == "mts"){ echo "selected"; } ?> value="mts">MTS</option>
                <option <?php if ($pendaftaran['sekolah'] == "SMP Terbuka"){ echo "selected"; } ?> value="SMP Terbuka">SMP Terbuka</option>
                <option <?php if ($pendaftaran['sekolah'] == "Mu'adalah MTS"){ echo "selected"; } ?> value="Mu'adalah MTS">Mu'adalah MTS</option>
                <option <?php if ($pendaftaran['sekolah'] == "SMP Luar Negeri"){ echo "selected"; } ?> value="SMP Luar Negeri">SMP Luar Negeri</option>
                <option <?php if ($pendaftaran['sekolah'] == "Salafiyah Wustha"){ echo "selected"; } ?> value="Salafiyah Wustha">Salafiyah Wustha</option>
                <option <?php if ($pendaftaran['sekolah'] == "SLB-SMP"){ echo "selected"; } ?> value="SLB-SMP">SLB-SMP</option>
                <option <?php if ($pendaftaran['sekolah'] == "SLB-MTS"){ echo "selected"; } ?> value="SLB-MTS">SLB-MTS</option>
                <option <?php if ($pendaftaran['sekolah'] == "Paket B"){ echo "selected"; } ?> value="Paket B">Paket B</option>
                <option <?php if ($pendaftaran['sekolah'] == "Lainnya"){ echo "selected"; } ?> value="Lainnya">Lainnya</option>
              </select>
            </div>
            <div class="form-group col-sm-7">
              <label for="">Nama Sekolah <b style="color:red;">(WAJIB)*</b></label>
              <input value="<?=$pendaftaran['nama_sekolah']?>" type="text" class="form-control" name="nama_sekolah" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="">Status Sekolah <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <div class="col-sm-2">
                <div class="form-check form-check-inline">
                  <input <?php if($pendaftaran['status_sekolah'] == 'negeri'){ echo 'checked';} ?> class="form-check-input" type="radio" name="status_sekolah" id="status_sekolah1" value="negeri">
                  Negeri
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-check form-check-inline">
                  <input <?php if($pendaftaran['status_sekolah'] == 'swasta'){ echo 'checked';} ?> class="form-check-input" type="radio" name="status_sekolah" id="status_sekolah2" value="swasta">
                  Swasta
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-12">
              <label for="">Alamat <b style="color:red;">(WAJIB)*</b></label>
              <textarea class="form-control" name="alamat_sekolah" required="required" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"><?=$pendaftaran['alamat_sekolah'];?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-3 form-line">
              <div class="form-group">
                <label for="">NPSN <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$pendaftaran['npsn'];?>" type="text" name="npsn" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Tahun Lulus <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$pendaftaran['thn_lulus'];?>" type="text" name="thn_lulus" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-7">
              <div class="form-group">
                <label for="">Lokasi Sekolah <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="lokasi_sekolah" id="lokasi_sekolah">
                  <option value="">--</option>
                  <option <?php if($pendaftaran['lokasi_sekolah'] == 'Dalam Kabupaten/Kota'){ echo 'selected';} ?> value="Dalam Kabupaten/Kota">Dalam Kabupaten/Kota</option>
                  <option <?php if($pendaftaran['lokasi_sekolah'] == 'Dalam Provinsi'){ echo 'selected';} ?> value="Dalam Provinsi">Dalam Provinsi</option>
                  <option <?php if($pendaftaran['lokasi_sekolah'] == 'Luar Provinsi'){ echo 'selected';} ?> value="Luar Provinsi">Luar Provinsi</option>
                  <option <?php if($pendaftaran['lokasi_sekolah'] == 'Luar Negeri'){ echo 'selected';} ?> value="Luar Negeri">Luar Negeri</option>
                </select>
              </div>

              <div class="form-group">
                <label for="">No. Ijazah</label>
                <input value="<?=$pendaftaran['no_ijazah'];?>" type="text" name="no_ijazah" class="form-control">
              </div>
            </div>
          </div>

          <label for="exampleInputFile">File Scan Surat Keterangan Kelulusan</label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_lulus'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_lulus" id="scan_lulus" onchange="cek_ukuran6()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
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
                <input value="<?=$nilai[0]['nilai_indonesia']?>" type="number" name="sms1_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[0]['nilai_mtk']?>" type="number" name="sms1_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[0]['nilai_ips']?>" type="number" name="sms1_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[0]['nilai_inggris']?>" type="number" name="sms1_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[0]['nilai_ipa']?>" type="number" name="sms1_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[0]['nilai_pai']?>" type="number" name="sms1_pai" class="form-control" required="required">
              </div>
            </div>
          </div>

          <label for="exampleInputFile">File Scan Rapot Semester 1 <b style="color:red;">(WAJIB)*</b></label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_semester1'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_semester1" id="scan_semester1" onchange="cek_ukuran7()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
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
                <input value="<?=$nilai[1]['nilai_indonesia']?>" type="number" name="sms2_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[1]['nilai_mtk']?>" type="number" name="sms2_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[1]['nilai_ips']?>" type="number" name="sms2_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[1]['nilai_inggris']?>" type="number" name="sms2_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[1]['nilai_ipa']?>" type="number" name="sms2_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[1]['nilai_pai']?>" type="number" name="sms2_pai" class="form-control" required="required">
              </div>
            </div>
          </div>

          <label for="exampleInputFile">File Scan Rapot Semester 2 <b style="color:red;">(WAJIB)*</b></label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_semester2'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_semester2" id="scan_semester2" onchange="cek_ukuran8()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
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
                <input value="<?=$nilai[2]['nilai_indonesia']?>" type="number" name="sms3_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[2]['nilai_mtk']?>" type="number" name="sms3_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[2]['nilai_ips']?>" type="number" name="sms3_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[2]['nilai_inggris']?>" type="number" name="sms3_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[2]['nilai_ipa']?>" type="number" name="sms3_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[2]['nilai_pai']?>" type="number" name="sms3_pai" class="form-control" required="required">
              </div>
            </div>
          </div>
          <label for="exampleInputFile">File Scan Rapot Semester 3 <b style="color:red;">(WAJIB)*</b></label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_semester3'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-am-10">
              <input type="file" class="form-control-file" name="scan_semester3" id="scan_semester3" onchange="cek_ukuran9()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
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
                <input value="<?=$nilai[3]['nilai_indonesia']?>" type="number" name="sms4_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[3]['nilai_mtk']?>" type="number" name="sms4_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[3]['nilai_ips']?>" type="number" name="sms4_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[3]['nilai_inggris']?>" type="number" name="sms4_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[3]['nilai_ipa']?>" type="number" name="sms4_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[3]['nilai_pai']?>" type="number" name="sms4_pai" class="form-control" required="required">
              </div>
            </div>
          </div>

          <label for="exampleInputFile">File Scan Rapot Semester 4 <b style="color:red;">(WAJIB)*</b></label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_semester4'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_semester4" id="scan_semester4" onchange="cek_ukuran10()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
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
                <input value="<?=$nilai[4]['nilai_indonesia']?>" type="number" name="sms5_indo" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Matematika <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[4]['nilai_mtk']?>" type="number" name="sms5_mtk" class="form-control" required="required">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPS <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[4]['nilai_ips']?>" type="number" name="sms5_ips" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">Bahasa Inggris <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[4]['nilai_inggris']?>" type="number" name="sms5_inggris" class="form-control" required="required">
              </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="">IPA <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[4]['nilai_ipa']?>" type="number" name="sms5_ipa" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="">PAI <b style="color:red;">(WAJIB)*</b></label>
                <input value="<?=$nilai[4]['nilai_pai']?>" type="number" name="sms5_pai" class="form-control" required="required">
              </div>
            </div>
          </div>
          <label for="exampleInputFile">File Scan Rapot Semester 5 <b style="color:red;">(WAJIB)*</b></label>
          <div class="row">
            <div class="form-group col-sm-2">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'scan_semester5'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-10">
              <input type="file" class="form-control-file" name="scan_semester5" id="scan_semester5" onchange="cek_ukuran11()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
            </div>
          </div>
        </div>
        <!-- Data Nilai Raport Semester 5 Selesai -->

        <!-- Prestasi Yang Pernah Diraih Mulai -->
        <div class="signup-form" id="opsi_prestasi" style="<?php if($pendaftaran['jalur_daftar']=='umum'){ echo 'display:none';} ?>;">
          <h2>Prestasi Yang Pernah Diraih</h2>
          <div class="row">
            <div class="col">
              <h3>Prestasi 1</h3>
            </div>
          </div>
            
          <div class="row">
            <div class="form-group col-sm-5">
              <label for="">Nama Lomba</label>
              <input type="text" name="pres1" class="form-control" value="<?php if(isset($prestasi[0]['id_user'])){ echo $prestasi[0]['nama_prestasi'];}?>">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Bidang</label>
              <select class="form-control" name="bidang1">
                <option value="">--</option>
                <?php
                foreach ($bidang as $_bidang) {
                  ?>
                  <option <?php if(isset($prestasi[0]['id_user']) && $prestasi[0]['bidang'] == $_bidang['bidang']){ echo "selected";}?> value="<?=$_bidang['bidang']?>"><?=$_bidang['bidang']?></option>
                  <?php
                }
                ?>
              </select>
            </div>

            <div class="form-group col-sm-3">
              <label for="">Tingkat</label>
              <select class="form-control" name="tp1">
                <option value="">--</option>
                <?php
                foreach ($tingkat as $_tingkat) {
                  ?>
                  <option <?php if(isset($prestasi[0]['id_user']) && $prestasi[0]['tingkat'] == $_tingkat['tingkat']){ echo "selected";}?> value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Tahun</label>
              <input type="text" name="tahun1" class="form-control" value="<?php if(isset($prestasi[0]['id_user'])){ echo $prestasi[0]['tahun'];}?>">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Kategori</label>
              <select class="form-control" name="kategori1">
                <option value="">--</option>
                <option <?php if(isset($prestasi[0]['id_user']) && $prestasi[0]['kategori'] == "Perorangan"){ echo "selected";}?> value="Perorangan">Perorangan</option>
                <option <?php if(isset($prestasi[0]['id_user']) && $prestasi[0]['kategori'] == "Beregu"){ echo "selected";}?> value="Beregu">Beregu</option>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="">Prestasi</label>
              <select class="form-control" name="prestasi1">
                <option value="">--</option>
                <?php
                foreach ($prestasi_all as $_prestasi) {
                  ?>
                  <option <?php if(isset($prestasi[0]['id_user']) && $prestasi[0]['prestasi'] == $_prestasi['prestasi']){ echo "selected";}?> value="<?=$_prestasi['prestasi']?>"><?=$_prestasi['prestasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Penyelenggara</label>
              <input type="text" name="penyelenggara1" class="form-control" value="<?php if(isset($prestasi[0]['id_user'])){ echo $prestasi[0]['penyelenggara'];}?>" >
            </div>
            <div class="form-group col-sm-3">
              <label for="">Tempat Lomba</label>
              <input type="text" name="tempat1" class="form-control" value="<?php if(isset($prestasi[0]['id_user'])){ echo $prestasi[0]['tempat'];}?>" >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'sertifikat1'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-4">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat1" id="sertifikat1" onchange="cek_ukuran12()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
              <input type="text" class="form-control" name="sertifikat1_jenis" id="sertifikat1_jenis" value="" hidden>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <h3>Prestasi 2</h3>
            </div>
          </div>
            
          <div class="row">
            <div class="form-group col-sm-5">
              <label for="">Nama Lomba</label>
              <input type="text" name="pres2" class="form-control" value="<?php if(isset($prestasi[1]['id_user'])){ echo $prestasi[1]['nama_prestasi'];}?>">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Bidang</label>
              <select class="form-control" name="bidang2">
                <option value="">--</option>
                <?php
                foreach ($bidang as $_bidang) {
                  ?>
                  <option <?php if(isset($prestasi[0]['id_user']) && $prestasi[1]['bidang'] == $_bidang['bidang']){ echo "selected";}?> value="<?=$_bidang['bidang']?>"><?=$_bidang['bidang']?></option>
                  <?php
                }
                ?>
              </select>
            </div>

            <div class="form-group col-sm-3">
              <label for="">Tingkat</label>
              <select class="form-control" name="tp2">
                <option value="">--</option>
                <?php
                foreach ($tingkat as $_tingkat) {
                  ?>
                  <option <?php if(isset($prestasi[0]['id_user']) && $prestasi[1]['tingkat'] == $_tingkat['tingkat']){ echo "selected";}?> value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Tahun</label>
              <input type="text" name="tahun2" class="form-control" value="<?php if(isset($prestasi[1]['id_user'])){ echo $prestasi[1]['tahun'];}?>">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Kategori</label>
              <select class="form-control" name="kategori2">
                <option value="">--</option>
                <option <?php if(isset($prestasi[1]['id_user']) && $prestasi[1]['kategori'] == "Perorangan"){ echo "selected";}?> value="Perorangan">Perorangan</option>
                <option <?php if(isset($prestasi[1]['id_user']) && $prestasi[1]['kategori'] == "Beregu"){ echo "selected";}?> value="Beregu">Beregu</option>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="">Prestasi</label>
              <select class="form-control" name="prestasi2">
                <option value="">--</option>
                <?php
                foreach ($prestasi_all as $_prestasi) {
                  ?>
                  <option <?php if(isset($prestasi[1]['id_user']) && $prestasi[1]['prestasi'] == $_prestasi['prestasi']){ echo "selected";}?> value="<?=$_prestasi['prestasi']?>"><?=$_prestasi['prestasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Penyelenggara</label>
              <input type="text" name="penyelenggara2" class="form-control" value="<?php if(isset($prestasi[1]['id_user'])){ echo $prestasi[1]['penyelenggara'];}?>" >
            </div>
            <div class="form-group col-sm-3">
              <label for="">Tempat Lomba</label>
              <input type="text" name="tempat2" class="form-control" value="<?php if(isset($prestasi[1]['id_user'])){ echo $prestasi[1]['tempat'];}?>" >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'sertifikat2'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-4">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat2" id="sertifikat2" onchange="cek_ukuran13()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
              <input type="text" class="form-control" name="sertifikat2_jenis" id="sertifikat2_jenis" value="" hidden>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <h3>Prestasi 3</h3>
            </div>
          </div>
            
          <div class="row">
            <div class="form-group col-sm-5">
              <label for="">Nama Lomba</label>
              <input type="text" name="pres3" class="form-control" value="<?php if(isset($prestasi[2]['id_user'])){ echo $prestasi[2]['nama_prestasi'];}?>">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Bidang</label>
              <select class="form-control" name="bidang3">
                <option value="">--</option>
                <?php
                foreach ($bidang as $_bidang) {
                  ?>
                  <option <?php if(isset($prestasi[2]['id_user']) && $prestasi[2]['bidang'] == $_bidang['bidang']){ echo "selected";}?> value="<?=$_bidang['bidang']?>"><?=$_bidang['bidang']?></option>
                  <?php
                }
                ?>
              </select>
            </div>

            <div class="form-group col-sm-3">
              <label for="">Tingkat</label>
              <select class="form-control" name="tp3">
                <option value="">--</option>
                <?php
                foreach ($tingkat as $_tingkat) {
                  ?>
                  <option <?php if(isset($prestasi[2]['id_user']) && $prestasi[2]['tingkat'] == $_tingkat['tingkat']){ echo "selected";}?> value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Tahun</label>
              <input type="text" name="tahun3" class="form-control" value="<?php if(isset($prestasi[2]['id_user'])){ echo $prestasi[2]['tahun'];}?>">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Kategori</label>
              <select class="form-control" name="kategori3">
                <option value="">--</option>
                <option <?php if(isset($prestasi[2]['id_user']) && $prestasi[2]['kategori'] == "Perorangan"){ echo "selected";}?> value="Perorangan">Perorangan</option>
                <option <?php if(isset($prestasi[2]['id_user']) && $prestasi[2]['kategori'] == "Beregu"){ echo "selected";}?> value="Beregu">Beregu</option>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="">Prestasi</label>
              <select class="form-control" name="prestasi3">
                <option value="">--</option>
                <?php
                foreach ($prestasi_all as $_prestasi) {
                  ?>
                  <option <?php if(isset($prestasi[2]['id_user']) && $prestasi[2]['prestasi'] == $_prestasi['prestasi']){ echo "selected";}?> value="<?=$_prestasi['prestasi']?>"><?=$_prestasi['prestasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Penyelenggara</label>
              <input type="text" name="penyelenggara3" class="form-control" value="<?php if(isset($prestasi[2]['id_user'])){ echo $prestasi[2]['penyelenggara'];}?>" >
            </div>
            <div class="form-group col-sm-3">
              <label for="">Tempat Lomba</label>
              <input type="text" name="tempat3" class="form-control" value="<?php if(isset($prestasi[2]['id_user'])){ echo $prestasi[2]['tempat'];}?>" >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'sertifikat3'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-4">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat3" id="sertifikat3" onchange="cek_ukuran14()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
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
                  <input <?php if($siswa['kip'] == 'Iya'){ echo 'checked';} ?> class="form-check-input" type="radio" name="kip" id="kip1" value="Iya" onclick="tampil_kip()">
                  Iya
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input <?php if($siswa['kip'] == 'Tidak'){ echo 'checked';} ?> class="form-check-input" type="radio" name="kip" id="kip2" value="Tidak" onclick="sembunyi_kip()">
                  Tidak
                </div>
              </div>
            </div>
          </div>

          <div class="row" id="grupkip" style="display:<?php if($siswa['kip'] == 'Iya'){ echo 'block';}else{ echo 'none';} ?>;">
            <div class="form-group col-sm-4">
              <label for="">Nomor KIP</label>
              <input type="text" name="no_kip" class="form-control" value="<?= $siswa['no_kip'] ?>">
            </div>
            <div class="col-sm-5">
              <label for="exampleInputFile">Upload File KIP</label>
            </div>
            <div class="form-group col-sm-6">
              <?php
              foreach ($file as $_file) {
                if($_file['jenis'] == 'file_kip'){
                  ?>
                    <button type="button" onclick="openInNewTab('<?=decrypt_url($_file['path'])?>')" name="button">Lihat File</button>
                  <?php
                }
              }
               ?>
            </div>
            <div class="form-group col-sm-6">
              <input type="file" class="form-control-file" name="file_kip" id="file_kip" onchange="cek_ukuran15()" accept="application/pdf, image/jpeg, image/png" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file dengan format PDF/JPG/PNG <b style="color:blue;">(Ukuran file maksimal 2MB)</b></small>
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
                  <option <?php if($pendaftaran['jurusan'] == $_jurusan['jurusan']){ echo 'selected';} ?> value="<?=$_jurusan['jurusan']?>"><?=$_jurusan['jurusan']?></option>
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

          <!-- <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required">Dengan ini saya menyatakan bahwa, Data yang saya isikan di Formulir ini adalah Benar adanya sesuai dengan bukti-bukti yang ada dan segera verifikasi data 1 minggu sebelum Tes</label>
          </div> -->
          <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="return cek_update()">Update Data</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Konfirmasi Data Pendaftar Selesai -->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function cek_update(){
    if (confirm('Apakah data yang anda masukkan sudah benar?')) {
      // Save it!
      // Hapus cache di browser
      $.ajax({
        url: "",
        context: document.body,
        success: function(s,x){

          $('html[manifest=saveappoffline.appcache]').attr('content', '');
          $(this).html(s);
        }
      });
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
          }
      return true;
    } else {
      // Do nothing!
      return false;
    }
  }
  function cek_ukuran1(){
    var value = (document.getElementById('foto_diri').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('foto_diri').value = "";
    }
  }
  function cek_ukuran2(){
    var value = (document.getElementById('scan_akte').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_akte').value = "";
    }
  }
  function cek_ukuran3(){
    var value = (document.getElementById('scan_sehat').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_sehat').value = "";
    }
  }
  function cek_ukuran4(){
    var value = (document.getElementById('scan_baik').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_baik').value = "";
    }
  }
  function cek_ukuran5(){
    var value = (document.getElementById('scan_kk').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('foto_diri').value = "";
    }
  }
  function cek_ukuran6(){
    var value = (document.getElementById('scan_lulus').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('foto_diri').value = "";
    }
  }
  function cek_ukuran7(){
    var value = (document.getElementById('scan_semester1').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_semester1').value = "";
    }
  }
  function cek_ukuran8(){
    var value = (document.getElementById('scan_semester2').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_semester2').value = "";
    }
  }
  function cek_ukuran9(){
    var value = (document.getElementById('scan_semester3').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_semester3').value = "";
    }
  }
  function cek_ukuran10(){
    var value = (document.getElementById('scan_semester4').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_semester4').value = "";
    }
  }
  function cek_ukuran11(){
    var value = (document.getElementById('scan_semester5').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('scan_semester5').value = "";
    }
  }
  function cek_ukuran12(){
    var value = (document.getElementById('sertifikat1').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('sertifikat1').value = "";
    }
  }
  function cek_ukuran13(){
    var value = (document.getElementById('sertifikat2').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('sertifikat2').value = "";
    }
  }
  function cek_ukuran14(){
    var value = (document.getElementById('sertifikat3').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('sertifikat3').value = "";
    }
  }
  function cek_ukuran15(){
    var value = (document.getElementById('file_kip').files[0].size)/(1024*1024);
    if (value > 2.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 2MB !!');
      document.getElementById('file_kip').value = "";
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
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_pos'?>",
      data: {kecamatan:kecamatan},
      cache: false,
      success: function(msg){
        $("#kode_pos").val(msg);
      }
    });
  }
  function filter_kabupaten_ortu(){
    var provinsi = document.getElementById('provinsi_ortu').value;
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_kabupaten'?>",
      data: {provinsi:provinsi},
      cache: false,
      success: function(msg){
        $("#kabupaten_ortu").html(msg);
      }
    });
    if (provinsi == ""){
      document.getElementById('kecamatan_ortu').innerHTML = '<option value="">--</option>';
      document.getElementById('desa_ortu').innerHTML = '<option value="">--</option>';
    }
  }
  function filter_kecamatan_ortu(){
    var kabupaten = document.getElementById('kabupaten_ortu').value;
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_kecamatan'?>",
      data: {kabupaten:kabupaten},
      cache: false,
      success: function(msg){
        $("#kecamatan_ortu").html(msg);
      }
    });
    if (kabupaten == ""){
      document.getElementById('desa_ortu').innerHTML = '<option value="">--</option>';
    }
  }
  function filter_desa_ortu(){
    var kecamatan = document.getElementById('kecamatan_ortu').value;
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_desa'?>",
      data: {kecamatan:kecamatan},
      cache: false,
      success: function(msg){
        $("#desa_ortu").html(msg);
      }
    });
    $.ajax({
      type: 'POST',
      url: "<?=base_url('C_daftar').'/get_pos'?>",
      data: {kecamatan:kecamatan},
      cache: false,
      success: function(msg){
        $("#kode_pos_ortu").val(msg);
      }
    });
  }
  function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
  }
</script>
