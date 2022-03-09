<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- Include the above in your HEAD tag ---------->


<script type="text/javascript">
$(document).ready(function(){
  var flag = 0;
  var loading = false;
  var ujung = false;
  $('div.konten-utama').scroll(function(){
    if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight-85 && !loading && !ujung){
      console.log("iniflag="+flag);
      loading = true;
      $('.loading-bawah').css('display','block');
      $.ajax({
        type:"GET",
        url:"<?=base_url('C_komentar')?>/get_komentar",
        data: {
          'offset':flag,
          'limit':5,
          'login':'<?=$login?>'
        },
        success: function(data){
          if (data != ""){
            $('.kalo-kosong').css('display','none');
            $('.isi-konten-utama').append(data);
            flag += 5;
            tinymce.init({
              selector: 'textarea.editor',
              toolbar:false,
              height:"350",
              menubar:false,
              statusbar:false
            });
          }else{
            ujung = true;
            $('.loading-bawah').css('display','none');
            $(this).scrollTop($(this)[0].scrollHeight-$(this).innerHeight()-100);
          }
          loading=false;
        }
      });
    }
  });
  $(window).load(function(){
    if ($('div.konten-utama')[0].scrollHeight <= $('div.konten-utama').innerHeight()){
      $('.loading-bawah').css('display','block');
      $.ajax({
        type:"GET",
        url:"<?=base_url('C_komentar')?>/get_komentar",
        data: {
          'offset':0,
          'limit':5,
          'login':'<?=$login?>'
        },
        success: function(data){
          if (data != ""){
            $('.kalo-kosong').css('display','none');
            $('.isi-konten-utama').append(data);
            flag += 5;
            tinymce.init({
              selector: 'textarea.editor',
              toolbar:false,
              height:"350",
              menubar:false,
              statusbar:false
            });
          }
          $('.loading-bawah').css('display','none');
        }
      });
    }
  });
  
  $('#kolom_komentar').click(function(){
    $('div').scrollTop(0);
  });
});
</script>

<style media="screen">
.overflow-comment{
  height: 85vh;
  overflow: scroll;
  scroll-behavior:smooth;
}

.overflow-like{
  max-height: 70vh;
  overflow: scroll;
  scroll-behavior:smooth;
}

.label-container{
  position: -webkit-sticky;
  position: sticky;
	bottom:48px;
	right:105px;
	display:table;
	visibility: hidden;
}

.label-text{
	color:#FFF;
	background:rgba(51,51,51,0.5);
	display:table-cell;
	vertical-align:middle;
	padding:10px;
	border-radius:3px;
}

.label-arrow{
	display:table-cell;
	vertical-align:middle;
	color:#333;
	opacity:0.5;
}

.float{
  position: -webkit-sticky;
  position: sticky;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#00bcd4;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	font-size:24px;
	margin-top:18px;
}

a.float + div.label-container {
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s ease;
}

a.float:hover + div.label-container{
  visibility: visible;
  opacity: 1;
}

.gambar-bulat{
  object-fit: cover;
  object-position:top;
  width: 45px;
  height: 45px;
}

/* Notifikasi */
.notifikasi{
  white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
  white-space: -pre-wrap;      /* Opera 4-6 */
  white-space: -o-pre-wrap;    /* Opera 7 */
  white-space: pre-wrap;       /* css-3 */
  word-wrap: break-word;       /* Internet Explorer 5.5+ */
  white-space: -webkit-pre-wrap; /* Newer versions of Chrome/Safari*/
  white-space: normal;
  width: 400px;
}

td{
  vertical-align: top;
}
</style>

