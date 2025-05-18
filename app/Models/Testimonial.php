<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='testimonials';
    
     
     protected $appends = ['photo_url'];


    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/testimonials/' . $this->attributes['photo'];
    }
 
    protected $fillable = [
        
        
        'name_ar',
        'name_en',
        'name_fr',
       
        
        'job_ar',
        'job_en',
        'job_fr',
       
         
         
        'details_ar',
        'details_en',
        'details_fr',
        
        'photo',
 
      
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
