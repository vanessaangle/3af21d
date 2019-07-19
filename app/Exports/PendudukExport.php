<?php
namespace App\Exports;

use App\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class PendudukExport implements FromCollection {
    use Exportable;

    public function collection()
    {
        $penduduk =  Penduduk::where('desa_id',auth()->user()->desa_id)
            ->get();
        
        $data[] = ['NIK','NO KK','Nama','Jenis Kelamin','Tempat Lahir','Tanggal Lahir','Agama','Pekerjaan','Golongan Darah','Status'];
        foreach($penduduk as $p){
            $data[] = [
                $p->nik,
                $p->no_kk,
                $p->nama,
                $p->jenis_kelamin,
                $p->tempat_lahir,
                $p->tgl_lahir,
                $p->agama,
                $p->pekerjaan,
                $p->golongan_darah,
                $p->status
            ];
        }
        return collect($data);
    }
}