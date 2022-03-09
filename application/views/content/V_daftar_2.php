<?php
/******************************************
* Filename    : V_daftar_2.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-03
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten pendaftaran (Form Pendaftaran) data orang tua & wali
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
      <form action="<?=base_url('c_daftar')?>/add2" method="post" enctype="multipart/form-data">

        <!-- Data Orang Tua Mulai -->
        <div class="signup-form">
          <h2>Data Orang Tua</h2>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">Nomor Kartu Keluarga <b style="color:red;">(WAJIB)*</b></label>
              <input type="text" class="form-control" name="no_kk" onchange="cek_panjang_no_kk()" placeholder="" required="required">
            </div>
            <div class="form-group col-sm-6">
              <label for="exampleInputFile">File Scan Kartu Keluarga <b style="color:red;">(WAJIB)*</b></label>
              <input type="file" class="form-control-file" name="scan_kk" id="scan_kk" onchange="cek_ukuran5()" accept="image/*" aria-describedby="fileHelp" required="required">
              <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 3MB)</b></small>
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
                <label for="">Status Ayah <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="status_ayah" id="status_ayah">
                  <option value="">--</option>
                  <option value="Masih Hidup">Masih Hidup</option>
                  <option value="Sudah Meninggal">Sudah Meninggal</option>
                  <option value="Tidak Diketahui">Tidak Diketahui</option>
                </select>
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
                <label for="">Penghasilan per Bulan <b style="color:red;">(WAJIB)*</b></label>
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
              <div class="form-group">
                <label for="">Nama Kepala Keluarga <b style="color:red;">(WAJIB)*</b></label>
                <input type="text" class="form-control" name="nama_kepala_klg" placeholder="" required="required">
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
                <label for="">Status Ibu <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="status_ibu" id="status_ibu">
                  <option value="">--</option>
                  <option value="Masih Hidup">Masih Hidup</option>
                  <option value="Sudah Meninggal">Sudah Meninggal</option>
                  <option value="Tidak Diketahui">Tidak Diketahui</option>
                </select>
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

        <!-- Data Alamat Orang Tua Mulai -->
        <div class="signup-form">
          <h2>Alamat Orang Tua</h2>
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
            <div class="form-group col-sm-6">
              <label for="">Status Kepemilikan Rumah <b style="color:red;">(WAJIB)*</b></label>
              <select class="form-control" name="kepemilikan" id="kepemilikan">
                <option value="">--</option>
                <?php
                foreach ($kepemilikan as $_kepemilikan) {
                  ?>
                  <option value="<?=$_kepemilikan['status']?>"><?=$_kepemilikan['status']?></option>
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

          <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="return cek_signup()">Selanjutnya</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Data Wali Selesai -->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  alert('Username anda: <?=$this->session->userdata('data_login')['username']?> dan Password anda: <?=decrypt_url($this->session->userdata('data_login')['password'])?>');
  function cek_signup(){
    if (confirm('Apakah data yang anda masukkan sudah benar?')){
      if(document.getElementById('pend_ayah').value == ""){
        alert('Isi terlebih dahulu pilihan pendidikan ayah !!');
        return false;
      }else
      if(document.getElementById('kerja_ayah').value == ""){
        alert('Isi terlebih dahulu pilihan pekerjaan ayah !!');
        return false;
      }else
      if(document.getElementById('status_ayah').value == ""){
        alert('Isi terlebih dahulu pilihan status ayah !!');
        return false;
      }else
      if(document.getElementById('gaji_ortu').value == ""){
        alert('Isi terlebih dahulu pilihan penghasilan orang tua !!');
        return false;
      }else
      if(document.getElementById('pend_ibu').value == ""){
        alert('Isi terlebih dahulu pilihan pendidikan ibu !!');
        return false;
      }else
      if(document.getElementById('kerja_ibu').value == ""){
        alert('Isi terlebih dahulu pilihan pekerjaan ibu !!');
        return false;
      }else
      if(document.getElementById('status_ibu').value == ""){
        alert('Isi terlebih dahulu pilihan status ibu !!');
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
      }else{
        var hasil = up_file("scan_kk");
        if (hasil == 1){
          return true;
        }if(hasil == -1){
          alert("Format file scan kartu keluarga tidak didukung !!");
          return false;
        }else{
          alert("File scan kartu keluarga gagal diupload. Silahkan coba tekan tombol \"Selanjutnya\" kembali.");
          return false;
        }
      }
    }
  }

  function up_file(jenis){
    var form_data = new FormData();
    var gbr = document.getElementById(jenis).files[0];
    var hasil = -3;
    form_data.append("file", gbr);
    form_data.append("nisn", "<?= $nisn ?>");
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

  function cek_ukuran5(){
    var jenis  = "scan_kk";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }

  function cek_panjang_no_kk(){
    var value = document.getElementById('no_kk').value;
    if (value.length != 16){
      if (value.length < 16){
        alert('Nomor KK yang anda masukkan kurang.');
      }else{
        alert('Nomor KK yang anda masukkan terlalu panjang.');
      }
      alert('Panjang Nomor KK harus 16 digit !!');
      document.getElementById('no_kk').value = "";
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
      document.getElementById('nik_ayah').value = "";
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
      document.getElementById('nik_ibu').value = "";
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
      document.getElementById('nik_wali').value = "";
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
