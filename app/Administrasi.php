<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrasi extends Model
{
    use SoftDeletes;
    
    protected $table = 'administrasi';

    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
