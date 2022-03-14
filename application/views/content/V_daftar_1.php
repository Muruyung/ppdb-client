<?php
/******************************************
* Filename    : V_daftar_1.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-03
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten pendaftaran (Form Pendaftaran) data diri siswa
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
  label{
    color:black;
  }
</style>

<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col col-md-8">
      <form action="<?=base_url("c_daftar")?>/add1" method="post" enctype="multipart/form-data">

        <!-- Data Siswa Mulai -->
        <div class="signup-form">
          <h2>Data Siswa</h2>
          <!-- <p class="hint-text">Pendaftaran Peserta Didik Baru Tahun Ajaran 2020/2021</p> -->
          <div class="form-group">
            <label for="">Jalur Pendaftaran <b style="color:red;">(WAJIB)*</b></label>
            <div class="row">
              <?php
              $date_ex_prestasi = date_create("2022-05-07");
              $date_start_reguler = date_create("2022-03-04");
              $date_now = date_create(date("Y-m-d"));
              $diff = date_diff($date_ex_prestasi, $date_now);
              $diff_reguler = date_diff($date_now, $date_start_reguler);
              if ($diff->format("%R%a") < 0){
                ?>
                <div class="col-sm-3">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jalur_daftar" id="jalur_daftar1" value="prestasi">
                    Jalur Prestasi
                  </div>
                </div>
                <?php
              }
              if ($diff_reguler->format("%R%a") < 0){
                ?>
              <div class="col-sm-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jalur_daftar" id="jalur_daftar2" value="umum">
                  Jalur Reguler
                </div>
              </div>
              <?php
              } 
            ?>
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
              <label for="">Kode Pos</label>
              <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="" value="-">
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

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Waktu Tempuh ke Madrasah <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="waktu" id="waktu">
                <option value="">--</option>
                <?php
                foreach ($waktu as $_waktu) {
                  ?>
                  <option value="<?=$_waktu['waktu']?>"><?=$_waktu['waktu']?></option>
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
            <div class="form-group col-sm-4">
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
            <div class="form-group col-sm-5">
              <label for="">Pernah Mengikuti PAUD <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="paud" id="paud">
                <option value="">--</option>
                <option value="Tidak">Tidak</option>
                <option value="Pernah">Pernah</option>
              </select>
            </div>
            <div class="form-group col-sm-5">
              <label for="">Pernah Mengikuti TK/RA <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="tk" id="tk">
                <option value="">--</option>
                <option value="Tidak">Tidak</option>
                <option value="Pernah">Pernah</option>
              </select>
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
            <input type="file" class="form-control-file" name="foto_diri" id="foto_diri" onchange="cek_ukuran1()" accept="image/*" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload foto formal dengan format jpg, jpeg, png, dan sejenisnya  <b style="color:blue;">(Ukuran file maksimal 3MB)</b></small>
            <input type="text" class="form-control" name="foto_diri_jenis" id="foto_diri_jenis" value="" hidden>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Akte <b style="color:red;">(WAJIB)*</b></label>
            <input type="file" class="form-control-file" name="scan_akte" id="scan_akte" onchange="cek_ukuran2()" accept="image/*" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 3MB)</b></small>
            <input type="text" class="form-control" name="scan_akte_jenis" id="scan_akte_jenis" value="" hidden>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Surat Keterangan Sehat</label>
            <input type="file" class="form-control-file" name="scan_sehat" id="scan_sehat" onchange="cek_ukuran3()" accept="image/*" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 3MB)</b></small>
            <input type="text" class="form-control" name="scan_sehat_jenis" id="scan_sehat_jenis" value="" hidden>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File Scan Surat Kelakuan Baik</label>
            <input type="file" class="form-control-file" name="scan_baik" id="scan_baik" onchange="cek_ukuran4()" accept="image/*" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 3MB)</b></small>
            <input type="text" class="form-control" name="scan_baik_jenis" id="scan_baik_jenis" value="" hidden>
          </div>

          <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="return cek_signup()">Lanjutkan</button>
              </div>
            </div>
          </div>
          <div class="text-center">
            Sudah memiliki akun? <a href="<?=base_url('C_login')?>">Masuk</a>
          </div>
        </div>
        <!-- Data Siswa Akhir -->

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
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  // var jenis_file;
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
          }else
          if(document.getElementById('gender1').checked == false && document.getElementById('gender2').checked == false){
            alert('Pilih terlebih dahulu jenis kelamin !!');
            return false;
          }else
          if(document.getElementById('agama').value == ""){
            alert('Isi terlebih dahulu pilihan Agama !!');
            return false;
          }else
          if(document.getElementById('hobi').value == ""){
            alert('Isi terlebih dahulu pilihan hobi !!');
            return false;
          }else
          if(document.getElementById('cita-cita').value == ""){
            alert('Isi terlebih dahulu pilihan cita-cita !!');
            return false;
          }else
          if(document.getElementById('provinsi').value == ""){
            alert('Isi terlebih dahulu pilihan provinsi !!');
            return false;
          }else
          if(document.getElementById('kabupaten').value == ""){
            alert('Isi terlebih dahulu pilihan kabupaten !!');
            return false;
          }else
          if(document.getElementById('kecamatan').value == ""){
            alert('Isi terlebih dahulu pilihan kecamatan !!');
            return false;
          }else
          if(document.getElementById('desa').value == ""){
            alert('Isi terlebih dahulu pilihan desa !!');
            return false;
          }else
          if(document.getElementById('tempat_tinggal').value == ""){
            alert('Isi terlebih dahulu pilihan tempat tinggal !!');
            return false;
          }else
          if(document.getElementById('jarak').value == ""){
            alert('Isi terlebih dahulu pilihan jarak lokasi ke madrasah !!');
            return false;
          }else
          if(document.getElementById('transportasi').value == ""){
            alert('Isi terlebih dahulu pilihan transportasi ke madrasah !!');
            return false;
          }else
          if(document.getElementById('waktu').value == ""){
            alert('Isi terlebih dahulu pilihan waktu tempuh ke madrasah !!');
            return false;
          }else
          if(document.getElementById('paud').value == ""){
            alert('Isi terlebih dahulu pilihan PAUD !!');
            return false;
          }else
          if(document.getElementById('tk').value == ""){
            alert('Isi terlebih dahulu pilihan TK/RA !!');
            return false;
          }else
          if(document.getElementById('status1').checked == false && document.getElementById('status2').checked == false){
            alert('Pilih terlebih dahulu status anak !!');
            return false;
          }else{
            // create_folder(document.getElementById('nisn').value);
            var hasil = up_file("foto_diri");
            if (hasil == 1){
              hasil = up_file("scan_akte");
              if (hasil == 1){
                hasil = up_file("scan_sehat");
                if(hasil == -1){
                  alert("Format file surat keterangan sehat tidak didukung !!");
                  return false;
                }else
                if (hasil != 0){
                  hasil = up_file("scan_baik");
                  if(hasil == -1){
                    alert("Format file surat kelakuan baik tidak didukung !!");
                    return false;
                  }else
                  if (hasil != 0){
                    return true;
                  }else{
                    alert("Surat kelakuan baik gagal diupload. Silahkan coba tekan tombol \"Lanjutkan\" kembali.");
                    return false;
                  }
                }else{
                  alert("Surat keterangan sehat gagal diupload. Silahkan coba tekan tombol \"Lanjutkan\" kembali.");
                  return false;
                }
              }else
              if(hasil == -1){
                alert("Format file scan akte tidak didukung !!");
                return false;
              }else{
                alert("Scan akte gagal diupload. Silahkan coba tekan tombol \"Lanjutkan\" kembali.");
                return false;
              }
            }else
            if(hasil == -1){
              alert("Format file foto diri tidak didukung !!");
              return false;
            }else{
              alert("hasil="+hasil+" Foto diri gagal diupload. Silahkan coba tekan tombol \"Lanjutkan\" kembali.");
              return false;
            }
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

  function create_folder(nisn){
    var form_data = new FormData();
    form_data.append("folder",nisn);
    $.ajax({
      type:"POST",
      url:"<?=base_url('C_daftar')?>/create_folder",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){}
    });
  }

  function up_file(jenis){
    var form_data = new FormData();
    var gbr = document.getElementById(jenis).files[0];
    var hasil = -3;
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
      async:false,
      success: function(data){
        hasil = data;
      }
    });
    return hasil;
  }

  function cek_ukuran1(){
    var jenis  = "foto_diri";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  
  function cek_ukuran2(){
    var jenis  = "scan_akte";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  
  function cek_ukuran3(){
    var jenis  = "scan_sehat";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  
  function cek_ukuran4(){
    var jenis  = "scan_baik";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
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
      document.getElementById('nik').value = "";
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
      document.getElementById('nisn').value = "";
    }
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
</script>
