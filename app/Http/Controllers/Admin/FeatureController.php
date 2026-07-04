<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Feature::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(Feature $data) {
                                $photo =  $data->photo;

                                return  '<div><img style="width:200px;height:100px" src="'.$photo.'"></div>';
                            })
                            ->editColumn('section', function(Feature $data) {
                                $sections = [
                                    'home_flip'       => 'كروت الرئيسية (فليب)',
                                    'about_values'    => 'قيم صفحة من نحن',
                                    'about_checklist' => 'مميزات المنتجات - من نحن',
                                ];

                                return isset($sections[$data->section]) ? $sections[$data->section] : $data->section;
                            })
                            ->editColumn('is_active', function(Feature $data) {
                                return $data->is_active == 1 ? '<span class="badge bg-success">مفعل</span>' : '<span class="badge bg-danger">مخفي</span>';
                            })
                            ->addColumn('action', function(Feature $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-features-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                                <a href="javascript:;" data-href="' . route('admin-features-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            })
                            ->rawColumns(['photo','is_active','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.features.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.features.create');
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
        $data = new Feature();
        $input = $request->all();

        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/features/',$name);

        $input['photo'] = $name;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-features-index').'">View features Lists.</a>';
       //   return redirect(route('admin-features-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Feature::findOrFail($id);
        return view('admin.features.edit',compact('data'));
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
        $data = Feature::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/features/',$name);
            if($data->getAttributes()['photo'] != null)
            {
                if (file_exists(public_path().'/assets/images/features/'.$data->getAttributes()['photo'])) {
                    unlink(public_path().'/assets/images/features/'.$data->getAttributes()['photo']);
                }
            }
        $input['photo'] = $name;
        }
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.<a href="'.route('admin-features-index').'">View features Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Feature::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
