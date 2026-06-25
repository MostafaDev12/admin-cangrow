<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $appends = ['photo_url'];

    protected $fillable = [
        'name_ar', 'name_en',
        'title_ar', 'title_en',
        'photo',
        'bio_ar', 'bio_en',
        'active', 'display_order',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'doctor_id');
    }

    public function getPhotoUrlAttribute()
    {
        $value = $this->attributes['photo'] ?? null;
        return $value ? url('/') . '/assets/images/doctors/' . $value : null;
    }

    public function rawPhoto()
    {
        return $this->attributes['photo'] ?? null;
    }
}
