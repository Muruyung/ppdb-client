<?php
/******************************************
* Filename    : V_lupa_pass.php
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
<div align="center" style="margin-bottom:10%">
  <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
    <div class="card-header">Lupa Password</div>
    <div class="card-body">
      <div style="margin-top:-3%;" align="left">
        <form class="" action="<?=base_url('C_lupa_pass1')?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username Anda" required>
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <p class="lead">
              <button type="submit" class="btn btn-primary btn-lg" style="margin-top:10px;" href="#" onclick="return cek_username()" role="button">Cek Username</button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function cek_username(){
    var user  = document.getElementById('username').value;
    var link = "<?=base_url('C_lupa_pass')?>"+"/cek_user/"+user;
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
      var hasil = kirim(user);
      if (hasil == 1){
        alert("Instruksi untuk mengganti password sudah dikirim ke email anda, silahkan cek kotak masuk email anda !!");
        return true;
      }else
      if (hasil == -2){
        return true;
      }else{
        alert("Terjadi masalah pada server. Silahkan coba beberapa saat lagi !!");
        return false;
      }
    }else
    if (cek == -1){
      alert("Akun tidak tersedia, periksa kembali username anda !!");
      return false;
    }
    if (cek == -2){
      alert("Akun ini sudah mencapai batas maksimal dalam ujicoba lupa password. Silahkan hubungi admin !!");
      return false;
    }else{
      alert("Username yang anda masukkan salah !!");
      return false;
    }
  }

  function kirim(user){
    var form_data = new FormData();
    var hasil = -3;
    form_data.append("username",user);
    $.ajax({
      type:"POST",
      url:"<?=base_url('C_lupa_pass')?>/kirim",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      async: false,
      success: function(data){
        hasil = data;
      }
    });
    return hasil;
  }
</script>
