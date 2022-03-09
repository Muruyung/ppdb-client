<?php
/******************************************
* Filename    : home.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-02
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Isi konten halaman beranda
*
******************************************/
if (!is_null($this->session->userdata('kirim_email')) && $this->session->userdata('kirim_email') == 'true') {
  ?>
  <script type="text/javascript">
  alert('Username dan Password anda sudah dikirim melalui E-Mail.');
  </script>
  <?php
  $this->session->sess_destroy();
}
?>

 <div id="slider" class="sl-slider-wrapper" style="margin-top:50px;">

   <div class="sl-slider">
     <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
       <div class="sl-slide-inner">
         <div class="bg-img bg-img-1"></div>
         <?php
            $date_ex = date_create("2021-07-07");
            $date_now = date_create(date("Y-m-d"));
            $diff = date_diff($date_ex, $date_now);
            if($login == 'false'){
              ?>
              <h2>SELAMAT DATANG DI PPDB ONLINE<br>MAN 1 CIANJUR</h2>
              <?php
              if($diff->format("%R%a") < 0){
                ?>
                <blockquote><p>Silahkan klik tombol Daftar untuk melakukan pendaftaran peserta didik baru secara online</p>
                  <a href="<?=base_url('C_daftar')?>" class="bttn-new">Daftar</a>
                </blockquote>
                <?php
              }else{
                ?>
                <blockquote><p>Silahkan klik tombol Login untuk mengakses akun PPDB anda</p>
                  <a href="<?=base_url('C_login')?>" class="bttn-new">Login</a>
                </blockquote>
                <?php
              }
              ?>
              <?php
            }else{
              ?>
              <h2>HAI <?=strtoupper($nama)?></h2>
                <!-- <blockquote><p>Silahkan klik tombol Cetak Kartu untuk mencetak kartu pendaftaran</p>
                  <a onclick="maintenance()" href="<?=base_url('C_cetak_formulir')?>" class="bttn-new">Cetak Kartu</a>
              </blockquote> -->
              <blockquote><p>Silahkan klik tombol Edit Data untuk mengedit dan melihat data pendaftaran anda.</p>
                <a href="<?=base_url('C_edit_daftar')?>" class="bttn-new">Edit Data</a>
              </blockquote>
              <?php
            }
          ?>
       </div>
     </div>

     <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
       <div class="sl-slide-inner">
         <div class="bg-img bg-img-2"></div>
         <?php
            if ($login == 'false') {
              ?>
              <h2>SELAMAT DATANG DI PPDB ONLINE<br>MAN 1 CIANJUR</h2>
              <blockquote><p>Menu Untuk Melihat Anda Terdaftar Atau Belum. </p>
                <?php
                if ($diff->format("%R%a") < 0){
                  ?>
                  <a href="<?=base_url('C_pemberitahuan')?>" class="bttn-new">Pemberitahuan</a>
                  <?php
                }else{
                  ?>
                  <a href="<?=base_url('C_login')?>" class="bttn-new">Login</a>
                  <?php
                }
                ?>
              </blockquote>
              <?php
            }else{
              ?>
              <h2>HAI <?=strtoupper($nama)?></h2>
              <blockquote><p>Menu Untuk Mengganti Password Lama dengan Password Baru. </p>
                <a href="<?=base_url('C_ganti_pass')?>" class="bttn-new">Ganti Password</a>
              </blockquote>
              <?php
            }
          ?>
       </div>
     </div>

     <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
       <div class="sl-slide-inner">
         <div class="bg-img bg-img-3"></div>
         <?php
            if ($login == 'false') {
              ?>
              <h2>SELAMAT DATANG DI PPDB ONLINE<br>MAN 1 CIANJUR</h2>
              <blockquote><p>Menu Untuk mengirim Komentar ke Admin. </p>
                <?php
                if ($diff->format("%R%a") < 0){
                  ?>
                  <a href="<?=base_url('C_komentar')?>" class="bttn-new">Komentar</a>
                  <?php
                }else{
                  ?>
                  <a href="<?=base_url('C_login')?>" class="bttn-new">Login</a>
                  <?php
                }
                ?>
              </blockquote>
              <?php
            }else{
              ?>
              <h2>HAI <?=strtoupper($nama)?></h2>
              <blockquote><p>Menu Untuk Melihat data sudah masuk atau belum </p>
                <a href="<?=base_url('C_pemberitahuan')?>" class="bttn-new">Pemberitahuan</a>
              </blockquote>
              <?php
            }
          ?>
       </div>
     </div>

     <!-- <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
       <div class="sl-slide-inner">
         <div class="bg-img bg-img-3"></div>
         <h2>Search engine, Analytics, Traffic</h2>
         <blockquote><p>Etiam felis elit, mollis posuere accumsan ac, dignissim a ligula. Nam ullamcorper ornare tortor sed dapibus. Aliquam ultrices vestibulum sodales. Aenean efficitur massa vel tellus dapibus pellentesque. </p>
           <a href="#" class="bttn-new">Started Today</a>
         </blockquote>
       </div>
     </div> -->

     <!-- <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
       <div class="sl-slide-inner">
         <div class="bg-img bg-img-4"></div>
         <h2>Social Networking</h2>
         <blockquote><p>Etiam felis elit, mollis posuere accumsan ac, dignissim a ligula. Nam ullamcorper ornare tortor sed dapibus. Aliquam ultrices vestibulum sodales. Aenean efficitur massa vel tellus dapibus pellentesque. </p>
           <a href="#" class="bttn-new">Started Today</a>
         </blockquote>
       </div>
     </div> -->
   </div><!-- /sl-slider -->


   <nav id="nav-dots" class="nav-dots">
     <span class="nav-dot-current"></span>
     <span></span>
     <span></span>
     <!-- <span></span> -->
   </nav>

 </div><!-- /slider-wrapper -->

