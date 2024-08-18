<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCategory extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='model_categories';
    
     protected $appends = ['photo'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/models/' . $this->attributes['photo'];
    }
    protected $fillable = [
        
        'photo',
        'title_ar',
        'title_en',
        'title_fr',
        'details_ar',
        'details_en',
        'details_fr',
      
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
