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
    
     protected $appends = ['photo','photo_url'];

    protected $casts = ['is_published' => 'boolean'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/services/' . $this->attributes['photo'];
    }  
    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/services/' . $this->attributes['photo'];
    }
    protected $fillable = [
        
        'og_image', 'is_published', 'og_title_ar', 'og_title_en', 'og_title_fr', 'og_description_ar', 'og_description_en', 'og_description_fr',
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
        'tags',
        'category_id',
      
    ];

    
    protected static function booted()
    {
        static::updating(function (self $service) {
            foreach (['ar', 'en', 'fr'] as $locale) {
                $old = $service->getRawOriginal('slug_'.$locale);
                if (filled($old) && $service->isDirty('slug_'.$locale)) {
                    \Illuminate\Support\Facades\DB::table('service_slug_redirects')->updateOrInsert(
                        ['locale' => $locale, 'slug' => $old], ['service_id' => $service->id]
                    );
                }
            }
        });
        static::addGlobalScope('published', function (\Illuminate\Database\Eloquent\Builder $query) {
            if (!request()->is('admin', 'admin/*')) {
                $query->where('services.is_published', true);
            }
        });
    }

    public static function forPublicSlug(string $slug, string $locale): ?self
    {
        $service = static::where('slug_'.$locale, $slug)->first();
        if ($service) {
            return $service;
        }
        $id = \Illuminate\Support\Facades\DB::table('service_slug_redirects')->where('locale', $locale)->where('slug', $slug)->value('service_id');

        return ($id ? static::find($id) : null) ?: static::where('slug_ar', $slug)->orWhere('slug_en', $slug)->orWhere('slug_fr', $slug)->first();
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
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
