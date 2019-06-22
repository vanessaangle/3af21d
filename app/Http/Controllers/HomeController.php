<?php

namespace App\Http\Controllers;
use App\Desa;
use App\Penduduk;
use App\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($desa){
        $desa = Desa::where('slug',$desa)->first();
        $totalPenduduk = Penduduk::where('desa_id',$desa->id)->get()->count();
        $totalLaki= Penduduk::where('jenis_kelamin','Laki Laki')->where('desa_id',$desa->id)->get()->count();
        $totalPerempuan = Penduduk::where('jenis_kelamin','Perempuan')->where('desa_id',$desa->id)->get()->count();
        $kegiatan = Kegiatan::where('desa_id',$desa->id)->get();
        return view('web.index',compact('desa','totalPenduduk','totalLaki','totalPerempuan','kegiatan'));
    }

    public function berita($desa,$id)
    {
        $desa = Desa::where('slug',$desa)->first();
        $berita = Kegiatan::find($id);
        return view('web.singgle',compact('desa','berita'));
    }
}
