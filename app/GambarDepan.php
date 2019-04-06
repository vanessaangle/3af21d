<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarDepan extends Model
{
    protected $table = 'gambar_depan';

    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
