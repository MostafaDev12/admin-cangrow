<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Service::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(Service $data) {
                                $photo =  $data->photo;
                              
                                return  '<div><img style="width:200px;height:100px" src="'.$photo.'"></div>';
                            })
                            ->addColumn('action', function(Service $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-services-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                             
                                <a href="javascript:;" class="set-gallery btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#setgallery"><input type="hidden" value="'.$data->id.'"><i class="las la-eye"></i> View Gallery</a>
                               
                              
                              <a href="javascript:;" data-href="' . route('admin-services-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            }) 
                            ->rawColumns(['photo','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.services.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Category::get();
        return view('admin.services.create',compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = \App\Support\ServiceSeoValidation::rules($request);

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Service();
        $input = $request->except('og_image');
        if ($file = $request->file('og_image')) {
            $name = \Illuminate\Support\Str::uuid().'.'.$file->extension();
            $file->move(public_path('assets/images/services'), $name);
            $input['og_image'] = $name;
        }
        
        if ($file = $request->file('photo')) 
        {              
            $name = \Illuminate\Support\Str::uuid().'.'.$file->extension();
            $file->move(public_path('assets/images/services'), $name);
                    
        $input['photo'] = $name;
        } 
        
         if ($request->has('slug_ar')) { $input['slug_ar'] = str_replace(' ','-',trim($request->slug_ar ?? '')); }
         if ($request->has('slug_en')) { $input['slug_en'] = str_replace(' ','-',trim($request->slug_en ?? '')); }
         if ($request->has('slug_fr')) { $input['slug_fr'] = str_replace(' ','-',trim($request->slug_fr ?? '')); }
         
        $data->fill($input)->save();
        //--- Logic Section Ends
      
        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-services-index').'">View services Lists.</a>';
       //   return redirect(route('admin-services-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends    


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Service::findOrFail($id);
        $cats = Category::get();
        return view('admin.services.edit',compact('data','cats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = \App\Support\ServiceSeoValidation::rules($request, $id ?? null);

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Service::findOrFail($id);
        $input = $request->except('og_image');
        if ($file = $request->file('og_image')) {
            $name = \Illuminate\Support\Str::uuid().'.'.$file->extension();
            $file->move(public_path('assets/images/services'), $name);
            $input['og_image'] = $name;
        }
        if ($file = $request->file('photo')) 
        {              
            $name = \Illuminate\Support\Str::uuid().'.'.$file->extension();
            $file->move(public_path('assets/images/services'), $name);
            // Retain previous files: do not remove an image before the database save succeeds.
        $input['photo'] = $name;
        } 
        
         if ($request->has('slug_ar')) { $input['slug_ar'] = str_replace(' ','-',trim($request->slug_ar ?? '')); }
         if ($request->has('slug_en')) { $input['slug_en'] = str_replace(' ','-',trim($request->slug_en ?? '')); }
         if ($request->has('slug_fr')) { $input['slug_fr'] = str_replace(' ','-',trim($request->slug_fr ?? '')); }
         
        \Illuminate\Support\Facades\DB::transaction(fn () => $data->update($input));
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.<a href="'.route('admin-services-index').'">View services Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Service::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
