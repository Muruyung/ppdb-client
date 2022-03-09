<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- Include the above in your HEAD tag ---------->
<!--To Work with icons-->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style media="screen">
#overflow-comment{
  height: 85vh;
  overflow: scroll;
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
</style>

<div class="navbar container" style="margin-top:100px; margin-bottom:50px;">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="card" id="overflow-comment">
    <div class="card-body bg-info">
      <?php
      for ($i=0; $i < 25; $i++) {
        ?>
        <div class="card card-body" style="margin-top:20px;">
          <div class="row" style="margin-bottom:20px;">
            <div class="col-md-12">
              <div id="komentar<?=$i?>">
                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="gambar-bulat float-left rounded-circle"/>
                <div class="float-left" style="margin-left:10px;">
                  <strong>Maniruzzaman Akash</strong>
                  <div class="text-secondary" style="font-size:10px;" id="tgl"><?=$yang_lalu?></div>
                </div>
                <div class="float-right dropdown" <?php if($login == "false"){ echo "hidden"; } ?>>
                  <a href="#" class="dropdown-toggle" id="dropdown-a" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-a">
                    <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalEditKomentar<?=$i?>">Edit</a>
                    <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalHapusKomentar<?=$i?>">Hapus</a>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Proin eget lacus vel arcu interdum faucibus in ac est. Aenean fringilla
                nec diam id iaculis. Sed sollicitudin sapien risus, quis tristique est lacinia eget.
                Pellentesque laoreet bibendum augue, eget pretium erat luctus non. Nulla facilisi.
                Donec bibendum consequat nibh ut ullamcorper. Mauris tempor, est eu pretium consectetur,
                nisl erat aliquam orci, sed vehicula justo odio commodo quam. Ut fermentum ipsum in erat
                luctus varius. Fusce dignissim, velit nec pulvinar blandit, nunc turpis condimentum justo,
                eu malesuada eros nulla et tortor. Cras cursus ac orci eu maximus. Aliquam erat volutpat.
                Duis at lacus condimentum, tempus felis quis, suscipit velit. Donec accumsan tempus dignissim.
                Morbi rhoncus interdum eros id finibus. Integer blandit iaculis velit at malesuada.
                Maecenas dui leo, tempus non rhoncus ut, blandit nec purus.</p>
              <div align="center" class="mb-2">
                <a href="#" data-toggle="modal" data-target="#modalGambarKomentar<?=$i?>">
                  <img src="https://www.itl.cat/pics/b/28/284523_full-hd-wallpapers.jpg" alt="" class="img-fluid" style="display:block;">
                </a>
              </div>
              <div>
                <a class="float-right btn btn-outline-primary" data-toggle="modal" data-target="#modal<?php if($login == "true"){ echo 'Balasan'.$i; }else{ echo 'Login'; }?>"> <i class="fa fa-reply"></i> Balas</a>
                <a class="float-right btn btn-outline-danger" <?php if($login == "true"){ echo "onclick=''"; }else{ echo 'style="color:black;" data-toggle="modal" data-target="#modalLogin"'; } ?>> <i class="fa fa-heart"></i> Suka</a>
                <a class="float-right btn text-black btn-link disabled">1 Menyukai</a>
              </div>
            </div>
          </div>
          <!-- Modal Balasan -->
          <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalBalasan<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="modalBalasanTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="modalBalasanTitle"><b>Balasan</b></h3>
                  <button type="button" id="close_balasan<?=$i?>" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group pad">
                      <textarea class="form-control" rows="6" id="balasan<?=$i?>" name="balasan<?=$i?>" placeholder="Tulis Balasan..."></textarea>
                      <label for="foto" class="mt-4">Upload Gambar:</label>
                      <input type="file" class="form-control-file" name="gbr_balasan<?=$i?>" id="gbr_balasan<?=$i?>" onchange="cek_ukuran3()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
                    </div>
                  </form>
                </div>
                <!-- start button -->
                <div class="modal-footer" id="kirim_balasan<?=$i?>">
                  <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
                  <button type="button" class="btn btn-info float-right" onclick="kirim(<?=$i?>,'balasan')">Kirim</button>
                </div>
                <div class="modal-footer container" id="mengirim_balasan<?=$i?>" style="display:none;">
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
                <!-- end button -->
              </div>
            </div>
          </div>
          <!-- End modal balasan -->
          <!-- Modal Edit komentar -->
          <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalEditKomentar<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="modalEditTitle"><b>Edit</b></h3>
                  <button type="button" id="close_edit_komentar<?=$i?>" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <textarea class="form-control" rows="6" id="edit_komentar<?=$i?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Proin eget lacus vel arcu interdum faucibus in ac est. Aenean fringilla
                        nec diam id iaculis. Sed sollicitudin sapien risus, quis tristique est lacinia eget.
                        Pellentesque laoreet bibendum augue, eget pretium erat luctus non. Nulla facilisi.
                        Donec bibendum consequat nibh ut ullamcorper. Mauris tempor, est eu pretium consectetur,
                        nisl erat aliquam orci, sed vehicula justo odio commodo quam. Ut fermentum ipsum in erat
                        luctus varius. Fusce dignissim, velit nec pulvinar blandit, nunc turpis condimentum justo,
                        eu malesuada eros nulla et tortor. Cras cursus ac orci eu maximus. Aliquam erat volutpat.
                        Duis at lacus condimentum, tempus felis quis, suscipit velit. Donec accumsan tempus dignissim.
                        Morbi rhoncus interdum eros id finibus. Integer blandit iaculis velit at malesuada.
                        Maecenas dui leo, tempus non rhoncus ut, blandit nec purus.</textarea>
                      <div class="mt-4">
                        <label for="foto" >Ganti Gambar:</label>
                        <input type="file" class="form-control-file" name="gbr_edit_komentar<?=$i?>" id="gbr_edit_komentar<?=$i?>" onchange="cek_ukuran3()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
                      </div>
                    </div>
                  </form>
                </div>
                <!-- start button -->
                <div class="modal-footer" id="kirim_edit_komentar<?=$i?>">
                  <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
                  <button type="button" class="btn btn-info float-right" onclick="kirim(<?=$i?>,'edit_komentar')">Kirim</button>
                </div>
                <div class="modal-footer container" id="mengirim_edit_komentar<?=$i?>" style="display:none;">
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
                <!-- end button -->
              </div>
            </div>
          </div>
          <!-- End Modal edit komentar -->
          <!-- Modal Hapus Komentar -->
          <div class="modal fade" id="modalHapusKomentar<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle" aria-hidden="true">
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
          </div>
          <!-- End Modal Hapus Komentar -->
          <!-- Modal Gambar Komentar -->
          <div class="modal fade" id="modalGambarKomentar<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="modalGambarTitle" aria-hidden="true">
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
          </div>
          <!-- End Modal Gambar Komentar -->
          <!-- Start inner card -->
          <div class="card card-inner bg-light mb-2">
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
                        <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalEditBalasan<?=$i?>">Edit</a>
                        <a class="dropdown-item" data-toggle="modal" href="#" data-target="#modalHapusBalasan<?=$i?>">Hapus</a>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <p class="mt-2">Lorem Ipsum</p>
                  <div align="center" class="mb-2">
                    <a href="#" data-toggle="modal" data-target="#modalGambarBalasan<?=$i?>">
                      <img src="https://majalahisma.com/wp-content/uploads/2020/03/MANSA.jpg" alt="" class="img-fluid" style="display:block;">
                    </a>
                  </div>
                  <!-- <a class="float-right btn btn-outline-primary" data-toggle="modal" data-target="#modal<?php if($login == "true"){ echo 'Balasan'; }else{ echo 'Login'; }?>"> <i class="fa fa-reply"></i> Balas</a> -->
                  <a class="float-right btn text-black btn-outline-danger" <?php if($login == "true"){ echo "onclick=''"; }else{ echo "style='color:black;' data-toggle='modal' data-target='#modalLogin'"; } ?>> <i class="fa fa-heart"></i> Suka</a>
                  <a class="float-right btn text-black btn-link disabled">1 Menyukai</a>
                </div>
              </div>
              <!-- Modal Edit balasan -->
              <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalEditBalasan<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="modalEditTitle"><b>Edit</b></h3>
                      <button type="button" id="close_edit_balasan<?=$i?>" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <textarea class="form-control" rows="6" id="edit_balasan<?=$i?>">Lorem Ipsum</textarea>
                          <div class="mt-4">
                            <label for="foto" >Ganti Gambar:</label>
                            <input type="file" class="form-control-file" name="gbr_edit_balasan<?=$i?>" id="gbr_edit_balasan<?=$i?>" onchange="cek_ukuran3()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- start button -->
                    <div class="modal-footer" id="kirim_edit_balasan<?=$i?>">
                      <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
                      <button type="button" class="btn btn-info float-right" onclick="kirim(<?=$i?>,'edit_balasan')">Kirim</button>
                    </div>
                    <div class="modal-footer container" id="mengirim_edit_balasan<?=$i?>" style="display:none;">
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
                    <!-- end button -->
                  </div>
                </div>
              </div>
              <!-- End Modal edit balasan -->
              <!-- Modal Hapus Balasan -->
              <div class="modal fade" id="modalHapusBalasan<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle" aria-hidden="true">
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
              </div>
              <!-- End Modal Hapus Balasan -->
              <!-- Modal Gambar Balasan -->
              <div class="modal fade" id="modalGambarBalasan<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="modalGambarTitle" aria-hidden="true">
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
              </div>
              <!-- End Modal Gambar Balasan -->
            </div>
          </div>
          <!-- End Inner Card -->
          <div class="card-footer">
            <a href="#" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#modalBalasan<?=$i?>">Tulis Balasan</a>
          </div>
        </div>
        <!-- End modal Body -->
        <?php
      }
       ?>

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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" rows="6" id="komentar" placeholder="Tulis Komentar..."></textarea>
            <label for="foto-video" class="mt-4">Upload Gambar:</label>
            <input type="file" class="form-control-file" name="gbr_komentar" id="gbr_komentar" onchange="cek_ukuran3()" accept="image/jpeg, image/png" aria-describedby="fileHelp">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-info float-right">Kirim</button>
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
<!-- <script src="<?=base_url();?>assets/tinymce/tinymce.min.js" charset="utf-8"></script>
<script src="<?=base_url();?>assets/tinymce/jquery.tinymce.min.js" charset="utf-8"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>

<script>
// tinymce.init({
//   selector: 'textarea.editor',
//   toolbar:false,
//   menubar:false
// });
function kirim(id,jenis){
  var balasan = document.getElementById(jenis+id);
  var gbr_balasan = document.getElementById('gbr_'+jenis+id);
  if (balasan.value != "" || gbr_balasan.value != ""){
    var kirim = document.getElementById('kirim_'+jenis+id).style;
    var mengirim = document.getElementById('mengirim_'+jenis+id).style;
    var close = document.getElementById('close_'+jenis+id);
    kirim.display = "none";
    mengirim.display = "block";
    gbr_balasan.disabled = true;
    balasan.disabled = true;
    close.disabled = true;

    location.reload();
  }else{
    alert("Kolom balasan kosong.");
  }
}
</script>
