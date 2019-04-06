<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
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
}
