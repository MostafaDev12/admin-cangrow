<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='doctors';
    
     
     protected $appends = ['photo_url'];


    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/doctors/' . $this->attributes['photo'];
    }
 
    protected $fillable = [
        
        
        'name_ar',
        'name_en',
        'name_fr',
       
        
        'title_ar',
        'title_en',
        'title_fr',
       
        'facebook',
        'twitter',
        'linkedin',
         
         
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
