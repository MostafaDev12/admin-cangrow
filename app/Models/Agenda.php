<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='agendas';
    
     
 
    protected $fillable = [
        
        
        'title_ar',
        'title_en',
        'title_fr',
       
        'details_ar',
        'details_en',
        'details_fr',

        'date',
        
        'location_ar',
        'location_en',
        'location_fr',

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
