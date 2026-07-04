<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ServiceSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = ServiceSection::with('service')->orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(ServiceSection $data) {
                                $photo =  $data->image ? $data->image : asset('assets/images/noimage.png');

                                return  '<div><img style="width:200px;height:100px" src="'.$photo.'"></div>';
                            })
                            ->addColumn('service', function(ServiceSection $data) {
                                return $data->service ? $data->service->title_ar : '-';
                            })
                            ->editColumn('is_active', function(ServiceSection $data) {
                                return $data->is_active == 1 ? '<span class="badge bg-success">مفعل</span>' : '<span class="badge bg-danger">مخفي</span>';
                            })
                            ->addColumn('action', function(ServiceSection $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-service_sections-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                                <a href="javascript:;" data-href="' . route('admin-service_sections-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            })
                            ->rawColumns(['photo','is_active','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.service_sections.index');
    }

    //*** GET Request
    public function create()
    {
        $services = Service::orderBy('id','desc')->get();
        return view('admin.service_sections.create',compact('services'));
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
        $data = new ServiceSection();
        $input = $request->all();

        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/service_sections/',$name);

        $input['photo'] = $name;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-service_sections-index').'">View service sections Lists.</a>';
       //   return redirect(route('admin-service_sections-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends


    }

    //*** GET Request
    public function edit($id)
    {
        $data = ServiceSection::findOrFail($id);
        $services = Service::orderBy('id','desc')->get();
        return view('admin.service_sections.edit',compact('data','services'));
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
        $data = ServiceSection::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/service_sections/',$name);
            if($data->photo != null)
            {
                if (file_exists(public_path().'/assets/images/service_sections/'.$data->photo)) {
                    unlink(public_path().'/assets/images/service_sections/'.$data->photo);
                }
            }
        $input['photo'] = $name;
        }
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.<a href="'.route('admin-service_sections-index').'">View service sections Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = ServiceSection::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
