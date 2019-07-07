@extends('admin.layouts.app')
@push('css')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$template->title}}                
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{$template->title}}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           <div class="row">
               <div class="col-md-12">
                    {!!Alert::showBox()!!}
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> List {{$template->title}}</h3>
                            @if (auth()->user()->role != 'Kepala Desa')
                                <a href="{{route("$template->route".'.create')}}" class="btn btn-primary pull-right">
                                    <i class="fa fa-pencil"></i> Tambah {{$template->title}}
                                </a>
                            @endif
                        </div>
                        <div class="box-body">
                            @if ($template->menu == 'penduduk')
                            <a href="{{url('admin/penduduk/download')}}" class="btn btn-primary"><i class="fa fa-download"></i> Download (.xlsx)</a>
                            <br>
                            <br>
                            @endif
                            <table class="table" id="datatables">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        @foreach ($form as $item)
                                            @if (array_key_exists('view_index',$item) && $item['view_index'])
                                                <td>{{$item['label']}}</td>
                                            @endif
                                        @endforeach
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            @foreach ($form as $item)
                                                @if (array_key_exists('view_index',$item) && $item['view_index'])
                                                    <td>
                                                        @if (array_key_exists('view_relation',$item))
                                                        {{ AppHelper::viewRelation($row,$item['view_relation']) }}
                                                        @else
                                                        {{ $row->{$item['name']} }}
                                                        @endif
                                                    </td>
                                                @endif
                                            @endforeach
                                            <td>
                                                @if (auth()->user()->role != 'Kepala Desa')
                                                    <a href="{{route("$template->route".'.edit',[$row->id])}}" class="btn btn-success btn-sm">Ubah</a>
                                                @endif
                                                <a href="{{route("$template->route".'.show',[$row->id])}}" class="btn btn-info btn-sm">Lihat</a>
                                                @if (auth()->user()->role != 'Kepala Desa')
                                                <a href="#" class="btn btn-danger btn-sm" onclick="confirm('Lanjutkan ?') ? $('#frmDelete{{$row->id}}').submit() : ''">Hapus</a>
                                                <form action="{{route("$template->route".'.destroy',[$row->id])}}" method="POST" id="frmDelete{{$row->id}}">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                </form>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
           </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <!-- page script -->
    <script>
    $(function () {
        $('#datatables').DataTable()
        $('#full-datatables').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
@endpush