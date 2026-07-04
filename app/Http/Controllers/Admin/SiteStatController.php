<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\SiteStat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class SiteStatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = SiteStat::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('section', function(SiteStat $data) {
                                $sections = [
                                    'home_hero'  => 'إحصائيات الهيرو - الرئيسية',
                                    'home_about' => 'من نحن - الرئيسية',
                                    'about_page' => 'صفحة من نحن',
                                ];

                                return isset($sections[$data->section]) ? $sections[$data->section] : $data->section;
                            })
                            ->editColumn('is_active', function(SiteStat $data) {
                                return $data->is_active == 1 ? '<span class="badge bg-success">مفعل</span>' : '<span class="badge bg-danger">مخفي</span>';
                            })
                            ->addColumn('action', function(SiteStat $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-site_stats-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                                <a href="javascript:;" data-href="' . route('admin-site_stats-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            })
                            ->rawColumns(['is_active','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.site_stats.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.site_stats.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
               'section'    => 'required',
               'value'      => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new SiteStat();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-site_stats-index').'">View site stats Lists.</a>';
       //   return redirect(route('admin-site_stats-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends


    }

    //*** GET Request
    public function edit($id)
    {
        $data = SiteStat::findOrFail($id);
        return view('admin.site_stats.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
               'section'    => 'required',
               'value'      => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = SiteStat::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.<a href="'.route('admin-site_stats-index').'">View site stats Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = SiteStat::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
