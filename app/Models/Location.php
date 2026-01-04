<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='locations';
    
     
 
    protected $fillable = [
        
        
        'title_ar',
        'title_en',
        'title_fr',
       
        'date_ar',
        'date_en',
        'date_fr',
        
        'address_ar',
        'address_en',
        'address_fr',
       
         
        'details_ar',
        'details_en',
        'details_fr',

        'map',
        'book_link',
       
      
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
