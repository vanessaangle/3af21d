<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
