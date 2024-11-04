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
     'after_photo',
     'before_photo',
     'our_team_title_ar',
     'our_team_details_ar',
     'our_team_title_en',
     'our_team_details_en',
   
];

    public $timestamps = false;



    public function getAboutPhotoAttribute()
    {
        return !empty($this->attributes['about_photo']) ? url('/') . '/assets/images/' . $this->attributes['about_photo'] : '';
    }


    public function getPortfolioPhotoAttribute()
    {
        return !empty($this->attributes['portfolio_photo']) ? url('/') . '/assets/images/' . $this->attributes['portfolio_photo'] : '';
    }


 
    public function getAfterPhotoAttribute()
    {
        return !empty($this->attributes['after_photo']) ? url('/') . '/assets/images/' . $this->attributes['after_photo'] : '';
    }


 
    public function getBeforePhotoAttribute()
    {
        return !empty($this->attributes['before_photo']) ? url('/') . '/assets/images/' . $this->attributes['before_photo'] : '';
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
