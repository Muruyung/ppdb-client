<?php
/******************************************
* Filename    : V_daftar_3.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2021-02-28
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten pendaftaran (Form Pendaftaran) data sekolah
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
      <form action="<?=base_url('c_daftar')?>/add3" method="post" enctype="multipart/form-data">

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
                <option value="SMP Terbuka">SMP Terbuka</option>
                <option value="Mu'adalah MTS">Mu'adalah MTS</option>
                <option value="SMP Luar Negeri">SMP Luar Negeri</option>
                <option value="Salafiyah Wustha">Salafiyah Wustha</option>
                <option value="SLB-SMP">SLB-SMP</option>
                <option value="SLB-MTS">SLB-MTS</option>
                <option value="Paket B">Paket B</option>
                <option value="Lainnya">Lainnya</option>
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
            <div class="form-group col-sm-10">
              <label for="">Alamat Sekolah <b style="color:red;">(WAJIB)*</b></label>
              <textarea class="form-control" name="alamat_sekolah" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"></textarea>
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
                <label for="">Lokasi Sekolah <b style="color:red;">(WAJIB)*</b></label>
                <select class="form-control" name="lokasi_sekolah" id="lokasi_sekolah">
                  <option value="">--</option>
                  <option value="Dalam Kabupaten/Kota">Dalam Kabupaten/Kota</option>
                  <option value="Dalam Provinsi">Dalam Provinsi</option>
                  <option value="Luar Provinsi">Luar Provinsi</option>
                  <option value="Luar Negeri">Luar Negeri</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nomor Seri Ijazah</label>
                <input type="text" name="no_ijazah" class="form-control">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="exampleInputFile">File Scan Surat Keterangan Kelulusan</label>
            <input type="file" class="form-control-file" name="scan_lulus" id="scan_lulus" onchange="cek_ukuran6()" accept="image/*" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload file scan dengan format PDF/JPG/PNG  <b style="color:blue;">(Ukuran file maksimal 3MB)</b></small>
            <input type="text" class="form-control" name="scan_lulus_jenis" id="scan_lulus_jenis" value="" hidden>
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
        <!-- Sekolah Asal Selesai -->
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function cek_signup(){
    if (confirm('Apakah data yang anda masukkan sudah benar?')){
      if(document.getElementById('sekolah').value == ""){
        alert('Isi terlebih dahulu pilihan sekolah !!');
        return false;
      }else
      if(document.getElementById('status_sekolah1').checked == false && document.getElementById('status_sekolah2').checked == false){
        alert('Pilih terlebih dahulu status sekolah !!');
        return false;
      }else
      if(document.getElementById('lokasi_sekolah').value == ""){
        alert('Isi terlebih dahulu pilihan lokasi sekolah !!');
        return false;
      }else{
        var hasil = up_file("scan_lulus");
        if(hasil == -1){
          alert("Format file surat keterangan kelulusan tidak didukung !!");
          return false;
        }else
        if (hasil != 0){
          return true;
        }else{
          alert("File scan surat keterangan kelulusan gagal diupload. Silahkan coba tekan tombol \"Selanjutnya\" kembali.");
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

  function cek_ukuran6(){
    var jenis  = "scan_lulus";
    var gbr = document.getElementById(jenis).files[0];
    var value = (gbr.size)/(1024*1024);
    if (value > 3.15){
      alert('Ukuran file terlalu besar. Maksimal file berukuran 3MB !!');
      document.getElementById(jenis).value = "";
    }
  }
</script>
