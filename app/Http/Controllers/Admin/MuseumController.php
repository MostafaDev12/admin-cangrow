<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Museum;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class MuseumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Museum::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(Museum $data) {
                                $photo =  $data->photo;
                              
                                return  '<div><img style="width:200px;height:100px" src="'.$photo.'"></div>';
                            })
                             ->addColumn('category', function(Museum $data) {
                                $photo =  optional($data->category)->title_ar ?? '';
                              
                                return  $photo;
                            })
                            ->addColumn('action', function(Museum $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-museums-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                             
                                
                                <a href="javascript:;" class="set-gallery btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#setgallery"><input type="hidden" value="'.$data->id.'"><i class="las la-eye"></i> View Gallery</a>
                               
                              
                              
                              <a href="javascript:;" data-href="' . route('admin-museums-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            }) 
                            ->rawColumns(['photo','action','category'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.museums.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Category::get();
        return view('admin.museums.create',compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
               'photo'      => '',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Museum();
        $input = $request->all();
        
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/museums/',$name);
                    
        $input['photo'] = $name;
        } 
        
         $input['slug_ar'] = str_replace(' ','-',$request->slug_ar);
         $input['slug_en'] = str_replace(' ','-',$request->slug_en);
         $input['slug_fr'] = str_replace(' ','-',$request->slug_fr);
         
        $data->fill($input)->save();
        //--- Logic Section Ends
      
        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-museums-index').'">View museums Lists.</a>';
       //   return redirect(route('admin-museums-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends    


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Museum::findOrFail($id);
        $cats = Category::get();
        return view('admin.museums.edit',compact('data','cats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
               'photo'      => '',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Museum::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/museums/',$name);
            if($data->photo != null)
            {
                if (file_exists(public_path().'/assets/images/museums/'.$data->photo)) {
                    unlink(public_path().'/assets/images/museums/'.$data->photo);
                }
            }            
        $input['photo'] = $name;
        } 
        
         $input['slug_ar'] = str_replace(' ','-',$request->slug_ar);
         $input['slug_en'] = str_replace(' ','-',$request->slug_en);
         $input['slug_fr'] = str_replace(' ','-',$request->slug_fr);
         
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.<a href="'.route('admin-museums-index').'">View museums Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Museum::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
