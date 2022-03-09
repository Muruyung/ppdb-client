<?php
/******************************************
* Filename    : V_pemberitahuan.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-21
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Konten login
*
******************************************/
if($isi == 'true'){
?>
<script type="text/javascript">
  // $(document).ready(function(){
  //   $.ajax({
  //     type: "GET",
  //     url : "<?=base_url('C_pemberitahuan')?>"+"/get_siswa_limit";
  //     data: {
  //       'limit' : 20,
  //       'offset': 0,
  //       'login' : '<?=$login?>'
  //     },
  //     success: function(data) {
  //
  //     }
  //   });
  // });
</script>

<style media="screen">
.project-tab {
  /* padding: 10%; */
  padding-top: 100px;
  padding-bottom: 5%;
  /* margin-top: -8%; */
}
.project-tab #tabs{
  background: #007b5e;
  color: #eee;
}
.project-tab #tabs h6.section-title{
  color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
  color: #0062cc;
  background-color: transparent;
  border-color: transparent transparent #f3f3f3;
  border-bottom: 3px solid !important;
  font-size: 16px;
  font-weight: bold;
}
.project-tab .nav-link {
  border: 1px solid transparent;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
  color: #0062cc;
  font-size: 16px;
  font-weight: 600;
}
.project-tab .nav-link:hover {
  border: none;
}
.project-tab thead{
  background: #f3f3f3;
  color: #333;
}
.project-tab a{
  text-decoration: none;
  color: #333;
  font-weight: 600;
}
.filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}

