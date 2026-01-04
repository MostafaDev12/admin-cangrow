<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='timelines';
    
     
     protected $appends = ['photo_url'];


    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/timelines/' . $this->attributes['photo'];
    }
 
    protected $fillable = [
        
        
       
        'title_ar',
        'title_en',
        'title_fr',
       
       
         
        'details_ar',
        'details_en',
        'details_fr',
        
        'photo',
        'year',
 
      
    ];

    
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
