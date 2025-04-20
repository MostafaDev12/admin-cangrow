<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AfterBefore extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='after_before';
    
     protected $appends = ['photo'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/after_befores/' . $this->attributes['photo'];
    }
    protected $fillable = [
        
        'photo',
        'title_ar',
        'title_en',
        'title_fr',
       
      
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
