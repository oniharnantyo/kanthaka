<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href={{ url("/images/favicon/apple-touch-icon.png") }}>
  <link rel="icon" type="image/png" sizes="32x32" href={{ url("/images/favicon/favicon-32x32.png") }}>
  <link rel="icon" type="image/png" sizes="16x16" href={{ url("/images/favicon/favicon-16x16.png") }}>
  <link rel="manifest" href={{ url("/images/favicon/site.webmanifest") }}>
  <link rel="mask-icon" href={{ url("/images/favicon/safari-pinned-tab.svg") }} color="#5bbad5">
  <link rel="shortcut icon" href={{ url("/images/favicon/favicon.ico") }}>
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content={{ url("/images/favicon/browserconfig.xml") }}>
  <meta name="theme-color" content="#ffffff">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">

  @yield('style')
  <link rel="stylesheet" href={{asset("fonts/icomoon/style.css")}}>
  <link href={{asset("vendor/fontawesome-free/css/all.css")}} rel="stylesheet">
  <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
  <link rel="stylesheet" href={{asset("css/jquery-ui.css")}}>
  <link rel="stylesheet" href={{asset("css/owl.carousel.min.css")}}>
  <link rel="stylesheet" href={{asset("css/owl.theme.default.min.css")}}>
  <link rel="stylesheet" href={{asset("css/owl.theme.default.min.css")}}>

  <link rel="stylesheet" href={{asset("css/jquery.fancybox.min.css")}}>

  <link rel="stylesheet" href={{asset("css/bootstrap-datepicker.css")}}>

  <link rel="stylesheet" href={{asset("fonts/flaticon/font/flaticon.css")}}>

  <link rel="stylesheet" href={{asset("css/aos.css")}}>

  <link rel="stylesheet" href={{asset("css/style.css")}}>

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap"  id="home-section">

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <header class="site-navbar py-md-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-4 d-none d-lg-inline">
          <div class="row">
            <div class="col-2">
              <a href="/" class="navbar-brand align-middle">
                <img src="https://pbs.twimg.com/profile_images/248185979/logo_Vidyasena.bmp" alt="" style="height :50px;">
              </a>
            </div>
            <div class="col-10 my-auto">
              <a href="/" class="font-weight-bold" style="color: black">Vidyāsenā Vihāra Vidyāloka</a>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-6 col-xl-2  d-block d-lg-none">
          <h1 class="mb-0 site-logo">
            <a href="/" class="navbar-brand">
              <img src="https://pbs.twimg.com/profile_images/248185979/logo_Vidyasena.bmp" alt="" style="height :50px; margin-top: 10px;;">
            </a>
          </h1>
        </div>
        <div class="col-8 col-md-8 main-menu">
          <nav class="site-navigation position-relative text-right" role="navigation">
            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <!-- <li><a id="beranda" class="nav-link cursor-pointer" href="{{URL::to('/')}}">Beranda</a></li> //PROBABLY UNUSED--> 
              <li><a id="tentang-kami"  class="nav-link cursor-pointer" href="{{URL::to('tentang-kami')}}">Tentang Kami</a></li>
              <li><a id="program-kerja" class="nav-link cursor-pointer" href="{{URL::to('program-kerja')}}">Program Kerja</a></li>
              <li><a id="blog" class="nav-link cursor-pointer" href="{{URL::to('blog')}}">Blog</a></li>
              <li><a id="kontak" class="nav-link cursor-pointer" href="{{URL::to('kontak')}}">Kontak</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-6 col-md-6 d-inline-block d-lg-none ml-md-0" ><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>
      </div>
    </div>

  </header>

  @yield('content')

  <div class="footer py-5 border-top text-center" id="kontak-section">
    <div class="container">
      <div class="row mb-5 text-left border-bottom">
        <div class="mb-5 col-md-4 px-4">
          <a href="">
            <img height="100px" src="https://pbs.twimg.com/profile_images/248185979/logo_Vidyasena.bmp" alt="" class="mb-4">
          </a>
          <p class="font-italic" style="font-size: 12px;">"Biarlah mengorbankan harta demi menyelamatkan anggota tubuh,
            Biarlah mengorbankan anggota tubuh demi menyelamatkan hidupnya,
            Biarlah mengorbankan harta, anggota tubuh dan segalanya,
            meskipun pula hidupnya, demi kebenaran Dhamma."</p>
        </div>
        <div class="mb-5 col-md-5 px-4">
          <p class="font-weight-bold mb-0">
            Vihara Vidyaloka Yogyakarta
          </p>
          <p class="mb-3" style="font-size: 12px;">
            Jalan Kenari Gang Tanjung I No. 231<br>
            Muja - Muju, Umbulharjo, Kota Yogyakarta<br>
            Daerah Istimewa Yogyakarta 55165<br>
          </p>
          <p class="font-weight-bold mb-0">
            Puja Bhakti
          </p>
          <p class="mb-3" style="font-size: 12px;">
            Setiap Hari Minggu Pukul 09.00 WIB
          </p>
          <p class="mb-0 font-weight-bold">
            Uposatha
          </p>
          <p class="mb-3" style="font-size: 12px;">
            Setiap tanggal 1 dan 15 Kalender Lunar<br>
            Pukul 19.00 WIB
          </p>
          <p class="mb-0 font-weight-bold">
            Perpustakaan Vidyasena
          </p>
          <p class="mb-3" style="font-size: 12px;">
            Setiap Sabtu Pukul 13.00 WIB - 15.00 WIB<br>
            Setiap Minggu Pukul 11.00 WIB - 13.00 WIB<br>
          </p>
        </div>
        <div class="mb-5 col-md-3 px-4">
          <p class="font-weight-bold mb-0">Mari Ikuti Kami</p>
          <div class="nav-container d-flex nav">
            <div>
              <li class="nav-item">
              <li class="fab fa-facebook-square"></li>
              <a href="">Facebook</a>
              </li>
            </div>
          </div>
          <div class="nav-container d-flex nav">
            <div>
              <li class="nav-item">
              <li class="fab fa-instagram"></li>
              <a href="">Instagram</a>
              </li>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="mb-0" style="font-size: 10px">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </div>
</div> <!-- .site-wrap -->
<script src={{asset("js/jquery-3.3.1.min.js")}}></script>
<script src={{asset("js/jquery-migrate-3.0.1.min.js")}}></script>
<script src={{asset("js/jquery-ui.js")}}></script>
<script src={{asset("js/popper.min.js")}}></script>
<script src={{asset("js/bootstrap.min.js")}}></script>
<script src={{asset("js/owl.carousel.min.js")}}></script>
<script src={{asset("js/jquery.stellar.min.js")}}></script>
<script src={{asset("js/jquery.countdown.min.js")}}></script>
<script src={{asset("js/bootstrap-datepicker.min.js")}}></script>
<script src={{asset("js/jquery.easing.1.3.js")}}></script>
<script src={{asset("js/aos.js")}}></script>
<script src={{asset("js/jquery.fancybox.min.js")}}></script>
<script src={{"js/jquery.sticky.js"}}></script>
<script src={{"js/main.js"}}></script>
<script>
    $(document).ready(function(){
        $("#beranda").click(function () {
            location.href = "/";
        });

        $("#tentang-kami").click(function () {
            location.href = "{{ url('tentang-kami') }}";
        });

        $("#program-kerja").click(function () {
            location.href = "{{ url('program-kerja') }}";
        });

        $("#blog").click(function () {
            location.href = "{{ url('blog') }}";
        });

        $("#kontak").click(function () {
            location.href = "#kontak";
        });
    });

</script>
@yield('script')

</body>
</html>