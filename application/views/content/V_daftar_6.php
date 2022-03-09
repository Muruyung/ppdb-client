<?php
/******************************************
* Filename    : V_daftar_6.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2021-02-28
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten pendaftaran (Form Pendaftaran) data akhir
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
      <form action="<?=base_url('c_daftar')?>/add6" method="post" enctype="multipart/form-data">
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
            <div class="form-group col-sm-4">
              <label for="">Nomor KIP</label>
              <input type="text" name="no_kip" class="form-control">
            </div>
            <div class="form-group col-sm-5">
              <label for="exampleInputFile">Upload File KIP</label>
              <input type="file" class="form-control-file" name="file_kip" id="file_kip" onchange="cek_ukuran15()" accept="image/*" aria-describedby="fileHelp">
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
                <button type="submit" class="btn btn-success btn-lg btn-block" onclick="return cek_signup()">Selesai</button>
              </div>
            </div>
          </div>

          <!-- <div class="text-center">
            Sudah memiliki akun? <a href="<?=base_url('C_login')?>">Sign in</a>
          </div> -->
        </div>
        <!-- Konfirmasi Data Pendaftar Selesai -->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function cek_signup(){
    if (confirm('Apakah data yang anda masukkan sudah benar?')){
      if(document.getElementById('jurusan').value == ""){
        alert('Isi terlebih dahulu pilihan jurusan !!');
        return false;
      }else{
        var hasil = up_file("file_kip");
        if(hasil == -1){
          alert("Format file scan KIP tidak didukung !!");
          return false;
        }else
        if (hasil != 0){
          return true;
        }else{
          alert("File scan KIP gagal diupload. Silahkan coba tekan tombol \"Selesai\" kembali.");
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

  function cek_ukuran15(){
    var jenis  = "file_kip";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
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
</script>
