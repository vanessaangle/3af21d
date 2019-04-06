<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    protected $table = 'administrasi';

    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
