<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapSetting extends Model
{
    protected $table = 'map_settings';

    protected $fillable = [
        'page_key', 'enabled', 'embed_url', 'clinic_name',
        'address_ar', 'address_en', 'address_fr',
        'latitude', 'longitude', 'map_title', 'direct_link',
        'button_text_ar', 'button_text_en', 'button_text_fr',
    ];

    public static function byKey($key)
    {
        return static::where('page_key', $key)->first();
    }
}
