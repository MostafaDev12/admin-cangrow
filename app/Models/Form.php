<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';

    protected $fillable = [
        'key', 'name', 'service_id', 'enabled', 'source_identifier',
        'heading_ar', 'heading_en', 'heading_fr',
        'description_ar', 'description_en', 'description_fr',
        'button_text_ar', 'button_text_en', 'button_text_fr',
        'success_message_ar', 'success_message_en', 'success_message_fr',
    ];

    public function fields()
    {
        return $this->hasMany(FormField::class)->orderBy('display_order');
    }

    public function visibleFields()
    {
        return $this->hasMany(FormField::class)->where('visible', 1)->orderBy('display_order');
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Fetch a form configuration by its unique key.
     */
    public static function byKey($key)
    {
        return static::with('visibleFields')->where('key', $key)->first();
    }
}
