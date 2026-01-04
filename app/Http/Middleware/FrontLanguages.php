<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
use App\Models\Language;
use Session;

class FrontLanguages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
 
        if (!Session::has('front_language')) 
        {
       
        $lang =  Language::where('is_default', '1')->first();
        if ($lang) {
            $locale = $lang->name;
            App::setLocale($locale);

            // Load the JSON file
            $filePath = resource_path("lang/{$locale}.json");

            if (File::exists($filePath)) {
                $translations = json_decode(File::get($filePath), true);
               
                // foreach ($translations as $key => $value) {
                    
                //     if(empty($value)){
                //         break;
                //     }
  
                //     app('translator')->addLines([$key => $value], $locale);

                // }
            }
           
            session(['front_language' => $locale]);
            session(['front_language_photo' => $lang->photo]);
            $language_duraction = $lang->rtl == 1 ? 'rtl' :  'ltr';
            session(['front_language_duraction' => $language_duraction]);
            session(['sign' => $lang->sign]);
        }

            
        }
        else
        { 
            
            $lang = Language::where('name',Session::get('front_language'))->first();
            if(empty($lang)){
               
                $lang =  Language::where('is_default', '1')->first();
                App::setlocale($lang->name);
                session(['front_language' => $lang->name]);
                session(['front_language_photo' => $lang->photo]);

                $language_duraction = $lang->rtl == 1 ? 'rtl' :  'ltr';
                session(['front_language_duraction' => $language_duraction]);

                session(['sign' => $lang->sign]);
            } else{


                App::setlocale($lang->name);
                session(['front_language' => $lang->name]);
                session(['front_language_photo' => $lang->photo]);
                $language_duraction = $lang->rtl == 1 ? 'rtl' :  'ltr';
                session(['front_language_duraction' => $language_duraction]);
                session(['sign' => $lang->sign]);
            }
            
        }  






        return $next($request);
    }
}
