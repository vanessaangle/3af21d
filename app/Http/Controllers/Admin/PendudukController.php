<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendudukController extends Controller
{
    private $template = [
        'title' => "Penduduk",
        'route' => 'admin.penduduk',
        'menu' => 'penduduk',
        'icon' => 'fa fa-group',
        'theme' => 'skin-red'
    ];

    public function form(){
        $jenis = [
            ['value' => 'Laki Laki','name' => 'Laki Laki'],
            ['value' => 'Perempuan','name' => 'Perempuan']
        ];

        return [
           ['label' => 'NIK','name' => 'nik','view_index' => true],
           ['label' => 'Nama','name' => 'name','view_index' => true],
           ['label' => 'Jenis Kelamin', 'name' => 'jenis_kelamin','type' => 'select', 'option' => $jenis, 'view_index' => true],
           ['label' => '']
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
