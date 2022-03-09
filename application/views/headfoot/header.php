<?php
/******************************************
* Filename    : header.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-11
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Header umum website
*
******************************************/
  $date_ex = date_create("2021-07-07");
  $date_now = date_create(date("Y-m-d"));
  $diff = date_diff($date_ex, $date_now);
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

     <!-- Site Metas -->
    <title>PPDB Online MAN 1 Cianjur-<?=$halaman?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- datepicker css -->
    <link href="<?=base_url();?>assets/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <!-- <link href="<?=base_url();?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet" /> -->
    <link href="<?=base_url();?>assets/css/bootstrap-datepicker3.standalone.css" rel="stylesheet" />
    <!-- <link href="<?=base_url();?>assets/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" /> -->

    <!--To Work with icons-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?=base_url();?>assets/images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/custom.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="<?=base_url();?>assets/summernote/summernote-bs4.css">

    <style media="screen">
    .sbl-half-circle-spin {
      height: 48px;
      width: 48px;
      color: #5a5a5a;
      display: inline-block;
      position: relative;
      border: 1px solid;
      border-radius: 50%;
      animation: animeCircleSpin 4s ease-in-out infinite reverse;
    }
    .sbl-half-circle-spin::after {
      content: '';
      border: 4px solid;
      position: absolute;
      left: 10px;
      top: 4px;
      border-radius: inherit;
    }
    .sbl-half-circle-spin div {
      height: 50%;
      width: 50%;
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      top: 0;
      margin: auto;
      border: 1px solid;
      border-radius: 50%;
      animation: animeCircleSpin 3s ease-in-out infinite;
    }
    .sbl-half-circle-spin div::before {
      height: 0;
      width: 0;
      content: '';
      border-radius: 50%;
      display: block;
    }
    .sbl-half-circle-spin div::before {
      border: 12px solid;
      border-right-color: transparent;
      border-bottom-color: transparent;
      transform: rotate(-45deg);
    }

    @keyframes animeCircleSpin {
      0% {
        transform: rotate(0);
      }
      50% {
        transform: rotate(720deg);
      }
      100% {
        transform: rotate(0);
      }
    }

    .spinner {
    width: 25px;
    height: 25px;

    position: relative;
    /* margin: 10px auto; */
  }

  .double-bounce1, .double-bounce2 {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #333;
    opacity: 0.6;
    position: absolute;
    top: 0;
    left: 0;

    -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
    animation: sk-bounce 2.0s infinite ease-in-out;
  }

  .double-bounce2 {
    -webkit-animation-delay: -1.0s;
    animation-delay: -1.0s;
  }

  @-webkit-keyframes sk-bounce {
    0%, 100% { -webkit-transform: scale(0.0) }
    50% { -webkit-transform: scale(1.0) }
  }

  @keyframes sk-bounce {
    0%, 100% {
      transform: scale(0.0);
      -webkit-transform: scale(0.0);
      } 50% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
      }
    }

    /* Spinner bawah */
    .sk-circle {
      /* margin: 100px auto; */
      width: 40px;
      height: 40px;
      position: relative;
    }
    .sk-circle .sk-child {
      width: 100%;
      height: 100%;
      position: absolute;
      left: 0;
      top: 0;
    }
    .sk-circle .sk-child:before {
      content: '';
      display: block;
      margin: 0 auto;
      width: 15%;
      height: 15%;
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
              animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
    }
    .sk-circle .sk-circle2 {
      -webkit-transform: rotate(30deg);
          -ms-transform: rotate(30deg);
              transform: rotate(30deg); }
    .sk-circle .sk-circle3 {
      -webkit-transform: rotate(60deg);
          -ms-transform: rotate(60deg);
              transform: rotate(60deg); }
    .sk-circle .sk-circle4 {
      -webkit-transform: rotate(90deg);
          -ms-transform: rotate(90deg);
              transform: rotate(90deg); }
    .sk-circle .sk-circle5 {
      -webkit-transform: rotate(120deg);
          -ms-transform: rotate(120deg);
              transform: rotate(120deg); }
    .sk-circle .sk-circle6 {
      -webkit-transform: rotate(150deg);
          -ms-transform: rotate(150deg);
              transform: rotate(150deg); }
    .sk-circle .sk-circle7 {
      -webkit-transform: rotate(180deg);
          -ms-transform: rotate(180deg);
              transform: rotate(180deg); }
    .sk-circle .sk-circle8 {
      -webkit-transform: rotate(210deg);
          -ms-transform: rotate(210deg);
              transform: rotate(210deg); }
    .sk-circle .sk-circle9 {
      -webkit-transform: rotate(240deg);
          -ms-transform: rotate(240deg);
              transform: rotate(240deg); }
    .sk-circle .sk-circle10 {
      -webkit-transform: rotate(270deg);
          -ms-transform: rotate(270deg);
              transform: rotate(270deg); }
    .sk-circle .sk-circle11 {
      -webkit-transform: rotate(300deg);
          -ms-transform: rotate(300deg);
              transform: rotate(300deg); }
    .sk-circle .sk-circle12 {
      -webkit-transform: rotate(330deg);
          -ms-transform: rotate(330deg);
              transform: rotate(330deg); }
    .sk-circle .sk-circle2:before {
      -webkit-animation-delay: -1.1s;
              animation-delay: -1.1s; }
    .sk-circle .sk-circle3:before {
      -webkit-animation-delay: -1s;
              animation-delay: -1s; }
    .sk-circle .sk-circle4:before {
      -webkit-animation-delay: -0.9s;
              animation-delay: -0.9s; }
    .sk-circle .sk-circle5:before {
      -webkit-animation-delay: -0.8s;
              animation-delay: -0.8s; }
    .sk-circle .sk-circle6:before {
      -webkit-animation-delay: -0.7s;
              animation-delay: -0.7s; }
    .sk-circle .sk-circle7:before {
      -webkit-animation-delay: -0.6s;
              animation-delay: -0.6s; }
    .sk-circle .sk-circle8:before {
      -webkit-animation-delay: -0.5s;
              animation-delay: -0.5s; }
    .sk-circle .sk-circle9:before {
      -webkit-animation-delay: -0.4s;
              animation-delay: -0.4s; }
    .sk-circle .sk-circle10:before {
      -webkit-animation-delay: -0.3s;
              animation-delay: -0.3s; }
    .sk-circle .sk-circle11:before {
      -webkit-animation-delay: -0.2s;
              animation-delay: -0.2s; }
    .sk-circle .sk-circle12:before {
      -webkit-animation-delay: -0.1s;
              animation-delay: -0.1s; }

    @-webkit-keyframes sk-circleBounceDelay {
      0%, 80%, 100% {
        -webkit-transform: scale(0);
                transform: scale(0);
      } 40% {
        -webkit-transform: scale(1);
                transform: scale(1);
      }
    }

    @keyframes sk-circleBounceDelay {
      0%, 80%, 100% {
        -webkit-transform: scale(0);
                transform: scale(0);
      } 40% {
        -webkit-transform: scale(1);
                transform: scale(1);
      }
    }
    </style>
  <!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->

	<script src="<?=base_url();?>assets/js/modernizr.custom.79639.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="seo_version bg-dark">

	<!-- LOADER -->
	<div id="preloader">
		<div class="loader-wrapper">
			<div class="loader-new">
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
			</div>
			<div class="text">LOADING...</div>
		</div>
	</div>
	<!-- END LOADER -->

	<!-- Start header -->
	<header class="top-navbar fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(28, 104, 117);">
			<div class="container">
				<a class="navbar-brand" href="<?=base_url();?>">
					<img width="35px" src="<?=base_url();?>assets/images/logo_man.png" alt="" />
          <span style="margin-left:5px; color:white;">
            MAN 1 Cianjur
          </span>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-seo" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-seo">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?php if ($halaman=='beranda'){echo "active";} ?>"><a class="nav-link" href="<?php if ($halaman=='beranda'){echo "#";}else{echo base_url();} ?>">Beranda</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendaftaran</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="<?php if ($halaman=='daftar'){echo "#";}else{echo base_url('C_daftar');} ?>" <?php if ($diff->format("%R%a") >= 0){ echo 'hidden'; }?>>Pendaftaran Siswa Baru</a>
								<a class="dropdown-item" href="<?php if ($halaman=='cara_daftar'){echo "#";}else{echo base_url('C_cara_daftar');} ?>">Cara Pendaftaran</a>
								<a onclick="maintenance()" class="dropdown-item" href="#">Cara Edit Data dan Lihat Pengumuman</a>
								<a onclick="maintenance()" class="dropdown-item" href="#">Prosedur Pendaftaran</a>
							</div>
						</li>
            <li class="nav-item <?php if ($halaman=='pemberitahuan'){echo 'active';} ?>"><a class="nav-link" href="<?php if ($halaman=='pemberitahuan'){echo "#";}else{echo base_url('C_pemberitahuan');} ?>">Pemberitahuan</a></li>
            <!-- <li class="nav-item <?php if ($halaman=='komentar'){echo 'active';} ?>"><a class="nav-link" href="<?php if ($halaman=='komentar'){echo "#";}else{echo base_url('C_komentar');} ?>">Komentar</a></li> -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sosial Media</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="<?php if ($halaman=='komentar'){echo "#";}else{echo base_url('C_komentar');} ?>">Kolom Komentar</a>
								<a class="dropdown-item" href="https://obrolan.man1cianjur.com/">Obrolan</a>
								<a class="dropdown-item" href="https://sosial.man1cianjur.com/">Sosmed ManSatu</a>
							</div>
						</li>
            <li class="nav-item <?php if ($halaman=='login'){echo 'active';} ?>"><a class="nav-link" href="<?php if ($halaman=='Login'){echo "#";}else{echo base_url('C_login');} ?>">Masuk</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
