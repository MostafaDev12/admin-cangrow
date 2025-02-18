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


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/services/' . $this->attributes['photo'];
    }  
    public function getPhotoUrlAttribute()
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
        
        'short_details_ar',
        'short_details_en',
        'short_details_fr',
        
        'slug_ar',
        'slug_en',
        'slug_fr',
        'tags',
        'category_id',
      
    ];

    
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
