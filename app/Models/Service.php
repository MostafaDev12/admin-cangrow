<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $casts = ['is_published' => 'boolean'];

    public function getSlugArAttribute($value)
    {
        return $value ?: ($this->attributes['slug_en'] ?? null) ?: ($this->attributes['slug_fr'] ?? null);
    }

    public function getSlugEnAttribute($value)
    {
        return $value ?: ($this->attributes['slug_ar'] ?? null) ?: ($this->attributes['slug_fr'] ?? null);
    }

    public function getSlugFrAttribute($value)
    {
        return $value ?: ($this->attributes['slug_en'] ?? null) ?: ($this->attributes['slug_ar'] ?? null);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('publication', function ($query) {
            if (! request()->is('admin', 'admin/*')) {
                $query->where('is_published', true);
            }
        });
        static::updating(function (Service $service) {
            foreach (config('service_seo.locales') as $locale) {
                $column = 'slug_'.$locale;
                $old = $service->getRawOriginal($column);
                if ($service->isDirty($column) && filled($old)) {
                    \Illuminate\Support\Facades\DB::table('service_slug_histories')->updateOrInsert(
                        ['service_id' => $service->id, 'locale' => $locale, 'slug' => $old],
                        ['created_at' => now(), 'updated_at' => now()]
                    );
                }
            }
        });
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='services';
    
     protected $appends = ['photo','photo_url'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/services/' . $this->attributes['photo'];
    }  
    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/services/' . $this->attributes['photo'];
    }
    protected $fillable = [
        'is_published', 'og_image',
        'og_title_ar', 'og_title_en', 'og_title_fr',
        'og_description_ar', 'og_description_en', 'og_description_fr',
        
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
        
        'short_details_ar',
        'short_details_en',
        'short_details_fr',
        
        'slug_ar',
        'slug_en',
        'slug_fr',
        'short_details_ar',
        'short_details_en',
        'short_details_fr',
        'tags',
        'category_id',
        'parent_id',
      
    ];

    
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }    
    
    public function childs()
    {
        return $this->hasMany(Service::class,'parent_id');
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