<div class="navbar container" style="margin-top:75px; margin-bottom:50px;">
  <div class="card" style="width:100%;">
    <div class="card-header bg-info">
      <div class="row justify-content-between">
        <div class="col-md-auto">
          <a href="#" id="kolom_komentar"><h1 class="text-white"><i class="fa fa-comments mr-2"></i>Kolom Komentar</h1></a>
        </div>
        <!-- Notifikasi -->
        <!-- <div class="col-md-auto">
          <div class="float-right dropdown" <?php if($login == "false"){ echo "hidden"; } ?>>
            <button class="btn btn-outline-light" id="dropdown-a" data-toggle="dropdown"><i class="fa fa-bell" style="font-size:25px;"></i><span class="badge badge-danger">2</span></button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-a">
              <a class="dropdown-item notifikasi" data-toggle="modal" data-target="#modalNotif" href="#">
                <table>
                  <tr>
                    <td><div class="mt-1"><img src="http://ppdb-man-1-cianjur.com/assets/images/avatar5.png" class="gambar-bulat float-left rounded-circle"/></div></td>
                    <td><div class="ml-2"><b class="text-primary">Admin PPDB</b> membalas komentar anda
                    <br><span class="text-secondary" style="font-size:10px;"><?=$yang_lalu?></span></div></td>
                    <i class="float-right text-white mt-3 fa fa-circle" style="font-size:10px;"></i>
                  </tr>
                </table>
              </a>

              <a class="dropdown-item notifikasi" data-toggle="modal" data-target="#modalNotif" href="#">
                <table>
                  <tr>
                    <td><div class="mt-1"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="gambar-bulat float-left rounded-circle"/></div></td>
                    <td><div class="ml-2"><b>Muruyung and friend brother</b> menyukai komentar anda
                    <br><span class="text-info" style="font-size:10px; font-weight: bold;"><?=$yang_lalu?></span></div></td>
                    <i class="float-right text-info mt-3 fa fa-circle" style="font-size:10px;"></i>
                  </tr>
                </table>
              </a> -->

              <!-- <div class="dropdown-divider"></div> -->
              <!-- <a class="dropdown-item notifikasi" data-toggle="modal" data-target="#modalNotif" href="#">
                <table>
                  <tr>
                    <td><div class="mt-1"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="gambar-bulat float-left rounded-circle"/></div></td>
                    <td><div class="ml-2"><b>Muruyung</b> menyukai komentar anda
                    <br><span class="text-info" style="font-size:10px; font-weight: bold;"><?=$yang_lalu?></span></div></td>
                    <i class="float-right text-info mt-3 fa fa-circle" style="font-size:10px;"></i>
                  </tr>
                </table>
              </a>
            </div>
          </div>
        </div> -->
        <!-- End notifikasi -->
      </div>
    </div>

    <!-- Modal Notifikasi -->
    <!-- <div class="modal fade" id="modalNotif" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body overflow-comment bg-light">
            <div class="card card-body" style="margin-top:20px;">
              <div class="row" style="margin-bottom:20px;">
                <div class="col-md-12">
                  <div id="komentarNotif">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="gambar-bulat float-left rounded-circle"/>
                    <div class="float-left" style="margin-left:10px;">
                      <strong>Maniruzzaman Akash</strong>
                      <div class="text-secondary" style="font-size:10px;" id="tgl_notif"><?=$yang_lalu?></div>
                    </div>
                    <div class="float-right dropdown" <?php if($login == "false"){ echo "hidden"; } ?>>
                      <a href="#" class="dropdown-toggle" id="dropdown-a" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-a">
                        <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalEditKomentar">Edit</a>
                        <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalHapusKomentar">Hapus</a>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <p class="mt-2"></p>
                  <div align="center" class="mb-2">
                    <a href="#" data-toggle="modal" data-target="#modalGambarKomentar">
                      <img src="https://www.itl.cat/pics/b/28/284523_full-hd-wallpapers.jpg" alt="" class="img-fluid" style="display:block;">
                    </a>
                  </div>
                  <div>
                    <a class="float-right btn btn-outline-primary" data-toggle="modal" data-target="#modal<?php if($login == "true"){ echo 'Balasan'; }else{ echo 'Login'; }?>"> <i class="fa fa-reply"></i> Balas</a>
                    <a class="float-right btn btn-outline-danger" <?php if($login == "true"){ echo "onclick=''"; }else{ echo 'style="color:black;" data-toggle="modal" data-target="#modalLogin"'; } ?>> <i class="fa fa-heart"></i> Suka</a>
                      <a class="float-right btn text-black btn-link disabled">1 Menyukai</a>
                    </div>
                  </div>
                </div> -->
                <!-- Modal Balasan -->
                <!-- <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalBalasan" tabindex="-1" role="dialog" aria-labelledby="modalBalasanTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="modalBalasanTitle"><b>Balasan</b></h3>
                        <button type="button" id="close_balasan" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group pad">
                            <textarea class="form-control editor" rows="6" id="balasan" name="balasan" placeholder="Tulis Balasan..."></textarea>
                            <label for="foto" class="mt-4">Upload Gambar:</label>
                            <input type="file" class="form-control-file" name="gbr_balasan" id="gbr_balasan" onchange="cek_ukuran3()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
                          </div>
                        </form>
                      </div> -->
                      <!-- start button -->
                      <!-- <div class="modal-footer" id="kirim_balasan">
                        <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
                        <button type="button" class="btn btn-info float-right" onclick="kirim('','balasan')">Kirim</button>
                      </div>
                      <div class="modal-footer container" id="mengirim_balasan" style="display:none;">
                        <button type="button" class="btn btn-info float-right" disabled>
                          <div class="row justify-content-md-center">
                            <div class="col-md-7">
                              Mengirimkan
                            </div>
                            <div class="col-md-3">
                              <div class="spinner" role="status">
                                <div class="double-bounce1"></div>
                                <div class="double-bounce2"></div>
                              </div>
                            </div>
                          </div>
                        </button>
                      </div> -->
                      <!-- end button -->
                    <!-- </div>
                  </div>
                </div> -->
                <!-- End modal balasan -->
                <!-- Modal Edit komentar -->
                <!-- <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalEditKomentar" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="modalEditTitle"><b>Edit</b></h3>
                        <button type="button" id="close_edit_komentar" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <textarea class="form-control editor" rows="6" id="edit_komentar"></textarea>
                              <div class="mt-4">
                                <label for="foto" >Ganti Gambar:</label>
                                <input type="file" class="form-control-file" name="gbr_edit_komentar" id="gbr_edit_komentar" onchange="cek_ukuran3()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
                              </div>
                            </div>
                          </form>
                        </div> -->
                        <!-- start button -->
                        <!-- <div class="modal-footer" id="kirim_edit_komentar">
                          <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
                          <button type="button" class="btn btn-info float-right" onclick="kirim('','edit_komentar')">Kirim</button>
                        </div>
                        <div class="modal-footer container" id="mengirim_edit_komentar" style="display:none;">
                          <button type="button" class="btn btn-info float-right" disabled>
                            <div class="row justify-content-md-center">
                              <div class="col-md-7">
                                Mengirimkan
                              </div>
                              <div class="col-md-3">
                                <div class="spinner" role="status">
                                  <div class="double-bounce1"></div>
                                  <div class="double-bounce2"></div>
                                </div>
                              </div>
                            </div>
                          </button>
                        </div> -->
                        <!-- end button -->
                      <!-- </div>
                    </div>
                  </div> -->
                  <!-- End Modal edit komentar -->
                  <!-- Modal Hapus Komentar -->
                  <!-- <div class="modal fade" id="modalHapusKomentar" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="modalHapusTitle">Anda yakin ingin menghapusnya?</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <button type="button" class="btn btn-outline-primary float-right ml-2">Iya</button>
                          <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Tidak</button>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <!-- End Modal Hapus Komentar -->
                  <!-- Modal Gambar Komentar -->
                  <!-- <div class="modal fade" id="modalGambarKomentar" tabindex="-1" role="dialog" aria-labelledby="modalGambarTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="modalGambarTitle"><b>Lihat Gambar</b></h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" align="center">
                          <img src="https://www.itl.cat/pics/b/28/284523_full-hd-wallpapers.jpg" alt="" class="img-fluid" style="display:block;">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Keluar</button>
                          <a href="#" class="btn btn-info float-right" download="https://www.itl.cat/pics/b/28/284523_full-hd-wallpapers.jpg">Download</a>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <!-- End Modal Gambar Komentar -->
                  <!-- Start inner card -->
                  <!-- <div class="card card-inner bg-light mb-2">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div>
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="gambar-bulat float-left rounded-circle"/>
                            <div class="float-left" style="margin-left:10px;">
                              <strong>Maniruzzaman Akash</strong>
                              <div class="text-secondary" style="font-size:10px;">15 Minutes Ago</div>
                            </div>
                            <div class="float-right dropdown" <?php if($login == "false"){ echo "hidden"; } ?>>
                              <a href="#" class="dropdown-toggle" id="dropdown-a" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalEditBalasan">Edit</a>
                                <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalHapusBalasan">Hapus</a>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <p class="mt-2">Lorem Ipsum</p>
                          <div align="center" class="mb-2">
                            <a href="#" data-toggle="modal" data-target="#modalGambarBalasan">
                              <img src="https://majalahisma.com/wp-content/uploads/2020/03/MANSA.jpg" alt="" class="img-fluid" style="display:block;">
                            </a>
                          </div> -->
                          <!-- <a class="float-right btn btn-outline-primary" data-toggle="modal" data-target="#modal<?php if($login == "true"){ echo 'Balasan'; }else{ echo 'Login'; }?>"> <i class="fa fa-reply"></i> Balas</a> -->
                          <!-- <a class="float-right btn text-black btn-outline-danger" <?php if($login == "true"){ echo "onclick=''"; }else{ echo "style='color:black;' data-toggle='modal' data-target='#modalLogin'"; } ?>> <i class="fa fa-heart"></i> Suka</a>
                            <a class="float-right btn text-black btn-link disabled">1 Menyukai</a>
                          </div>
                        </div> -->
                        <!-- Modal Edit balasan -->
                        <!-- <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalEditBalasan" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" id="modalEditTitle"><b>Edit</b></h3>
                                <button type="button" id="close_edit_balasan" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="form-group">
                                    <textarea class="form-control editor" rows="6" id="edit_balasan">Lorem Ipsum</textarea>
                                    <div class="mt-4">
                                      <label for="foto" >Ganti Gambar:</label>
                                      <input type="file" class="form-control-file" name="gbr_edit_balasan" id="gbr_edit_balasan" onchange="cek_ukuran3()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
                                    </div>
                                  </div>
                                </form>
                              </div> -->
                              <!-- start button -->
                              <!-- <div class="modal-footer" id="kirim_edit_balasan">
                                <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
                                <button type="button" class="btn btn-info float-right" onclick="kirim('','edit_balasan')">Kirim</button>
                              </div>
                              <div class="modal-footer container" id="mengirim_edit_balasan" style="display:none;">
                                <button type="button" class="btn btn-info float-right" disabled>
                                  <div class="row justify-content-md-center">
                                    <div class="col-md-7">
                                      Mengirimkan
                                    </div>
                                    <div class="col-md-3">
                                      <div class="spinner" role="status">
                                        <div class="double-bounce1"></div>
                                        <div class="double-bounce2"></div>
                                      </div>
                                    </div>
                                  </div>
                                </button>
                              </div> -->
                              <!-- end button -->
                            <!-- </div>
                          </div>
                        </div> -->
                        <!-- End Modal edit balasan -->
                        <!-- Modal Hapus Balasan -->
                        <!-- <div class="modal fade" id="modalHapusBalasan" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" id="modalHapusTitle">Anda yakin ingin menghapusnya?</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <button type="button" class="btn btn-outline-primary float-right ml-2">Iya</button>
                                <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Tidak</button>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- End Modal Hapus Balasan -->
                        <!-- Modal Gambar Balasan -->
                        <!-- <div class="modal fade" id="modalGambarBalasan" tabindex="-1" role="dialog" aria-labelledby="modalGambarTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" id="modalGambarTitle"><b>Lihat Gambar</b></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" align="center">
                                <img src="https://majalahisma.com/wp-content/uploads/2020/03/MANSA.jpg" alt="" class="img-fluid" style="display:block;">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Keluar</button>
                                <a href="#" class="btn btn-info float-right" download="https://majalahisma.com/wp-content/uploads/2020/03/MANSA.jpg">Download</a>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- End Modal Gambar Balasan -->
                      <!-- </div>
                    </div> -->
                    <!-- End Inner Card -->
                    <!-- <div class="card-footer">
                      <a href="#" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#modalBalasan">Tulis Balasan</a>
                    </div>
                  </div> -->
                  <!-- End modal Body -->
                <!-- </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Keluar</button>
                </div>
              </div>
            </div>
          </div> -->
    <!-- End Modal Notifikasi -->

    <div class="card-body bg-light overflow-comment konten-utama">
      <!-- konten utama -->
      <div class="isi-konten-utama">
        <div class="card card-body kalo-kosong" style="margin-top:20px;display:block;">
          <div class="row" style="margin-bottom:20px;">
            <div class="col-md-12">
              <p>Belum ada komentar apapun</p>
            </div>
          </div>
        </div>
      </div>

            <!-- End modal Body -->
      <!-- .............. -->
      <!-- Loading -->
      <div class="mt-4 loading-bawah" style="display:block;" align="center">
        <table>
          <tr>
            <td>
              <div class="sk-circle">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
              </div>
            </td>
            <td>
              <div class="ml-3" style="font-size:25px;">
                Memuat...
              </div>
            </td>
          </tr>
        </table>
        
      </div>
      <!-- end loading -->

      <a href="#" class="float float-right" data-toggle="modal" data-target="#modal<?php if($login == "true"){ echo 'Komentar'; }else{ echo 'Login'; }?>">
        <i class="fa fa-plus my-float"></i>
      </a>
      <div class="label-container float-right">
        <div class="label-text">Tambahkan Komentar</div>
        <i class="fa fa-play label-arrow"></i>
      </div>
    </div> <!-- End Card Body -->
  </div>
