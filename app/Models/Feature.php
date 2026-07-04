<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='features';

     protected $appends = ['photo'];


    public function getPhotoAttribute()
    {
        return !empty($this->attributes['photo']) ? url('/') . '/assets/images/features/' . $this->attributes['photo'] : '';
    }
    protected $fillable = [

        'section',
        'photo',
        'icon',
        'title_ar',
        'title_en',
        'title_fr',
        'details_ar',
        'details_en',
        'details_fr',
        'sort_order',
        'is_active',

    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */



}
