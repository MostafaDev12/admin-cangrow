<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Event::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(Event $data) {
                                $photo =  $data->photo;
                              
                                return  '<div><img style="width:200px;height:100px" src="'.$photo.'"></div>';
                            })
                             ->addColumn('category', function(Event $data) {
                                $photo =  optional($data->category)->title_ar ?? '';
                              
                                return  $photo;
                            })
                            ->addColumn('action', function(Event $data) {
                                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-events-edit',$data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                             
                                
                              
                              <a href="javascript:;" data-href="' . route('admin-events-delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
                            }) 
                            ->rawColumns(['photo','action','category'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.events.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Category::get();
        return view('admin.events.create',compact('cats'));
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
        $data = new Event();
        $input = $request->all();
        
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/events/',$name);
                    
        $input['photo'] = $name;
        } 
        
         $input['slug_ar'] = str_replace(' ','-',$request->slug_ar);
         $input['slug_en'] = str_replace(' ','-',$request->slug_en);
         $input['slug_fr'] = str_replace(' ','-',$request->slug_fr);
         
        $data->fill($input)->save();
        //--- Logic Section Ends
      
        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="'.route('admin-events-index').'">View events Lists.</a>';
       //   return redirect(route('admin-events-index'))->with($msg);
      return response()->json($msg);
        //--- Redirect Section Ends    


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Event::findOrFail($id);
        $cats = Category::get();
        return view('admin.events.edit',compact('data','cats'));
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
        $data = Event::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) 
        {              
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/events/',$name);
            if($data->photo != null)
            {
                if (file_exists(public_path().'/assets/images/events/'.$data->photo)) {
                    unlink(public_path().'/assets/images/events/'.$data->photo);
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
        $msg = 'Data Updated Successfully.<a href="'.route('admin-events-index').'">View events Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Event::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
