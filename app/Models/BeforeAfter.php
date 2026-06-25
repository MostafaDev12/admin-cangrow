<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeforeAfter extends Model
{
    protected $table = 'before_afters';

    protected $appends = ['before_photo', 'after_photo'];

    protected $fillable = [
        'service_id',
        'title_ar', 'title_en', 'title_fr',
        'description_ar', 'description_en', 'description_fr',
        'before_photo', 'after_photo', 'before_alt', 'after_alt',
        'active', 'display_order', 'mt_featured',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getBeforePhotoAttribute()
    {
        $value = $this->attributes['before_photo'] ?? null;
        return $value ? url('/') . '/assets/images/services/before-after/' . $value : null;
    }

    public function getAfterPhotoAttribute()
    {
        $value = $this->attributes['after_photo'] ?? null;
        return $value ? url('/') . '/assets/images/services/before-after/' . $value : null;
    }

    /**
     * Raw stored file name (without URL prefix).
     */
    public function rawBefore()
    {
        return $this->attributes['before_photo'] ?? null;
    }

    public function rawAfter()
    {
        return $this->attributes['after_photo'] ?? null;
    }
}
