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
        $penduduk2 = [];
        $penduduk3 = [];
        $penduduk4 = [];
        $penduduk5 = [];

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
                    'color' => $item->jenis_kelamin != 'Perempuan' ? '#00a65a' : '#f56954',
                    'highlight' => $item->jenis_kelamin != 'Perempuan' ? '#00a65a' : '#f56954',
                ];
            });
        
        Penduduk::select(DB::raw('
                COUNT(*) as total, status
            '))
            ->where('desa_id', auth()->user()->desa_id)
            ->groupBy('status')
            ->get()
            ->map(function($item) use (&$penduduk2){
                $penduduk2[] = [
                    'value' => $item->total,
                    'label' => $item->status,
                    'color' => $item->status == 'Menikah' ? '#00a65a' : ($item->status == 'Duda' ? '#f56954' : ($item->status == 'Janda' ? '#03A9F4' : '#e53935')),
                    'highlight' => $item->status == 'Menikah' ? '#00a65a' : ($item->status == 'Duda' ? '#f56954' : ($item->status == 'Janda' ? '#03A9F4' : '#e53935')),
                ];
            });
        
        Penduduk::select(DB::raw('
                COUNT(*) as total, golongan_darah
            '))
            ->where('desa_id',auth()->user()->desa_id)
            ->groupBy('golongan_darah')
            ->get()
            ->map(function($item) use (&$penduduk3){
                $penduduk3[] = [
                    'value' => $item->total,
                    'label' => $item->golongan_darah,
                    'color' => $item->golongan_darah == 'O' ? '#000000' : ($item->golongan_darah == 'A' ? '#D33725' : ($item->golongan_darah == 'B' ? '#9795C6' : '#DB8A0B')),
                    'highlight' => $item->golongan_darah == 'O' ? '#000000' : ($item->golongan_darah == 'A' ? '#D33725' : ($item->golongan_darah == 'B' ? '#9795C6' : '#DB8A0B')),
                ];
            });
        
        Penduduk::select(DB::raw('
                COUNT(*) as total, agama
            '))
            ->where('desa_id',auth()->user()->desa_id)
            ->groupBy('agama')
            ->get()
            ->map(function($item) use (&$penduduk4){
                $penduduk4[] = [
                    'value' => $item->total,
                    'label' => $item->agama,
                    'color' => $item->agama == 'Hindu' ? '#000000' : ($item->agama == 'Islam' ? '#D33725' : ($item->agama == 'Katolik' ? '#9795C6' : ($item->agama == 'Protestan' ? '#DB8A0B' : ($item->agama == 'Budha' ? '#00A7D0' : '#ECF0F5')))),
                    'highlight' => $item->agama == 'Hindu' ? '#000000' : ($item->agama == 'Islam' ? '#D33725' : ($item->agama == 'Katolik' ? '#9795C6' : ($item->agama == 'Protestan' ? '#DB8A0B' : ($item->agama == 'Budha' ? '#00A7D0' : '#ECF0F5')))),
                ];
            });

        Penduduk::select(DB::raw('
                COUNT(*) as total, is_pendatang
            '))
            ->where('desa_id',auth()->user()->desa_id)
            ->groupBy('is_pendatang')
            ->get()
            ->map(function($item) use (&$penduduk5){
                $penduduk5[] = [
                    'value' => $item->total,
                    'label' => $item->is_pendatang,
                    'color' => $item->is_pendatang == 'Ya' ? '#000000' : '#D33725',
                    'highlight' => $item->is_pendatang == 'Ya' ? '#000000' : '#D33725',
                ];
            });
            
        return view('admin.dashboard.index',compact('template','penduduk1','penduduk2','penduduk3','penduduk4','penduduk5'));
    }
}
