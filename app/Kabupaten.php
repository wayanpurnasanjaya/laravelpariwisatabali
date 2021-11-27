<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
