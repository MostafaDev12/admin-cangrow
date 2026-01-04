<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Event;
use App\Models\Party;
use App\Models\Project;
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
              $type = $_GET['type'] ?? '';
            if($type == 'Project'){
                $prod = Project::findOrFail($id);
             
                if(count($prod->galleries))
                {
                    $data[0] = 1;
                    $data[1] = $prod->galleries;
                }

            }elseif($type == 'Event'){
                $prod = Event::findOrFail($id);
             
                if(count($prod->galleries))
                {
                    $data[0] = 1;
                    $data[1] = $prod->galleries;
                }

            }elseif($type == 'Party'){
                $prod = Party::findOrFail($id);
             
                if(count($prod->galleries))
                {
                    $data[0] = 1;
                    $data[1] = $prod->galleries;
                }

            }else{
             $prod = Service::findOrFail($id);
             
            if(count($prod->galleries))
            {
                $data[0] = 1;
                $data[1] = $prod->galleries;
            } 
            
        
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
        $project_id = $request->project_id;
        $event_id = $request->event_id;
        $party_id = $request->party_id;
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
                    
                    $gallery['service_id'] = $proid ?? null;
                    $gallery['project_id'] = $project_id ?? null;
                    $gallery['event_id'] = $event_id ?? null;
                    $gallery['party_id'] = $party_id ?? null;
                 
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