<!-- <section id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aligncenter">
          <h2 class="aligncenter">Courses</h2>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt..
        </div>
        <br>
      </div>
    </div>
    <div class="row">
      <div class="skill-home">
        <div class="skill-home-solid clearfix">
          <div class="col-md-3 text-center">
            <span class="icons c1"><i class="fa fa-book"></i></span>
            <div class="box-area">
              <h3>Vocational Courses</h3>
              <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <span class="icons c2"><i class="fa fa-users"></i></span>
            <div class="box-area">
              <h3>MassComm Courses</h3>
              <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <span class="icons c3"><i class="fa fa-trophy"></i></span>
            <div class="box-area">
              <h3>Accounts</h3>
              <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <span class="icons c4"><i class="fa fa-globe"></i></span>
            <div class="box-area">
              <h3>Business Management</h3> <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<div class="container" style="margin-top:25px; background-color:white;">
  <div class="row">
    <div class="col-md-12">
      <div class="aligncenter">
        <h2 class="aligncenter">Informasi Pendaftaran</h2>
      </div>
      <br>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5" style="background-color:yellow;">
      <!-- Heading and para -->
      <div class="block-heading-two">
        <h3><span>Pendaftaran </span></h3>
      </div>
      <table>
           <tr>
          <th>Pendaftaran Online Gelombang I</th>
          <th>:</th>
          <th>&nbsp;man1cianjur.com</th>
        </tr>
        <tr>
        <tr>
          <th>Pendaftaran Offline Gelombang I</th>
          <th>:</th>
          <th>&nbsp;Seketariat PPDB MAN 1 Cianjur</th>
        </tr>
        <tr>
          <th>Jalur Prestasi</th>
          <th>:</th>
          <th>&nbsp;26 April - 29 Mei 2021</th>
        </tr>
        <tr>
          <th>Jalur Umum</th>
          <th>:</th>
          <th>&nbsp;26 April - 07 Juli 2021</th>
        </tr>
      </table>
      <br>
      <p style="color:red;background-color:white;text-align:justify;"><b>Jika Kuota Sudah Terpenuhi di Gelombang I maka Gelombang II Ditiadakan</b></p>
      <table>
         </div>
        <tr>
          <th>Pendaftaran Online Gelombang II</th>
          <th>:</th>
          <th>&nbsp;man1cianjur.com</th>
        </tr>
        <tr>
        <tr>
          <th>Pendaftaran Offline Gelombang II</th>
          <th>:</th>
          <th>&nbsp;Seketariat PPDB MAN 1 Cianjur</th>
        </tr>
        <tr>
          <th>Jalur Prestasi</th>
          <th>:</th>
          <th>&nbsp;14 - 19 Juni 2021</th>
        </tr>
        <tr>
          <th>Jalur Umum</th>
          <th>:</th>
          <th>&nbsp;14 - 26 Juni 2021</th>
        </tr>
        <tr>
          <th>Hari Senin-Jum'at&nbsp;</th>
          <th>:</th>
          <th>&nbsp;Buka jam 08.00 - 15.00 WIB</th>
        </tr>

      </table>
      
      <br>
      <table>
        <tr>
          <th>Kontak Informasi 1&nbsp;&nbsp;</th>
          <th>:</th>
          <th>&nbsp;H. Rahmat Mulyana,S.Pd,MM(085720014200)</th>
        </tr>
        <tr>
          <th>Kontak Informasi 2&nbsp;&nbsp;</th>
          <th>:</th>
          <th>&nbsp;Dodi Setiadi,S.Pd(081930495213)</th>
        </tr><tr>
          <th>Kontak Informasi 3&nbsp;&nbsp;</th>
          <th>:</th>
          <th>&nbsp;N.Rika Komariah,S.Ag,MM.Pd (082214956168)</th>
        </tr>
        
      </table>
    </div>

    <div class="col-md-3" style="background-color:rgb(255, 162, 0);">
      <div class="timetable">
        <h3><span class="fa fa-clock-o"></span> Jadwal Seleksi</h3>
        <hr>
        <h4>Seleksi Jalur Prestasi GelombangI</h4>
        <dl>
          <dt>Tanggal 24 - 27 Mei 2021</dt>
          <dd></dd>
        </dl>
        <hr>
        <h4>Seleksi Jalur Reguler Gelombang I</h4>
        <dl>
          <dt>Tanggal 31 Mei - 29 Juni 2021</dt>
          <dd></dd>
          <hr>
        <h4>Seleksi Jalur Prestasi GelombangII</h4>
        <dl>
          <dt>Tanggal 21 - 22 Juni 2021</dt>
          <dd></dd>
        </dl>
        <hr>
        <h4>Seleksi Jalur Reguler Gelombang II</h4>
        <dl>
          <dt>Tanggal 24 - 26 Juni 2021</dt>
          <dd></dd>
        </dl>
      </div>
    </div>

    <div class="col-md-4" style="background-color:rgb(255, 127, 59);">
      <div class="timetable">
        <h3><span class="fa fa-clock-o"></span> Pengumuman</h3>
        <hr>
        <h4>Jalur Prestasi</h4>
        <dl>
          <dt>Pengumuman Kelulusan Gelombang I(Online/ Offline):</dt>
          <dd>29 Mei 2021</dd>
        </dl>
        <dl>
          <dt>Daftar Ulang/Registrasi ulang Gelombang I:</dt>
          <dd>31 Mei - 05 Juni 2021</dd>
        </dl>
        <hr>
        <h4>Jalur Reguler</h4>
        <dl>
          <dt>Pengumuman Kelulusan Gelombang I (Online/ Offline):</dt>
          <dd>07 Juni 2021</dd>
        </dl>
        <dl>
          <dt>Daftar Ulang/Registrasi ulang Gelombang I :</dt>
          <dd>08 Mei - 12 Juni 2021</dd>
        </dl>
        <hr>
        <h4>Jalur Prestasi</h4>
        <dl>
          <dt>Pengumuman Kelulusan Gelombang II (Online/ Offline):</dt>
          <dd>23 Juni 2021</dd>
        </dl>
        <dl>
          <dt>Daftar Ulang/Registrasi ulang Gelombang II : </dt>
          <dd>24 - 26 Juni 2021</dd>
        </dl>
        <hr>
        <h4>Jalur Reguler</h4>
        <dl>
          <dt>Pengumuman Kelulusan Gelombang II (Online/ Offline):</dt>
          <dd>28 Juni 2021</dd>
        </dl>
        <dl>
          <dt>Daftar Ulang/Registrasi ulang Gelombang II : </dt>
          <dd>29 Juni - 03 Juli 2021</dd>
        </dl>
      </div>
    </div>

  </div>
  <br>
