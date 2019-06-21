<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Cloud Desa</title>
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
        <h2>DESA {{$desa->nama_desa}}</h2>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#home">Home</a></li>
          <li><a href="#about">Deskripsi</a></li>
          <li><a href="#why-us">Penduduk</a></li>
          <li><a href="#portfolio">Kegiatan</a></li>
          <li><a href="#file">File</a></li>
          <li><a href="#struktur">Struktur Organisasi</a></li>
          <li><a href="#contact">Kontak</a></li>
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
            @foreach($desa->gambar_depan as $key => $val)
            <li>
              <img src="/{{$val->gambar}}" />
            </li>  
            @endforeach   
          </ul>
        </div>
        
    </section>
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Tentang Desa {{$desa->nama_desa}}</h3>
          <p>{{$desa->deskripsi}}</p>
        </header>
      </div>
    </section><!-- #about -->

  

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Penduduk Desa {{$desa->nama_desa}}</h3>
          <p>Berikut adalah data jumlah penduduk desa {{$desa->nama_desa}} yang aktif</p>
        </header>

        <div class="row">
          <div class="col-xs-12">
            <div class="col-xs-6 col-xs-offset-3">
              <canvas id="pendudukChart" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
        <div class="row counters">

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">{{$totalPenduduk}}</span>
            <p>Jumlah Penduduk</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">{{$totalLaki}}</span>
            <p>Laki Laki</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">{{$totalPerempuan}}</span>
            <p>Perempuan</p>
          </div>          
  
        </div>

      </div>
    </section>

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio" class="clearfix">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Kegiatan</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <li data-filter=".filter-Berita">Berita</li>
              <li data-filter=".filter-Sosial">Sosial</li>
              <li data-filter=".filter-Lomba">Lomba</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          @foreach($kegiatan as $key => $value):
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$value->kategori}}">
              <div class="portfolio-wrap">
                <img src="{{asset($value->foto_kegiatan)}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><a href="#">{{$value->judul_kegiatan}}</a></h4>
                  <p>{{$value->kategori}}</p>
                  <div>
                    <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- #portfolio -->

    <section id="file" class="clearfix">
        <div class="container">
  
          <header class="section-header">
            <h3 class="section-title">File Administrasi</h3>
            <p>Silakan download file admistrasi</p>
          </header>

          <ul>
            @foreach($desa->administrasi as $key => $val)
              <li style="list-style-type: none">
                <a href="/{{$val->file}}" target="__blank" style="font-size:25px"><i class="ion-ios-download-outline" style="font-size:30px"></i> {{$val->judul}}</a>
              </li>
            @endforeach
          </ul>
  
          
  
        </div>
    </section><!-- #portfolio -->

    <section id="struktur" class="clearfix">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Struktur Organisasi</h3>
          <p>Struktur organisasi pegawai Desa {{$desa->dalung}}</p>
        </header>

        <ul>
          @foreach($desa->pegawai as $key => $val)
            <div class="col-sm-12" style="padding-bottom:20px;">
              <div class="col-sm-2">
                <img src="/{{$val->foto}}" alt="" width="100%">
              </div>
              <div class="col-sm-10">
                <table class="">
                  <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Nama</td>
                      <td style="width:30px;">:</td>
                      <td>{{$val->nama}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{$val->jabatan}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$val->alamat}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
          @endforeach
        </ul>
      </div>
  </section><!-- #portfolio -->


    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">
        <div class="section-header">
          <h3>Kontak Kami</h3>
        </div>
        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
                {!!$desa->peta!!}
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>{{$desa->alamat}}</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>{{$desa->email}}</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>{{$desa->telepon}}</p>
              </div>
            </div>

            
          </div>

        </div>

      </div>
    </section><!-- #contact -->



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
    var ctx = document.getElementById('pendudukChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Perempuan', 'Laki-laki'],
            datasets: [{
                label: '# Jumlah Penduduk',
                data: [{!!$totalPerempuan!!}, {!!$totalLaki!!}],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],             
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display : false                    
                }]
            }
        }
    });
    </script>
</body>
</html>
