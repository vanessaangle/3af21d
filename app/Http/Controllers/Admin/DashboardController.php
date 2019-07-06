<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penduduk;
use DB;

class DashboardController extends Controller
{
    private $template = [
        'title' => 'Dashboard',
        'route' => 'dashboard',
        'menu' => 'dashboard',
        'icon' => 'fa fa-home',
        'theme' => 'skin-red'
    ]; 

    public function index()
    {
        $template = (object) $this->template;
        $penduduk1 = [];

        Penduduk::select(DB::raw('
                COUNT(*) as total, jenis_kelamin
            '))
            ->where('desa_id',auth()->user()->desa_id)
            ->groupBy('jenis_kelamin')
            ->get()
            ->map(function($item) use (&$penduduk1){
                $penduduk1[] = [
                    'value' => $item->total,
                    'label' => $item->jenis_kelamin,
                    'color' => $item->jenis_kelamin == 'Perempuan' ? '#00a65a' : '#f56954',
                    'highlight' => $item->jenis_kelamin == 'Perempuan' ? '#00a65a' : '#f56954',
                ];
            });
            
        return view('admin.dashboard.index',compact('template','penduduk1'));
    }
}
