<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $appends = ['photo_url'];

    protected $fillable = [
        'name', 'photo',
        'review_ar', 'review_en', 'review_fr',
        'rating', 'service_name', 'location',
        'active', 'display_order',
    ];

    /**
     * Full URL to the avatar, or null when none uploaded
     * (frontend renders an initial-letter fallback).
     */
    public function getPhotoUrlAttribute()
    {
        $value = $this->attributes['photo'] ?? null;
        return $value ? url('/') . '/assets/images/testimonials/' . $value : null;
    }

    public function rawPhoto()
    {
        return $this->attributes['photo'] ?? null;
    }
}
