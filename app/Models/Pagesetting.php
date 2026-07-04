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

     'home_hero_title_ar',
     'home_hero_title_en',
     'home_hero_image',
     'home_hero_image_mobile',
     'home_hero_cta_text_ar',
     'home_hero_cta_text_en',
     'home_hero_cta_link',
     'home_about_badge_ar',
     'home_about_badge_en',
     'home_about_image',
     'home_about_cta_text_ar',
     'home_about_cta_text_en',
     'home_cards_title_ar',
     'home_cards_title_en',
     'home_cards_details_ar',
     'home_cards_details_en',
     'home_cards_cta_text_ar',
     'home_cards_cta_text_en',
     'home_clients_badge_ar',
     'home_clients_badge_en',
     'home_clients_title_ar',
     'home_clients_title_en',
     'home_clients_details_ar',
     'home_clients_details_en',
     'home_products_badge_ar',
     'home_products_badge_en',
     'home_products_title_ar',
     'home_products_title_en',
     'home_products_details_ar',
     'home_products_details_en',
     'home_products_cta_text_ar',
     'home_products_cta_text_en',
     'certificates_title_ar',
     'certificates_title_en',
     'certificates_subtitle_ar',
     'certificates_subtitle_en',
     'certificates_description_ar',
     'certificates_description_en',
     'home_contact_badge_ar',
     'home_contact_badge_en',
     'home_contact_title_ar',
     'home_contact_title_en',
     'home_contact_details_ar',
     'home_contact_details_en',
     'about_hero_badge_ar',
     'about_hero_badge_en',
     'about_hero_title_ar',
     'about_hero_title_en',
     'about_hero_details_ar',
     'about_hero_details_en',
     'about_hero_image',
     'about_side_image',
     'about_badge_ar',
     'about_badge_en',
     'about_features_title_ar',
     'about_features_title_en',
     'mission_title_ar',
     'mission_title_en',
     'mission_details_ar',
     'mission_details_en',

];

    public $timestamps = false;



    public function getAboutPhotoAttribute()
    {
        return !empty($this->attributes['about_photo']) ? url('/') . '/assets/images/' . $this->attributes['about_photo'] : '';
    }


    public function getHomeHeroImageAttribute()
    {
        return !empty($this->attributes['home_hero_image']) ? url('/') . '/assets/images/' . $this->attributes['home_hero_image'] : '';
    }


    public function getHomeHeroImageMobileAttribute()
    {
        return !empty($this->attributes['home_hero_image_mobile']) ? url('/') . '/assets/images/' . $this->attributes['home_hero_image_mobile'] : '';
    }


    public function getHomeAboutImageAttribute()
    {
        return !empty($this->attributes['home_about_image']) ? url('/') . '/assets/images/' . $this->attributes['home_about_image'] : '';
    }


    public function getAboutHeroImageAttribute()
    {
        return !empty($this->attributes['about_hero_image']) ? url('/') . '/assets/images/' . $this->attributes['about_hero_image'] : '';
    }


    public function getAboutSideImageAttribute()
    {
        return !empty($this->attributes['about_side_image']) ? url('/') . '/assets/images/' . $this->attributes['about_side_image'] : '';
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
