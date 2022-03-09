<?php
/******************************************
* Filename    : V_lupa_pass1.php
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
<div align="center" style="margin-bottom:12%;">
  <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
    <div class="card-header">Lupa Password</div>
    <div class="card-body">
      <div style="margin-top:-3%;" align="center">
        <button type="submit" id="kirim_email" class="btn btn-primary btn-lg" style="margin-top:10px;" href="#" onclick="return kirim()" role="button">Kirim Ulang Email</button>
        <a type="button" class="btn btn-primary btn-lg" style="margin-top:10px;" href="<?=base_url("C_metode_lain")?>">Gunakan Metode Lain</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function kirim(){
    var form_data = new FormData();
    var hasil = -3;
    form_data.append("username","<?=$this->session->userdata('data_lupa')['username']?>");
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
    if (hasil == 1){
      alert("Instruksi untuk mengganti password sudah dikirim ke email anda, silahkan cek kotak masuk email anda !!");
    }else
    if (hasil == -2){
      alert("Anda sudah menggunakan metode ini berkali-kali. Silahkan gunakan metode lain yang tersedia, atau hubungi admin !!");
      document.getElementById("kirim_email").disabled = true;
    }else{
      alert("Terjadi masalah pada server. Silahkan coba beberapa saat lagi !!");
    }
  }
</script>
