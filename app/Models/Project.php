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
    
     protected $appends = ['photo_url'];


    // public function getPhotoAttribute()
    // {
    //     return url('/') . '/assets/images/services/' . $this->attributes['photo'];
    // }  
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
        
        'slug_ar',
        'slug_en',
        'slug_fr',
         
       
      
    ];

      
    
     
}