</div>

<!-- Modal -->

<!-- Modal Komentar -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalKomentar" tabindex="-1" role="dialog" aria-labelledby="modalKomentarTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"id="modalKomentarTitle"><b>Komentar</b></h3>
        <button type="button" class="close" id="close_komentar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="tulis-komentar">Tulis Komentar:</label>
            <input type="text" class="editor" id="komentar" placeholder="Tulis Komentar...">
            <label for="foto-video" class="mt-4">Upload Gambar:</label>
            <input type="file" class="form-control-file" name="gbr_komentar" id="gbr_komentar" accept="image/jpeg, image/png" aria-describedby="fileHelp">
          </div>
        </form>
      </div>
      <div class="modal-footer" id="kirim_komentar">
        <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-info float-right" onclick="kirim('','komentar')">Kirim</button>
      </div>
      <div class="modal-footer container" id="mengirim_komentar" style="display:none;">
        <button type="button" class="btn btn-info float-right" disabled>
          <div class="row justify-content-md-center">
            <div class="col-md-7">
              Mengirimkan
            </div>
            <div class="col-md-3">
              <div class="spinner" role="status">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
              </div>
            </div>
          </div>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modalLoginTitle"><b>Pemberitahuan</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda harus melakukan login terlebih dahulu.</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-outline-danger float-right" data-dismiss="modal" href="#" >Batalkan</a>
        <a class="btn btn-info float-right" href="<?=base_url('C_login')?>" >Login</a>
      </div>
    </div>
  </div>
