<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Subcategory::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)

                            ->editColumn('photo', function(Subcategory $data) {
                                $photo =  $data->photo;
                              
                                return  '<div><img style="width:200px;height:100px" src="'.$photo.'"></div>';
                            })  
                            
                            ->editColumn('title_ar', function(Subcategory $data) {
                                $title =  $data->title_ar ??  $data->title_en;
                              
                                return  $title;
                            })

                            ->addColumn('category', function(Subcategory $data) {
                                return  optional($data->category)->title_ar;
                            }) 
                            ->addColumn('action', function(Subcategory $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-subcategories-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                             
                                
                              
                              <a href="javascript:;" data-href="' . route('admin-subcategories-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            }) 
                            ->rawColumns(['photo','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.subcategories.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Category::get();
        return view('admin.subcategories.create',compact('cats'));
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
        $data = new Subcategory();
        $input = $request->all();
        
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/subcategories/',$name);
                    
        $input['photo'] = $name;
        } 
        
         $input['slug_ar'] = str_replace(' ','-',$request->slug_ar);
         $input['slug_en'] = str_replace(' ','-',$request->slug_en);
         $input['slug_fr'] = str_replace(' ','-',$request->slug_fr);
         
        $data->fill($input)->save();
        //--- Logic Section Ends
      
        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-subcategories-index').'">View subcategories Lists.</a>';
       //   return redirect(route('admin-categories-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends    


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Subcategory::findOrFail($id);
        $cats = Category::get();
        return view('admin.subcategories.edit',compact('data','cats'));
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
        $data = Subcategory::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/subcategories/',$name);
            if($data->photo != null)
            {
                if (file_exists(public_path().'/assets/images/subcategories/'.$data->photo)) {
                    unlink(public_path().'/assets/images/subcategories/'.$data->photo);
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
        $msg = 'Data Updated Successfully.<a href="'.route('admin-subcategories-index').'">View subcategories Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Subcategory::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
