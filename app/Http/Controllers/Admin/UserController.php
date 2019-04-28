<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Desa;
use App\User;
use App\Helpers\Alert;
use Carbon\Carbon;

class UserController extends Controller
{
    private $template = [
        'title' => 'User',
        'route' => 'admin.user',
        'menu' => 'user',
        'icon' => 'fa fa-users',
        'theme' => 'skin-red'
    ];

    private function form()
    {
        $desa = Desa::select('id as value','nama_desa as name')
            ->get()
            ->toArray();
        $status = [
            ['value' => 1,'name' => 'Aktif'],
            ['value' => 0,'name' => 'Tidak Aktif']
        ];

        $role = [
            ['value' => 'Admin','name' => 'Admin'],
            ['value' => 'Kepala Desa','name' => 'Kepala Desa'],
            ['value' => 'Petugas','name' => 'Petugas'],
        ];

        return [
            ['label' => 'Nama Pengguna', 'name' => 'nama'],
            ['label' => 'Alamat', 'name' => 'alamat'],
            ['label' => 'Tanggal Lahir','name' => 'tgl_lahir', 'type' => 'datepicker'],
            ['label' => 'Email','name' => 'email'],
            ['label' => 'Telepon','name' => 'telepon'],
            ['label' => 'Password','name' => 'password','type' => 'password'],
            ['label' => 'Role','name' => 'role','type' => 'select','option' => $role],
            ['label' => 'Desa','name' => 'desa_id', 'type' => 'select','option' => $desa],
            ['label' => 'Status','name' => 'status', 'type' => 'select','option' => $status],
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
        $data = User::all();
        return view('admin.user.index',compact('template','data'));
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
        return view('admin.user.create',compact('template','form'));
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
            'desa_id' => 'required|exists:desa,id',
            'email' => 'required|unique:user,email',
            'password' => 'required|confirmed|min:6',
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'status' => 'required',
            'nama' => 'required'
        ]);
        User::create([
            'desa_id' => $request->desa_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tgl_lahir' => Carbon::parse($request->tgl_lahir)->format('Y-m-d'),
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'status' => $request->status,
            'nama' => $request->nama
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
        $data = User::findOrFail($id);
        return view('admin.desa.show',compact('template','data','form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $template = (object)$this->template;
        $form = $this->form();
        return view('admin.user.edit',compact('template','form','data'));
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
            'desa_id' => 'required|exists:desa,id',
            'email' => "required|unique:user,email,$id",
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'status' => 'required',
            'nama' => 'required'
        ]);
        if($request->password != null){
            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);
        }
        $user = User::findOrFail($id);
        $pass = $user->password;
        $data = [
            'desa_id' => $request->desa_id,
            'email' => $request->email,
            'password' => $request->has('password') ? bcrypt($request->password) : $pass,
            'tgl_lahir' => Carbon::parse($request->tgl_lahir)->format('Y-m-d'),
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'status' => $request->status,
            'nama' => $request->nama
        ];
        $user->update($data);
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
        User::find($id)->delete();
        Alert::make('success','Berhasil menghapus data');
        return redirect(route($this->template['route'].'.index'));
    }

    public function profile()
    {
        
    }
}
