<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Service;
use Image;

class GalleryController extends Controller
{

    public function __construct()
    {
      
    }

    public function show()
    {
        $data[0] = 0;
        $id = $_GET['id'] ?? '';
     
        
        if($id){
             $prod = Service::findOrFail($id);
             
         if(count($prod->galleries))
        {
            $data[0] = 1;
            $data[1] = $prod->galleries;
        } 
        
        
        }
        
          
        return response()->json($data);              
    }    
    public function mobileshow()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $prod = Service::findOrFail($id);
        if(count($prod->mobilegalleries))
        {
            $data[0] = 1;
            $data[1] = $prod->mobilegalleries;
        }
        return response()->json($data);              
    }  

    public function store(Request $request)
    { 
        $data = null;
        $lastid = $request->category_id;
        $proid = $request->service_id;
        $subcategory_id = $request->subcategory_id;
        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                $val = $file->getClientOriginalExtension();
                if($val == 'jpeg'|| $val == 'jpg'|| $val == 'png'|| $val == 'svg' || $val == 'webp')
                  {
                    $gallery = new Gallery;


                    $thumbnail = time().str_random(8).'.'.$val;
                    $file->move(public_path().'/assets/images/galleries/', $thumbnail);

                    $gallery['photo'] = $thumbnail;
                    
                    $gallery['service_id'] = $proid;
                 
                    $gallery->save();
                    $data[] = $gallery;                        
                  }
            }
        }
        return response()->json($data);      
    }   
    
    public function storemobile(Request $request)
    { 
        $data = null;
        $lastid = $request->category_id;
        $proid = $request->service_id;
        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                $val = $file->getClientOriginalExtension();
                if($val == 'jpeg'|| $val == 'jpg'|| $val == 'png'|| $val == 'svg'  || $val == 'webp')
                  {
                    $gallery = new Gallery;


       
                    $thumbnail = time().str_random(8).'.'.$val;
                    $file->move(public_path().'/assets/images/galleries/', $thumbnail);


                    $gallery['photo'] = $thumbnail;
                  
                    $gallery['service_id'] = $proid;
                   
                    $gallery->save();
                    $data[] = $gallery;                        
                  }
            }
        }
        return response()->json($data);      
    } 

    public function destroy()
    {

        $id = $_GET['id'];
        $gal = Gallery::findOrFail($id);
            if (file_exists(public_path().'/assets/images/galleries/'.$gal->photo)) {
                unlink(public_path().'/assets/images/galleries/'.$gal->photo);
            }
        $gal->delete();
            
    } 

}
