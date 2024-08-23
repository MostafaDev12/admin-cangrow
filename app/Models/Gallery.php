<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['service_id','photo'];
    // public $timestamps = false;

    protected $appends = ['photo_url'];

    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/galleries/' . $this->attributes['photo'];
    }
}