</style>
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<section id="tabs" class="project-tab">
  <div class="container bg-light">
    <div class="row">
      <div class="col-md-12">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Pendaftar</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Statistik Pendaftar</a>
          </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active filterable" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="panel-heading">
                <div class="pull-left">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
              <thead>
                <tr class="filters">
                  <th><input type="text" class="form-control" placeholder="Nama Peserta" disabled></th>
                  <th><input type="text" class="form-control" placeholder="Asal Sekolah" disabled></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                foreach ($seleksi as $_nilai) {
                  ?>
                  <tr style="<?php if($login == 'true' && isset($id_user_login) && $_nilai['id_user'] == decrypt_url($id_user_login)){ echo "background-color:yellow;";} ?>">
                    <td><?=$_nilai['nama']?></td>
                    <td><?=$_nilai['sekolah']?></td>
                  </tr><?php
                }
                ?>
              </tbody>
            </table>
          </div> <!--End of div tab 1-->

          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="form-group col-sm-3">
              <label for="">Filter</label>
              <select class="form-control" id="filter_statistik" onchange="filter_statistik()">
                <option value="agama">Agama</option>
                <option value="gender">Jenis Kelamin</option>
                <option value="pend">Pendidikan Orang Tua</option>
                <option value="kerja">Pekerjaan Orang Tua</option>
                <option value="asal">Asal Sekolah</option>
                <option value="jurusan">Jurusan</option>
                <option value="jalur">Jalur Pendaftaran</option>
                <option value="usia">Usia</option>
              </select>
            </div>
            <table class="table" cellspacing="0">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody id="agama" class="">
                <?php
                foreach ($jum_agama as $index=>$_agama) {
                  ?>
                  <tr>
                    <td><?=$index?></td>
                    <td><?=$_agama?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
              <tbody id="gender" style="display:none;">
                <?php
                foreach ($jum_gender as $index=>$_gender) {
                  ?>
                  <tr>
                    <td><?=$index?></td>
                    <td><?=$_gender?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
              <tbody id="pend" style="display:none;">
                <?php
                foreach ($jum_pend as $index=>$_pend) {
                  ?>
                  <tr>
                    <td><?=$index?></td>
                    <td><?=$_pend?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
              <tbody id="kerja" style="display:none;">
                <?php
                foreach ($jum_kerja as $index=>$_kerja) {
                  ?>
                  <tr>
                    <td><?=$index?></td>
                    <td><?=$_kerja?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
              <tbody id="asal" style="display:none;">
                <?php
                foreach ($jum_sekolah as $index=>$_sekolah) {
                  ?>
                  <tr>
                    <td><?=$index?></td>
                    <td><?=$_sekolah?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
              <tbody id="jurusan" style="display:none;">
                <?php
                foreach ($jum_jurusan as $index=>$_jurusan) {
                  ?>
                  <tr>
                    <td><?=$index?></td>
                    <td><?=$_jurusan?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
              <tbody id="jalur" style="display:none;">
                <?php
                foreach ($jum_jalur as $index=>$_jalur) {
                  ?>
                  <tr>
                    <td><?=$index?></td>
                    <td><?=$_jalur?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
              <tbody id="usia" style="display:none;">
                <?php
                foreach ($jum_usia as $index=>$_usia) {
                  ?>
                  <tr>
                    <td><?=$index?> tahun</td>
                    <td><?=$_usia?></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
            </table>
          </div> <!-- End of div tab 2-->

        </div> <!-- End of div content -->
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  function filter_statistik(){
    var value = document.getElementById('filter_statistik').value;
    if(value == 'agama'){
      document.getElementById('agama').style = "";
      document.getElementById('gender').style.display ="none";
      document.getElementById('pend').style.display   ="none";
      document.getElementById('kerja').style.display  ="none";
      document.getElementById('asal').style.display   ="none";
      document.getElementById('usia').style.display   ="none";
      document.getElementById('jurusan').style.display="none";
      document.getElementById('jalur').style.display  ="none";
    }
    if(value == 'gender'){
      document.getElementById('agama').style.display  ="none";
      document.getElementById('gender').style ="";
      document.getElementById('pend').style.display   ="none";
      document.getElementById('kerja').style.display  ="none";
      document.getElementById('asal').style.display   ="none";
      document.getElementById('usia').style.display   ="none";
      document.getElementById('jurusan').style.display="none";
      document.getElementById('jalur').style.display  ="none";
    }
    if(value == 'pend'){
      document.getElementById('agama').style.display  ="none";
      document.getElementById('gender').style.display ="none";
      document.getElementById('pend').style ="";
      document.getElementById('kerja').style.display  ="none";
      document.getElementById('asal').style.display   ="none";
      document.getElementById('usia').style.display   ="none";
      document.getElementById('jurusan').style.display="none";
      document.getElementById('jalur').style.display  ="none";
    }
    if(value == 'kerja'){
      document.getElementById('agama').style.display  ="none";
      document.getElementById('gender').style.display ="none";
      document.getElementById('pend').style.display   ="none";
      document.getElementById('kerja').style = "";
      document.getElementById('asal').style.display   ="none";
      document.getElementById('usia').style.display   ="none";
      document.getElementById('jurusan').style.display="none";
      document.getElementById('jalur').style.display  ="none";
    }
    if(value == 'asal'){
      document.getElementById('agama').style.display  ="none";
      document.getElementById('gender').style.display ="none";
      document.getElementById('pend').style.display   ="none";
      document.getElementById('kerja').style.display  ="none";
      document.getElementById('asal').style = "";
      document.getElementById('usia').style.display   ="none";
      document.getElementById('jurusan').style.display="none";
      document.getElementById('jalur').style.display  ="none";
    }
    if(value == 'usia'){
      document.getElementById('agama').style.display  ="none";
      document.getElementById('gender').style.display ="none";
      document.getElementById('pend').style.display   ="none";
      document.getElementById('kerja').style.display  ="none";
      document.getElementById('asal').style.display   ="none";
      document.getElementById('usia').style = "";
      document.getElementById('jurusan').style.display="none";
      document.getElementById('jalur').style.display  ="none";
    }
    if(value == 'jurusan'){
      document.getElementById('agama').style.display  ="none";
      document.getElementById('gender').style.display ="none";
      document.getElementById('pend').style.display   ="none";
      document.getElementById('kerja').style.display  ="none";
      document.getElementById('asal').style.display   ="none";
      document.getElementById('usia').style.display   ="none";
      document.getElementById('jurusan').style = "";
      document.getElementById('jalur').style.display  ="none";
    }
    if(value == 'jalur'){
      document.getElementById('agama').style.display  ="none";
      document.getElementById('gender').style.display ="none";
      document.getElementById('pend').style.display   ="none";
      document.getElementById('kerja').style.display  ="none";
      document.getElementById('asal').style.display   ="none";
      document.getElementById('usia').style.display   ="none";
      document.getElementById('jurusan').style.display="none";
      document.getElementById('jalur').style = "";
    }
  }
$(document).ready(function(){
  $('.filterable .btn-filter').click(function(){
      var $panel = $(this).parents('.filterable'),
      $filters = $panel.find('.filters input'),
      $tbody = $panel.find('.table tbody');
      if ($filters.prop('disabled') == true) {
          $filters.prop('disabled', false);
          $filters.first().focus();
      } else {
          $filters.val('').prop('disabled', true);
          $tbody.find('.no-result').remove();
          $tbody.find('tr').show();
      }
  });

  $('.filterable .filters input').keyup(function(e){
      /* Ignore tab key */
      var code = e.keyCode || e.which;
      if (code == '9') return;
      /* Useful DOM data and selectors */
      var $input = $(this),
      inputContent = $input.val().toLowerCase(),
      $panel = $input.parents('.filterable'),
      column = $panel.find('.filters th').index($input.parents('th')),
      $table = $panel.find('.table'),
      $rows = $table.find('tbody tr');
      /* Dirtiest filter function ever ;) */
      var $filteredRows = $rows.filter(function(){
          var value = $(this).find('td').eq(column).text().toLowerCase();
          return value.indexOf(inputContent) === -1;
      });
      /* Clean previous no-result if exist */
      $table.find('tbody .no-result').remove();
      /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
      $rows.show();
      $filteredRows.hide();
      /* Prepend no-result row if all rows are filtered */
      if ($filteredRows.length === $rows.length) {
          $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
      }
  });
});
</script>
<?php
}else{
  ?>
  <div class="container bg-white" style="margin-top:100px;margin-bottom:50px;">
    <div class="row justify-content-md-center">
      <div class="col-sm-8">
        <h2>MAAF DATA PESERTA PPDB ONLINE <?=Date("Y")?>/<?=Date("Y")+1?> BELUM TERSEDIA</h2>
      </div>
    </div>
  </div>
  <?php
}
 ?>
