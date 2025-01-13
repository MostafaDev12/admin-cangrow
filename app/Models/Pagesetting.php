<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagesetting extends Model
{
    
    protected $fillable = [ 
     'about_title_en', 
     'about_title_fr', 
     'about_title_ar',
     'about_details_en', 
     'about_details_fr', 
     'about_details_ar',
     'about_photo',
     
     'portfolio_title_en', 
     'portfolio_title_fr', 
     'portfolio_title_ar',
     'portfolio_details_en', 
     'portfolio_details_fr', 
     'portfolio_details_ar',
     'portfolio_photo',
   
     
     'factory_title_en', 
     'factory_title_fr', 
     'factory_title_ar',
     'factory_details_en', 
     'factory_details_fr', 
     'factory_details_ar',
     'factory_photo',
     
     'business_title_en', 
     'business_title_fr', 
     'business_title_ar',
     'business_details_en', 
     'business_details_fr', 
     'business_details_ar',
     'business_photo',
     
];

    public $timestamps = false;



    public function getAboutPhotoAttribute()
    {
        return !empty($this->attributes['about_photo']) ? url('/') . '/assets/images/' . $this->attributes['about_photo'] : '';
    }


    public function getFactoryPhotoAttribute()
    {
        return !empty($this->attributes['factory_photo']) ? url('/') . '/assets/images/' . $this->attributes['factory_photo'] : '';
    }


    public function getBusinessPhotoAttribute()
    {
        return !empty($this->attributes['business_photo']) ? url('/') . '/assets/images/' . $this->attributes['business_photo'] : '';
    }


    public function getPortfolioPhotoAttribute()
    {
        return !empty($this->attributes['portfolio_photo']) ? url('/') . '/assets/images/' . $this->attributes['portfolio_photo'] : '';
    }


 

    
    public function upload($name,$file,$oldname)
    {
                $file->move('assets/images',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$oldname)) {
                        unlink(public_path().'/assets/images/'.$oldname);
                    }
                }
    }
}
