<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use SoftDeletes;
    
    protected $table = 'penduduk';

    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
