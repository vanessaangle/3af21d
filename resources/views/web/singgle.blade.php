<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{$desa->nama_desa}} - {{$berita->judul_kegiatan}}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="GIS" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('web')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('web')}}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Libraries CSS Files -->
  <link href="{{asset('web')}}/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{asset('web')}}/lib/animate/animate.min.css" rel="stylesheet">
  <link href="{{asset('web')}}/lib/flexslider/flexslider.css" rel="stylesheet">
  <link href="{{asset('web')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{asset('web')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{asset('web')}}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('admin-lte')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="shortcut icon" href="{{asset('favicon.png')}}">

  <!-- Main Stylesheet File -->
  <link href="{{asset('web')}}/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
  
  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<style>
  th,td{
    border: none;
  }

  #file,
  #struktur{
    padding-bottom: 40px;
    padding-top: 40px;
  }
</style>
<body>
  

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
      
        <h2> <img src="/web/img/logo.jpg" style="max-height:50px;margin-top:-10px" alt=""> DESA {{$desa->nama_desa}}</h2>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('desa/'.$desa->slug)}}#home">Home</a></li>
          <li><a href="{{url('desa/'.$desa->slug)}}#about">Deskripsi</a></li>
          <li><a href="{{url('desa/'.$desa->slug)}}#why-us">Penduduk</a></li>
          <li><a href="{{url('desa/'.$desa->slug)}}#portfolio">Kegiatan</a></li>
          <li><a href="{{url('desa/'.$desa->slug)}}#file">File</a></li>
          <li><a href="{{url('desa/'.$desa->slug)}}#struktur">Struktur Organisasi</a></li>
          <li><a href="{{url('desa/'.$desa->slug)}}#contact">Kontak</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  
  <main id="main">
    
    <section id="home">      
        <div class="flexslider">
          <ul class="slides">
            <li>
                <img src="/{{$berita->foto_kegiatan}}" />
            </li>  
          </ul>
        </div>
        
    </section>
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <h2>{{$berita->judul_kegiatan}}</h2>
        {!! $berita->isi_kegiatan !!}
      </div>
    </section><!-- #about -->

  

    
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Desa {{$desa->nama_desa}}</h3>
            <p>{{$desa->deskripsi}}</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Desa {{$desa->nama_desa}}</h4>
            <p>
              {{$desa->alamat}} <br>
              Kuta Utara,<br>
              Badung, Bali <br>
              <strong>Email:</strong> {{$desa->email}}<br>    
              <strong>Telepon:</strong> {{$desa->telepon}}<br>         
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Pemerintah Kabupaten Badung</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{asset('web')}}/lib/jquery/jquery.min.js"></script>
  <script src="{{asset('web')}}/lib/jquery/jquery-migrate.min.js"></script>
  <script src="{{asset('web')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('web')}}/lib/easing/easing.min.js"></script>
  <script src="{{asset('web')}}/lib/mobile-nav/mobile-nav.js"></script>
  <script src="{{asset('web')}}/lib/wow/wow.min.js"></script>
  <script src="{{asset('web')}}/lib/waypoints/waypoints.min.js"></script>
  <script src="{{asset('web')}}/lib/flexslider/jquery.flexslider.js"></script>
  <script src="{{asset('web')}}/lib/counterup/counterup.min.js"></script>
  <script src="{{asset('web')}}/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="{{asset('web')}}/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('web')}}/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('web')}}/contactform/contactform.js"></script>
  <script src="{{asset('admin-lte')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Template Main Javascript File -->
  <script src="{{asset('web')}}/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDX5i1N1RR3DSQTIRu0ZbIyTgorg7Rhg_g&callback=initMap"></script>
  <script>
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide"
      });
    });
  </script>
  <script>
    
    </script>
</body>
</html>
