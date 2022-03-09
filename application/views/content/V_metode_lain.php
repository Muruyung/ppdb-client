<?php
/******************************************
* Filename    : V_metode_lain.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2021-03-24
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Konten untuk mengganti password yang lupa dengan metode lain
*
******************************************/ ?>
<style media="screen">
body{
  color: #fff;
  /* background: #63738a; */
  background-image: url("<?=base_url()?>assets/images/parallax_04.jpg");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  background-attachment: fixed;
}
</style>
<br>
<br>
<br>
<br>
<div align="center">
  <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
    <div class="card-header">Lupa Password</div>
    <div class="card-body">
      <div style="margin-top:-3%;" align="left">
        <form class="" action="<?=base_url('C_ganti_pass_lupa')?>/abdi_hilap_kedah_gentos" method="post">
          <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN Anda" required>
          </div>
          <div class="form-group">
            <label>NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Anda" required>
          </div>
          <div class="form-group">
            <label>Nomor Kartu Keluarga </label>
            <input type="text" class="form-control" name="kk" id="kk" placeholder="Masukkan Nomor Kartu Keluarga" required>
          </div>
          <div class="form-group">
            <label>Nama Ibu Kandung</label>
            <input type="text" class="form-control" name="ibu" id="ibu" placeholder="Masukkan Nama Ibu Kandung Anda" required>
          </div>
          <div class="form-group">
            <p class="lead">
              <button type="submit" class="btn btn-primary btn-lg" style="margin-top:10px;" href="#" onclick="return cek_data()" role="button">Periksa</button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function cek_data(){
    var nisn  = document.getElementById('nisn').value;
    var nik   = document.getElementById('nik').value;
    var kk    = document.getElementById('kk').value;
    var ibu   = document.getElementById('ibu').value;

    var link = "<?=base_url('C_metode_lain')?>"+"/cek_data/"+nisn+"/"+nik+"/"+kk+"/"+ibu;
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
      return true;
    }else
    if (cek == -1){
      alert("Data tidak sesuai !!");
      return false;
    }else
    if (cek == -2){
      alert("Anda sudah menggunakan metode ini berkali-kali. Silahkan gunakan metode lain yang tersedia, atau hubungi admin !!");
      return true;
    }else{
      alert("Terdapat kesalahan pada server !!");
      return false;
    }
  }
</script>
