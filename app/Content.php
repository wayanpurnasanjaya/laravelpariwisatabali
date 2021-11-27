<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getThumbnail()
    {
        return asset('/images/' . $this->thumbnail);
    }

    public function getCountContent($user)
    {
        return $this->where('user_id',$user)->count();
    }

    public function getCountContentPublish($user)
    {
        return $this->where('user_id',$user)->where('status_publish',1)->count();
    }
    public function getCountContentNotPublish($user)
    {
        return $this->where('user_id',$user)->where('status_publish',0)->count();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
