<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penduduk;
use Carbon\Carbon;
use Alert;
use App\Exports\PendudukExport;
use App\Helpers\AppHelper;

class PendudukController extends Controller
{
    private $template = [
        'title' => "Penduduk",
        'route' => 'admin.penduduk',
        'menu' => 'penduduk',
        'icon' => 'fa fa-group',
        'theme' => 'skin-red',
        'config' => [
            'index.create.is_show' => 'true'
        ]
    ];

    public function form(){
        $jenis = [
            ['value' => 'Laki Laki','name' => 'Laki Laki'],
            ['value' => 'Perempuan','name' => 'Perempuan']
        ];
        $agama = [
            ['value' => 'Hindu','name' => 'Hindu'],
            ['value' => 'Islam','name' => 'Islam'],
            ['value' => 'Katolik','name' => 'Katolik'],
            ['value' => 'Protestan','name' => 'Protestan'],
            ['value' => 'Budha','name' => 'Budha'],
            ['value' => 'Konghuchu','name' => 'Konghuchu'],
        ];
        $status = [
            ['value' => 'Menikah','name' => 'Menikah'],
            ['value' => 'Belum Menikah','name' => 'Belum Menikah'], 
            ['value' => 'Duda','name' => 'Duda'],
            ['value' => 'Janda','name' => 'Janda']
        ];
        $goldar = [
            ['value' => 'O', 'name' => 'O'],
            ['value' => 'A', 'name' => 'A'],
            ['value' => 'B', 'name' => 'B'],
            ['value' => 'AB', 'name' => 'AB'],
        ];
        $is_pendatang = [
            ['value' => 'Ya', 'name' => 'Ya'],
            ['value' => 'Tidak', 'name' => 'Tidak'],
        ];
        return [
           ['label' => 'NIK','name' => 'nik','view_index' => true],
           ['label' => 'No KK', 'name' => 'no_kk', 'view_index' => true],
           ['label' => 'Nama','name' => 'nama','view_index' => true],
           ['label' => 'Jenis Kelamin', 'name' => 'jenis_kelamin','type' => 'select', 'option' => $jenis, 'view_index' => true],
           ['label' => 'Tempat Lahir','name' => 'tempat_lahir','view_index' => true],
           ['label' => 'Tanggal Lahir','name' => 'tgl_lahir', 'type' => 'datepicker'],
           ['label' => 'Agama','name' => 'agama','type' => 'select','option' => $agama,'view_index' => true],
           ['label' => 'Pekerjaan','name' => 'pekerjaan','view_index' => true],
           ['label' => 'Golongan Darah','name' => 'golongan_darah','view_index' => true,'type' => 'select', 'option' => $goldar],
           ['label' => 'Status','name' => 'status','view_index' => true,'type' => 'select','option' => $status],
           ['label' => 'Foto','name' => 'foto', 'type' => 'file','attr' => 'accept="image/*"', 'required' => ['create']],
           ['label' => 'Apakah pendatang', 'name' => 'is_pendatang','type' => 'select', 'option' => $is_pendatang],
           ['label' => 'Update Terakhir', 'name' => 'updated_at','view_index' => true, 'type' => 'hidden','required' => []]
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->role == 'Kepala Desa'){
            $this->template['config']['index.create.is_show'] = false;
            $this->template['config']['index.delete.is_show'] = false;
            $this->template['config']['index.edit.is_show'] = false;
        }

        $data = Penduduk::where('desa_id',auth()->user()->desa_id)
            ->get();
        $form = $this->form();
        $template = (object) $this->template;
        return view('admin.master.index',compact('data','form','template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->form();
        $template = (object) $this->template;
        return view('admin.master.create',compact('form','template'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:penduduk,nik',
            'no_kk' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'golongan_darah' => 'required',
            'status' => 'required',
            'foto' => 'required'
        ]);

        $uploader = AppHelper::uploader($this->form(),$request);

        Penduduk::create([
            'desa_id' => auth()->user()->desa_id,
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => Carbon::parse($request->tgl_lahir)->format('Y-m-d'),
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'golongan_darah' => $request->golongan_darah,
            'status' => $request->status,
            'foto' => $uploader['foto']
        ]);
        Alert::make('success','Berhasil simpan data');
        return redirect(route($this->template['route'].'.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = (object) $this->template;
        $form = $this->form();
        $data = Penduduk::findOrFail($id);
        return view('admin.master.show',compact('template','form','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = (object) $this->template;
        $form = $this->form();
        $data = Penduduk::findOrFail($id);
        return view('admin.master.edit',compact('template','form','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|unique:penduduk,nik,'.$id,
            'nama' => 'required',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'golongan_darah' => 'required',
            'status' => 'required'
        ]);
        $data = [
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => Carbon::parse($request->tgl_lahir)->format('Y-m-d'),
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'golongan_darah' => $request->golongan_darah,
            'status' => $request->status
        ];
        if($request->has('foto')){
            $uploader = AppHelper::uploader($this->form(),$request);
            $data['foto'] = $uploader['foto'];
        }
        Penduduk::find($id)->update($data);
        Alert::make('success','Berhasil simpan data');
        return redirect(route($this->template['route'].'.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penduduk::find($id)->delete();
        Alert::make('success','Berhasil hapus data');
        return redirect(route($this->template['route'].'.index'));
    }

    public function download()
    {
        return (new PendudukExport)->download('Penduduk.xlsx');
    }
}
