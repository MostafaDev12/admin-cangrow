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
        'active', 'featured', 'display_order',
    ];

    /**
     * Active doctors in the order they should appear on the website.
     */
    public function scopeForWebsite($query)
    {
        return $query->where('active', 1)
            ->orderBy('display_order')
            ->orderBy('id');
    }

    /**
     * Localized name / title / bio with a fallback to the other language.
     */
    public function localized(string $field, string $sign)
    {
        $sign = $sign === 'en' ? 'en' : 'ar';
        $other = $sign === 'en' ? 'ar' : 'en';

        return $this->{$field . '_' . $sign} ?: $this->{$field . '_' . $other};
    }

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
