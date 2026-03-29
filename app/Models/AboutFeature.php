<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFeature extends Model
{
    protected $table = 'about_features';

    protected $fillable = [
        'icon',
        'type',
        'title_ar',
        'title_en',
        'title_fr',
    ];
}
