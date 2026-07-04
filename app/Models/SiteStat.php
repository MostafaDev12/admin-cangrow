<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteStat extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='site_stats';


    protected $fillable = [

        'section',
        'icon',
        'value',
        'title_ar',
        'title_en',
        'title_fr',
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