</div>

<!-- <script src="https://cdn.tiny.cloud/1/oxj9kcjafza4iir4lhpytzo8csn0qr7asahxtohtitxa37b2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<script src="<?=base_url();?>assets/tinymce/tinymce.min.js" charset="utf-8"></script>
<script src="<?=base_url();?>assets/tinymce/jquery.tinymce.min.js" charset="utf-8"></script>

<script>
tinymce.init({
  selector: 'input.editor',
  toolbar:false,
  height:"350",
  menubar:false,
  statusbar:false
});
function kirim(id,jenis){
  var balasan = tinyMCE.get(jenis+id).getContent();
  var gbr_balasan = document.getElementById('gbr_'+jenis+id);
  // console.log(tinyMCE.get(jenis+id).getContent());
  console.log(gbr_balasan.files[0]);
  if (balasan != "" || gbr_balasan.value != ""){
    // var kirim = document.getElementById('kirim_'+jenis+id).style;
    // var mengirim = document.getElementById('mengirim_'+jenis+id).style;
    // var close = document.getElementById('close_'+jenis+id);
    // kirim.display = "none";
    // mengirim.display = "block";
    // gbr_balasan.disabled = true;
    // balasan.disabled = true;
    // close.disabled = true;
    // tinyMCE.get('textarea.editor').getBody().setAttribute('contenteditable', false);
    var form_data = new FormData();
    form_data.append("file", gbr_balasan.files[0]);
    form_data.append("id", id);
    form_data.append(jenis, balasan);
  
    $.ajax({
      type:"POST",
      url:"<?=base_url('C_komentar')?>/set_"+jenis,
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function(){
        $('#kirim_'+jenis+id).css('display','none');
        $('#mengirim_'+jenis+id).css('display','block');
        $('#close_'+jenis+id).prop('disabled',true);
        $('#'+jenis+id).prop('disabled',true);
        $('#gbr_'+jenis+id).prop('disabled',true);
      },
      success: function(data){
        // alert(data);
        // console.log(data);
        location.reload();
      }
    });
  }else{
    alert("Kolom balasan kosong.");
  }
}

