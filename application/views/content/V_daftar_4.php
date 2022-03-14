<?php
/******************************************
* Filename    : V_daftar_4.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2021-02-28
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten pendaftaran (Form Pendaftaran) data nilai rapot
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
      <form action="<?=base_url('c_daftar')?>/add4" method="post" enctype="multipart/form-data">
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
            <input type="file" class="form-control-file" name="scan_semester1" id="scan_semester1" onchange="cek_ukuran7()" accept="image/*" aria-describedby="fileHelp" required="required">
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
            <input type="file" class="form-control-file" name="scan_semester2" id="scan_semester2" onchange="cek_ukuran8()" accept="image/*" aria-describedby="fileHelp" required="required">
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
            <input type="file" class="form-control-file" name="scan_semester3" id="scan_semester3" onchange="cek_ukuran9()" accept="image/*" aria-describedby="fileHelp" required="required">
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
            <input type="file" class="form-control-file" name="scan_semester4" id="scan_semester4" onchange="cek_ukuran10()" accept="image/*" aria-describedby="fileHelp" required="required">
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
            <input type="file" class="form-control-file" name="scan_semester5" id="scan_semester5" onchange="cek_ukuran11()" accept="image/*" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Upload file scan rapot dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 1MB)</b></small>
            <input type="text" class="form-control" name="scan_semester5_jenis" id="scan_semester5_jenis" value="" hidden>
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
        <!-- Data Nilai Raport Semester 5 Selesai -->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function cek_signup(){
    var sms = 1;
    do{
      var hasil = up_file("scan_semester"+sms);
      sms++;
    }while(sms < 6 && hasil == 1);
    if (hasil == 1){
      return true;
    }else
    if(hasil == -1){
      alert("Format file scan rapot semester "+(sms-1)+" tidak didukung !!");
      return false;
    }else{
      alert("File scan rapot semester "+(sms-1)+" gagal diupload. Silahkan coba tekan tombol \"Selanjutnya\" kembali.");
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
    // console.log('Upload: ' + hasil);
    return hasil;
  }

  function cek_ukuran7(){
    var jenis  = "scan_semester1";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  function cek_ukuran8(){
    var jenis  = "scan_semester2";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  function cek_ukuran9(){
    var jenis  = "scan_semester3";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  function cek_ukuran10(){
    var jenis  = "scan_semester4";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
  function cek_ukuran11(){
    var jenis  = "scan_semester5";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
</script>
