@extends('admin.layouts.app',[$template])
@push('css')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$template->title}}
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Home</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->            
            <!-- /.row -->
            <!-- Main row -->
            @if(AppHelper::access(['Admin']))
            <div class="row">
                <div class="col-md-12" style="padding-top:180px">                    
                    <h2><center>SELAMAT DATANG SISTEM INFORMASI CLOUD DESA</center></h2>                                    
                </div>                
            </div>
            @else
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                Data Jumlah Jenis Kelamin Penduduk {{auth()->user()->desa->nama_desa}}
                            </div>
                            <div class="box-body">
                                <canvas id="penduduk1"></canvas>
                            </div>
                            <div class="box-footer">
                                <div style="display:flex;margin-bottom:10px;">
                                    <div style="margin-right:10px;width:20px;height:20px;;background-color : #f56954"></div>
                                    <div style="float-left" class="text">Perempuan</div>
                                </div>
                                <div style="display:flex">
                                    <div style="margin-right:10px;width:20px;height:20px;;background-color : #00a65a"></div>
                                    <div style="float-left" class="text">Laki-laki</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                Data Penduduk Dengan Status Menikah {{auth()->user()->desa->nama_desa}}
                            </div>
                            <div class="box-body">
                                <canvas id="penduduk2"></canvas>
                            </div>
                            <div class="box-footer">
                                <div style="display:flex;margin-bottom:10px;">
                                    <div style="margin-right:10px;width:20px;height:20px;background-color : #e53935"></div>
                                    <div style="float-left" class="text">Belum Menikah</div>
                                </div>
                                <div style="display:flex;margin-bottom:10px;">
                                    <div style="margin-right:10px;width:20px;height:20px;;background-color : #00a65a"></div>
                                    <div style="float-left" class="text">Menikah</div>
                                </div>
                                <div style="display:flex;margin-bottom:10px;">
                                    <div style="margin-right:10px;width:20px;height:20px;;background-color : #f56954"></div>
                                    <div style="float-left" class="text">Duda</div>
                                </div>
                                <div style="display:flex;margin-bottom:10px;">
                                    <div style="margin-right:10px;width:20px;height:20px;background-color : #03A9F4"></div>
                                    <div style="float-left" class="text">Janda</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endif

           

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
    <script src="{{asset('admin-lte')}}/bower_components/chart.js/Chart.js"></script>
    @if (auth()->user()->role != 'Admin')
    <script>
            $(function(){
                var penduduk1 = $('#penduduk1').get(0).getContext('2d');
                var penduduk2 = $('#penduduk2').get(0).getContext('2d');
                var penduduk1Chart = new Chart(penduduk1);
                var penduduk2Chart = new Chart(penduduk2)
                var penduduk1Data = JSON.parse('{!! json_encode($penduduk1) !!}');
                var penduduk2Data = JSON.parse('{!! json_encode($penduduk2) !!}');
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
            });
        </script>
    @endif
    
@endpush