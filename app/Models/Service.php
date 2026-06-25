<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='services';
    
     protected $appends = ['photo'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/services/' . $this->attributes['photo'];
    }
    protected $fillable = [
        
        'photo',
        'title_ar',
        'title_en',
        'title_fr',
        'details_ar',
        'details_en',
        'details_fr',
       'meta_title_ar',
        'meta_title_en',
        'meta_title_fr',
        'meta_details_ar',
        'meta_details_en',
        'meta_details_fr',
        
        'slug_ar',
        'slug_en',
        'slug_fr',
        'short_details_ar',
        'short_details_en',
        'short_details_fr',
        'tags',
        'category_id',
        'video_enabled',
        'youtube_video_url',
        'video_badge_ar', 'video_badge_en', 'video_badge_fr',
        'video_heading_ar', 'video_heading_en', 'video_heading_fr',
        'video_description_ar', 'video_description_en', 'video_description_fr',
        'video_button_text_ar', 'video_button_text_en', 'video_button_text_fr',
        'video_button_link', 'video_thumbnail', 'video_title', 'video_order',
        'mt_featured', 'mt_order',
    ];


    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function beforeAfters()
    {
        return $this->hasMany(BeforeAfter::class)->orderBy('display_order')->orderBy('id');
    }

    public function activeBeforeAfters()
    {
        return $this->hasMany(BeforeAfter::class)->where('active', 1)->orderBy('display_order')->orderBy('id');
    }

    /**
     * Extract a YouTube video id from any accepted URL form
     * (watch, youtu.be, embed, shorts, or a bare id).
     */
    public function getYoutubeIdAttribute()
    {
        $value = trim((string) ($this->attributes['youtube_video_url'] ?? ''));
        if ($value === '') {
            return '';
        }
        if (str_contains($value, 'youtube.com') || str_contains($value, 'youtu.be')) {
            preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^\&\?\/]+)/', $value, $m);
            return $m[1] ?? '';
        }
        return $value;
    }

    /**
     * Full URL to an optional custom video thumbnail.
     */
    public function getVideoThumbnailUrlAttribute()
    {
        $value = $this->attributes['video_thumbnail'] ?? null;
        return $value ? url('/') . '/assets/images/videos/' . $value : null;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

     public function category()
     {
         return $this->belongsTo(Category::class,'category_id');
     }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    
     
}
