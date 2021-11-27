<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
