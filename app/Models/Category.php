<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='categories';
    
     protected $appends = ['photo'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/categories/' . $this->attributes['photo'];
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
        'tags',
        'icon',
        'short_details_ar',
        'short_details_en',
        'short_details_fr',
        'sort_order',
        'home_sort_order',
        'is_active',

    ];


    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function parentServices()
    {
        return $this->hasMany(Service::class)->where('parent_id','=',0);
    }
    public function activeServices()
    {
        return $this->hasMany(Service::class)->where('is_active','=',1)->orderBy('sort_order')->orderBy('id');
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    
     
}
