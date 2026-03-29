<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 

class Language extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'photo',
        'language',
        'name',
        'file',
        'sign',
        'rtl',
        'is_default',
    ];

    public function getPhotoAttribute()
    {
        return !empty($this->attributes['photo']) ? url('/') . '/assets/images/language/' . $this->attributes['photo'] : '';
    }

}
