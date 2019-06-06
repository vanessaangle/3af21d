<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pegawai;
use App\Desa;
use App\Helpers\Alert;
use App\Helpers\AppHelper;

class PegawaiController extends Controller
{
    private $template = [
        'title' => "Pegawai",
        'route' => 'admin.pegawai',
        'menu' => 'pegawai',
        'icon' => 'fa fa-group',
        'theme' => 'skin-red'
    ];

    public function form(){
        $desa = Desa::select('id as value','nama_desa as name')
            ->get();
        $jabatan = [
            ['value' => 'Kepala Desa','name' => 'Kepala Desa'],
            ['value' => 'Staff','name' => 'Staff']
        ];
        return [
            [
                'label' => 'NIP',
                'name' => 'nip',
                'view_index' => true
            ],
            [
                'label' => 'Nama',
                'name' => 'nama',
                'view_index' => true
            ],
            [
                'label' => 'Desa',
                'name' => 'desa_id',
                'type' => 'select',
                'option' => $desa,
                'view_index' => true,
                'view_relation' => 'desa->nama_desa'
            ],
            [
                'label' => 'Tanggal Lahir',
                'name' => 'tanggal_lahir',
                'type' => 'datepicker',
                'view_index' => true
            ],
            [
                'label' => 'Alamat',
                'name' => 'alamat',
                'type' => 'textarea'
            ],
            [
                'label' => 'Handphone',
                'name' => 'hp',
                'view_index' => true
            ],
            [
                'label' => 'Jabatan',
                'name' => 'jabatan',
                'type' => 'select',
                'option' => $jabatan,
                'view_index' => true
            ],
            [
                'label' => 'Foto',
                'name' => 'foto',
                'type' => 'file'
            ]
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $template = (object) $this->template;
        $data = Pegawai::all();
        $form = $this->form();
        return view('admin.master.index',compact('template','data','form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template = (object)$this->template;
        $form = $this->form();
        return view('admin.master.create',compact('template','form'));
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
            'nip' => 'required',
            'nama' => 'required',
            'desa_id' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'jabatan' => 'required'
        ]);

        $file = AppHelper::uploader($this->form(),$request);

        Pegawai::create([
            'nip' =>$request->nip,
            'nama' =>$request->nama,
            'desa_id' =>$request->desa_id,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'alamat' =>$request->alamat,
            'hp' =>$request->hp,
            'jabatan' =>$request->jabatan,
            'foto' => $file['foto']
        ]);

        Alert::make('success','Berhasil  simpan data');
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
        $template = (object)$this->template;
        $form = $this->form();
        $data = Pegawai::findOrFail($id);
        return view('admin.master.show',compact('template','data','form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pegawai::findOrFail($id);
        $template = (object)$this->template;
        $form = $this->form();
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
            'nip' => 'required',
            'nama' => 'required',
            'desa_id' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'jabatan' => 'required'
        ]);

        $data = $request->all();
        Pegawai::find($id)->update($data);
        Alert::make('success','Berhasil mengubah data');
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
        Pegawai::find($id)->delete();
        Alert::make('success','Berhasil menghapus data');
        return redirect(route($this->template['route'].'.index'));
    }
}

