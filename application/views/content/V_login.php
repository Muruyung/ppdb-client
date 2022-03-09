<?php
/******************************************
* Filename    : V_login.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-02
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Konten login
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
<div align="center" style="margin-bottom:5%;">
  <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
    <div class="card-header">Log In</div>
    <div class="card-body">
      <div style="margin-top:-3%;" align="left">
        <form class="" action="<?=base_url()?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
          </div>
          <br>
          <p class="lead">
            <button type="submit" class="btn btn-primary btn-lg" href="#" onclick="return cek_login()" role="button">Masuk</button>
            <a href="<?=base_url("C_lupa_pass")?>" class="btn btn-link white"><small>&nbsp;&nbsp;Lupa password?</small></a>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function cek_login(){
    var api = "test";
    // var api = document.getElementById('api').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if (username == '' || password == ''){
      alert("Tidak boleh ada kolom yang kosong");
      return false;
    }else{
      var link = "<?=base_url('c_login')?>"+"/get/"+username+"/"+password;
      var cek = -3;
      $.ajax({
        type:"GET",
        url:link,
        async:false,
        success:function(isi){
          cek = isi;
        }
      });
      // alert(cek);
      if (cek == 1){
        alert("Selamat Anda berhasil login !!");
        return true;
      }else{
        alert("Username atau password salah !!");
        return false;
      }
    }
  }
</script>
