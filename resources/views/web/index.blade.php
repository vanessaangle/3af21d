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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,200,200i,700,700i|Montserrat:300,200,500,700" rel="stylesheet">

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
  
  .chart-penduduk{
    color : #fff;
    padding-bottom: 30px;
    /* margin : 20px;  */
  }
  .chart-penduduk h4{
    text-align: center;
    display: block;
  }
  .chart-penduduk canvas{
    margin-left: -15px;
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
         
        </header>
        <p>{{$desa->deskripsi}}</p>
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
            <div class="col-xs-4 chart-penduduk">
              <canvas id="penduduk1"></canvas>
              <h4>Jenis Kelamin</h4>
              @foreach($penduduk1 as $key => $value)
              <div style="display:flex;margin-bottom:10px;">
              <div style="margin-right:10px;width:20px;height:20px;background-color : {{$value['color']}}"></div>
                  <div style="float-left" class="text">{{$value['label']}}</div> : {{$value['value']}}
              </div>
              @endforeach
            </div>
            <div class="col-xs-4 chart-penduduk">
              <canvas id="penduduk2"></canvas>
              <h4>Status Pernikahan</h4>
              @foreach($penduduk2 as $key => $value)
              <div style="display:flex;margin-bottom:10px;">
              <div style="margin-right:10px;width:20px;height:20px;background-color : {{$value['color']}}"></div>
                  <div style="float-left" class="text">{{$value['label']}}</div> : {{$value['value']}}
              </div>
              @endforeach
            </div>
            <div class="col-xs-4 chart-penduduk">
                <canvas id="penduduk3"></canvas>
                <h4>Status Golongan Darah</h4>
                @foreach($penduduk3 as $key => $value)
                <div style="display:flex;margin-bottom:10px;">
                <div style="margin-right:10px;width:20px;height:20px;background-color : {{$value['color']}}"></div>
                    <div style="float-left" class="text">{{$value['label']}}</div> : {{$value['value']}}
                </div>
                @endforeach
            </div>
            <div class="col-xs-4 chart-penduduk">
              <canvas id="penduduk4"></canvas>
              <h4>Agama</h4>
                @foreach($penduduk4 as $key => $value)
                <div style="display:flex;margin-bottom:10px;">
                <div style="margin-right:10px;width:20px;height:20px;background-color : {{$value['color']}}"></div>
                    <div style="float-left" class="text">{{$value['label']}}</div> : {{$value['value']}}
                </div>
                @endforeach
            </div>
            <div class="col-xs-4 chart-penduduk">
                <canvas id="penduduk5"></canvas>
                <h4>Pendatang</h4>
                @foreach($penduduk5 as $key => $value)
                <div style="display:flex;margin-bottom:10px;">
                <div style="margin-right:10px;width:20px;height:20px;background-color : {{$value['color']}}"></div>
                    <div style="float-left" class="text">{{$value['label']}}</div> : {{$value['value']}}
                </div>
                @endforeach
              </div>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio" class="clearfix">
      <div class="container kegiatan-section" >

        <header class="section-header">
          <h3 class="section-title">Kegiatan</h3>
        </header>       
        
        @foreach ($kegiatan as $item)
          <div class="row kegiatan-row" style="margin-bottom:25px">
            <div class="col-sm-12">
              <div class="col-sm-4">
                <img src="{{asset($item->foto_kegiatan)}}" width="100%" alt="">
              </div>
              <div class="col-sm-8">
                <div class="label label-default">#{{$item->kategori}}</div>
                <h3 style="margin-bottom:3px;margin-top:3px">{{$item->judul_kegiatan}}</h3> 
                <p>{{substr(strip_tags($item->isi_kegiatan),0,300)}}</p>               
                <a class="btn btn-primary btn-sm" href="{{url('desa/'.$desa->slug.'/berita/'.$item->id)}}"><i class="fa fa-eye"></i> Baca</a>
              </div>
            </div>              
          </div>
        @endforeach

        <div class="row">
          <div class="col-sm-12 text-center">
            <button class="btn btn-default show-more">Tampilan Lebih Banyak</button>
          </div>
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
                <a href="/{{$val->file}}" target="__blank" style="font-size:25px"><i class="ion-ios-download-outline" style="font-size:30px"></i> {{$val->judul}}</a> <br>
                <small>{{$val->deskripsi}}</small>
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
        <div class="col-sm-12 col-md-6">
          @foreach($desa->pegawai as $key => $val)
            <div class="col-sm-12 pegawai-row" style="padding-bottom:20px;">
              <div class="col-sm-4">
                <img src="/{{$val->foto}}" alt="" width="100%">
              </div>
              <div class="col-sm-8">
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
                    <tr>
                      <td>Telepon</td>
                      <td>:</td>
                      <td>{{$val->hp}}</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
          @endforeach
          <div class="col-sm-12 text-center">
            <button class="btn btn-default show-more-pegawai">Tampilan Lebih Banyak</button>
          </div>
        </div>
        
        <div class="col-sm-12 col-md-6">
          <img src="/{{$desa->foto_organisasi}}" width="100%" alt="">
        </div>
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
              <iframe src="{{$desa->peta}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                
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
  <script src="{{asset('admin-lte')}}/bower_components/chart.js/Chart.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDX5i1N1RR3DSQTIRu0ZbIyTgorg7Rhg_g&callback=initMap"></script>
  <script>
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide"
      });

      function showKegiatan(show){        
        $('.kegiatan-row').map(function(i,d){
          // console.log(show);
          if(i < show){
            $(this).css('display','block')
          }else{
            $(this).css('display','none')
          }
        })

        if($('.kegiatan-row').length <= show){
          $('.show-more').css('display','none');
        }
      }

      var show = 4;
      showKegiatan(show);

      $('.show-more').click(function(){
        show += 4;
        showKegiatan(show);
      })

      //=====================================================

      function showPegawai(show){        
        $('.pegawai-row').map(function(i,d){
          console.log(show);
          if(i < show){
            $(this).css('display','block')
          }else{
            $(this).css('display','none')
          }
        })

        if($('.pegawai-row').length <= show){
          $('.show-more-pegawai').css('display','none');
        }
      }

      var showP = 4;
      showPegawai(showP);

      $('.show-more-pegawai').click(function(){
        showP += 4;
        showPegawai(showP);
      })
      
      
    });
  </script>
  <script>
    var penduduk1 = $('#penduduk1').get(0).getContext('2d');
    var penduduk2 = $('#penduduk2').get(0).getContext('2d');
    var penduduk3 = $('#penduduk3').get(0).getContext('2d');
    var penduduk4 = $('#penduduk4').get(0).getContext('2d');
    var penduduk5 = $('#penduduk5').get(0).getContext('2d');
    var penduduk1Chart = new Chart(penduduk1);
    var penduduk2Chart = new Chart(penduduk2)
    var penduduk3Chart = new Chart(penduduk3)
    var penduduk4Chart = new Chart(penduduk4)
    var penduduk5Chart = new Chart(penduduk5)
    var penduduk1Data = JSON.parse('{!! json_encode($penduduk1) !!}');
    var penduduk2Data = JSON.parse('{!! json_encode($penduduk2) !!}');
    var penduduk3Data = JSON.parse('{!! json_encode($penduduk3) !!}');
    var penduduk4Data = JSON.parse('{!! json_encode($penduduk4) !!}');
    var penduduk5Data = JSON.parse('{!! json_encode($penduduk5) !!}');
    var penduduk1Options = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    penduduk1Chart.Doughnut(penduduk1Data,penduduk1Options);
    penduduk2Chart.Doughnut(penduduk2Data,penduduk1Options);
    penduduk3Chart.Doughnut(penduduk3Data,penduduk1Options);
    penduduk4Chart.Doughnut(penduduk4Data,penduduk1Options);
    penduduk5Chart.Doughnut(penduduk5Data,penduduk1Options);
    </script>
</body>
</html>