function suka(id,jenis){
  var tbl_suka = document.getElementById("suka_"+jenis+id);
  var jml_suka = document.getElementById("jml_suka_"+jenis+id).style;
  var angka_suka = parseInt(document.getElementById("angka_suka_"+jenis+id).innerHTML);
  if (angka_suka == 0 || jml_suka.display == "none"){
    jml_suka.display = "block";
  }
  angka_suka++;
  document.getElementById("angka_suka_"+jenis+id).innerHTML = angka_suka;

  tbl_suka.classList.add("btn-danger");
  tbl_suka.classList.add("text-white");
  tbl_suka.setAttribute('onclick', 'tidak_suka('+id+',"'+jenis+'")');

  tbl_suka.classList.remove("btn-outline-danger");
  tbl_suka.classList.remove("text-black");

  $.ajax({
    type:"GET",
    url:"<?=base_url('C_komentar')?>/set_suka",
    data: {
      'id':id,
      'jenis':jenis
    },
    success: function(data){
      // alert('Sukses');
    }
  });

  $.ajax({
    type:"GET",
    url:"<?=base_url('C_komentar')?>/set_notif",
    data: {
      'id':id,
      'jenis':jenis,
      'notif':'suka'
    },
    success: function(data){
      // alert('Sukses');
    }
  });
}

