<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='projects';
    
     protected $appends = ['photo','photo_url'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/projects/' . $this->attributes['photo'];
    }  
    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/projects/' . $this->attributes['photo'];
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
     
     public function parent()
     {
         return $this->belongsTo(Service::class,'parent_id');
     }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    
     
}
