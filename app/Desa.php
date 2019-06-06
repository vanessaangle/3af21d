<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use SoftDeletes;
    
    protected $table = 'desa';

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function administrasi()
    {
        return $this->hasMany(Administrasi::class);
    }

    public function gambar_depan()
    {
        return $this->hasMany(GambarDepan::class);
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