function tidak_suka(id,jenis){
  var tbl_suka = document.getElementById("suka_"+jenis+id);
  var jml_suka = document.getElementById("jml_suka_"+jenis+id).style;
  var angka_suka = parseInt(document.getElementById("angka_suka_"+jenis+id).innerHTML);
  if (angka_suka == 1){
    jml_suka.display = "none";
    angka_suka--;
    document.getElementById("angka_suka_"+jenis+id).innerHTML = angka_suka;
  }else{
    angka_suka--;
    document.getElementById("angka_suka_"+jenis+id).innerHTML = angka_suka;
  }

  tbl_suka.classList.remove("btn-danger");
  tbl_suka.classList.remove("text-white");
  tbl_suka.setAttribute('onclick', 'suka('+id+',"'+jenis+'")');

  tbl_suka.classList.add("btn-outline-danger");
  tbl_suka.classList.add("text-black");

  $.ajax({
    type:"GET",
    url:"<?=base_url('C_komentar')?>/del_suka",
    data: {
      'id':id,
      'jenis':jenis
    },
    success: function(data){
      // alert('Sukses');
    }
  });
  $.ajax({
    type:"GET",
    url:"<?=base_url('C_komentar')?>/del_notif",
    data: {
      'id':id,
      'jenis':jenis,
      'notif':'suka'
    },
    success: function(data){
      // alert('Sukses');
    }
  });
}
</script>
