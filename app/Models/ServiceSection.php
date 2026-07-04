<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='service_sections';

     protected $appends = ['image'];


    public function getImageAttribute()
    {
        return !empty($this->attributes['photo']) ? url('/') . '/assets/images/service_sections/' . $this->attributes['photo'] : '';
    }
    protected $fillable = [

        'service_id',
        'photo',
        'title_ar',
        'title_en',
        'title_fr',
        'details_ar',
        'details_en',
        'details_fr',
        'sort_order',
        'is_active',

    ];


    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
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
