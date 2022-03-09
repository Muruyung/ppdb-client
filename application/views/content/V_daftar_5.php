<?php
/******************************************
* Filename    : V_daftar_5.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2021-02-28
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten pendaftaran (Form Pendaftaran) data prestasi
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
      <form action="<?=base_url('c_daftar')?>/add5" method="post" enctype="multipart/form-data">
        <!-- Prestasi Yang Pernah Diraih Mulai -->
        <div class="signup-form" id="opsi_prestasi">
          <h2>Prestasi Yang Pernah Diraih</h2>

          <div class="row">
            <div class="col">
              <h3>Prestasi 1</h3>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-sm-5">
              <label for="">Nama Lomba</label>
              <input type="text" name="pres1" class="form-control">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Bidang</label>
              <select class="form-control" name="bidang1">
                <option value="">--</option>
                <?php
                foreach ($bidang as $_bidang) {
                  ?>
                  <option value="<?=$_bidang['bidang']?>"><?=$_bidang['bidang']?></option>
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
                  <option value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Tahun</label>
              <input type="text" name="tahun1" class="form-control">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Kategori</label>
              <select class="form-control" name="kategori1">
                <option value="">--</option>
                <option value="Perorangan">Perorangan</option>
                <option value="Beregu">Beregu</option>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="">Prestasi</label>
              <select class="form-control" name="prestasi1">
                <option value="">--</option>
                <?php
                foreach ($prestasi as $_prestasi) {
                  ?>
                  <option value="<?=$_prestasi['prestasi']?>"><?=$_prestasi['prestasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Penyelenggara</label>
              <input type="text" name="penyelenggara1" class="form-control">
            </div>
            <div class="form-group col-sm-3">
              <label for="">Tempat Lomba</label>
              <input type="text" name="tempat1" class="form-control">
            </div>
            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat1" id="sertifikat1" onchange="cek_ukuran12()" accept="image/*" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
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
              <input type="text" name="pres2" class="form-control">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Bidang</label>
              <select class="form-control" name="bidang2">
                <option value="">--</option>
                <?php
                foreach ($bidang as $_bidang) {
                  ?>
                  <option value="<?=$_bidang['bidang']?>"><?=$_bidang['bidang']?></option>
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
                  <option value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Tahun</label>
              <input type="text" name="tahun2" class="form-control">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Kategori</label>
              <select class="form-control" name="kategori2">
                <option value="">--</option>
                <option value="Perorangan">Perorangan</option>
                <option value="Beregu">Beregu</option>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="">Prestasi</label>
              <select class="form-control" name="prestasi2">
                <option value="">--</option>
                <?php
                foreach ($prestasi as $_prestasi) {
                  ?>
                  <option value="<?=$_prestasi['prestasi']?>"><?=$_prestasi['prestasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Penyelenggara</label>
              <input type="text" name="penyelenggara2" class="form-control">
            </div>
            <div class="form-group col-sm-3">
              <label for="">Tempat Lomba</label>
              <input type="text" name="tempat2" class="form-control">
            </div>
            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat2" id="sertifikat2" onchange="cek_ukuran13()" accept="image/*" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
              <input type="text" class="form-control" name="sertifikat1_jenis" id="sertifikat1_jenis" value="" hidden>
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
              <input type="text" name="pres3" class="form-control">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Bidang</label>
              <select class="form-control" name="bidang3">
                <option value="">--</option>
                <?php
                foreach ($bidang as $_bidang) {
                  ?>
                  <option value="<?=$_bidang['bidang']?>"><?=$_bidang['bidang']?></option>
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
                  <option value="<?=$_tingkat['tingkat']?>"><?=$_tingkat['tingkat']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Tahun</label>
              <input type="text" name="tahun3" class="form-control">
            </div>

            <div class="form-group col-sm-4">
              <label for="">Kategori</label>
              <select class="form-control" name="kategori3">
                <option value="">--</option>
                <option value="Perorangan">Perorangan</option>
                <option value="Beregu">Beregu</option>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="">Prestasi</label>
              <select class="form-control" name="prestasi3">
                <option value="">--</option>
                <?php
                foreach ($prestasi as $_prestasi) {
                  ?>
                  <option value="<?=$_prestasi['prestasi']?>"><?=$_prestasi['prestasi']?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="">Penyelenggara</label>
              <input type="text" name="penyelenggara3" class="form-control">
            </div>
            <div class="form-group col-sm-3">
              <label for="">Tempat Lomba</label>
              <input type="text" name="tempat3" class="form-control">
            </div>
            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File Sertifikat</label>
              <input type="file" class="form-control-file" name="sertifikat3" id="sertifikat3" onchange="cek_ukuran14()" accept="image/*" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload file sertifikat dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
              <input type="text" class="form-control" name="sertifikat1_jenis" id="sertifikat1_jenis" value="" hidden>
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
        <!-- Prestasi Yang Pernah Diraih Selesai -->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function cek_signup(){
    var sertif = 1;
    do{
      var hasil = up_file("sertifikat"+sertif);
      sertif++;
    }while(sertif < 4 && hasil != 0);
    if(hasil == -1){
      alert("Format file sertifikat tidak didukung !!");
      return false;
    }else
    if (hasil != 0){
      return true;
    }else{
      alert("File sertifikat gagal diupload. Silahkan coba tekan tombol \"Lanjutkan\" kembali.");
      return false;
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

  function cek_ukuran12(){
    var jenis  = "sertifikat1";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  function cek_ukuran13(){
    var jenis  = "sertifikat2";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }
  }

  function cek_ukuran14(){
    var jenis  = "sertifikat3";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 1.25){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 1MB !!');
      document.getElementById(jenis).value = "";
    }
  }
</script>
