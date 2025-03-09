<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='media';
    
     
    protected $fillable = [
        
        'media',
        'ext',
        'type',
        'youtube_url',
        'title_ar',
        'title_en',
        'title_fr',
        'details_ar',
        'details_en',
        'details_fr',
      
    ];
 
    public function getMediaAttribute()
    {
        return url('/') . '/assets/images/media/' . $this->attributes['media'];
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
