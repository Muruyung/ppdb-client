<?php
/******************************************
* Filename    : V_ganti_pass_lupa.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2021-03-24
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Konten untuk mengganti password yang lupa
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
    <div class="card-header">Ganti Password Anda</div>
    <div class="card-body">
      <div style="margin-top:-3%;" align="left">
        <form class="" action="<?=base_url('C_login')?>" method="post">
          <div class="form-group">
            <label for="exampleInputPassword1">Password Baru</label>
            <input type="password" class="form-control" name="pass_baru" id="pass_baru" placeholder="Masukkan Password Baru" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Ulangi Password Baru</label>
            <input type="password" class="form-control" name="ulang_pass_baru" id="ulang_pass_baru" placeholder="Ulangi Password Baru" required>
          </div>
          <div class="form-group">
            <p class="lead">
              <button type="submit" class="btn btn-primary btn-lg" style="margin-top:10px;" href="#" onclick="return cek_ganti()" role="button">Ganti Password</button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function cek_ganti(){
    var baru  = document.getElementById('pass_baru').value;
    var ulang = document.getElementById('ulang_pass_baru').value;

    if(baru.length < 8){
      alert('Panjang password baru minimal 8 karakter');
      return false;
    }
    if (baru == '' || ulang == ''){
      alert("Tidak boleh ada kolom yang kosong !!");
      return false;
    } else
    if (baru != ulang){
      alert("Password yang anda ulangi tidak sesuai !!");
      return false;
    } else {
      var link = "<?=base_url('C_ganti_pass_lupa')?>"+"/gentos_heula_ah_pass_na/"+baru;
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
        alert("Selamat password anda berhasil diganti !!");
        return true;
      }else
      if (cek == -1){
        alert("Password lama anda tidak sesuai !!");
        return false;
      }else{
        alert("Password hanya boleh terdiri dari huruf dan angka !!");
        return false;
      }
    }
  }
</script>
