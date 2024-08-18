<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\ModelCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ModelCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = ModelCategory::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(ModelCategory $data) {
                                $photo =  $data->photo;
                              
                                return  '<div><img style="width:200px;height:100px" src="'.$photo.'"></div>';
                            })
                            ->addColumn('action', function(ModelCategory $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-models_category-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                                <a href="javascript:;" data-href="' . route('admin-models_category-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            }) 
                            ->rawColumns(['photo','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.model_categories.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.model_categories.create');
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
        $data = new ModelCategory();
        $input = $request->all();
        
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/models/',$name);
                    
        $input['photo'] = $name;
        } 
        $data->fill($input)->save();
        //--- Logic Section Ends
      
        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-models_category-index').'">View category Lists.</a>';
       //   return redirect(route('admin-models-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends    


    }

    //*** GET Request
    public function edit($id)
    {
        $data = ModelCategory::findOrFail($id);
        return view('admin.model_categories.edit',compact('data'));
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
        $data = ModelCategory::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/models/',$name);
            if($data->photo != null)
            {
                if (file_exists(public_path().'/assets/images/models/'.$data->photo)) {
                    unlink(public_path().'/assets/images/models/'.$data->photo);
                }
            }            
        $input['photo'] = $name;
        } 
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.<a href="'.route('admin-models_category-index').'">View category Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = ModelCategory::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