</div>

<div class="container" style="background-color:rgb(28, 104, 117); color:white; margin-bottom:50px;">
  <div class="row">
    <div class="col-md-12">
      <div class="text-center">
        <h2 style="color:white;">Ketentuan Kelulusan</h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="about-text">
        <ul class="withArrow">
          <span style="font-size:20px">1. Lulusan Satuan Pendidikan SMP/MTs</span>
          <li><span class="fa fa-angle-right"></span> Dibutuhkan dengan adanya Foto Copy Surat Kelulusan yang disahkan oleh satuan pendidikan SMP/MTs.</li>
          <br>
          <span style="font-size:20px">2. Jalur Prestasi</span>
          <li><span class="fa fa-angle-right"></span> Memiliki PrestasiAkademik atau Non Akademik (dibuktikan dengan sertifikat / surat keterangan)  </li>
          <li><span class="fa fa-angle-right"></span> Nilai Raport (SMT.1 - 5) dilampiri scan rapot semester 1 -5 </li>

          <br>
          <span style="font-size:20px">3. Jalur Umum</span>

          <li><span class="fa fa-angle-right"></span>  Nilai Raport (SMT.1 - 5) dilampiri scan rapot semester 1 -5</li>

        </ul>

        <!-- <a href="#" class="btn btn-primary" style="margin-top:25px;margin-bottom:25px;">Pengumuman</a> -->
      </div>
    </div>
    <!-- <div class="col-md-6 col-sm-6">
    <div class="about-image">
    <img src="img/about.jpg" alt="About Images">
  </div>
</div> -->
</div>
</div>
