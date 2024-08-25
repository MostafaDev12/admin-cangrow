<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Media::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('media', function (Media $data) {
                $media =  $data->media;

                if ($data->type == 'photo') {

                    $html = '<div><img style="width:200px;height:100px" src="' . $media . '"></div>';
                } else {

                    $html = '<div>  <video width="200" height="100" controls>
                                                <source src="' . $media . '" type="video/' . $data->ext . '">
                                                <source src="video.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                           </video></div>';
                }

                return $html;
            })
            ->addColumn('action', function (Media $data) {
                return '<div class="action-list">
                                <a class=" btn btn-sm btn-secondary" href="' . route('admin-media-edit', $data->id) . '"> <i class="las la-edit"></i>تعديل</a>
                                <a href="javascript:;" data-href="' . route('admin-media-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                                </div>';
            })
            ->rawColumns(['media', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.media.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.media.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'media'      => '',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Media();
        $input = $request->all();

        if ($file = $request->file('media')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images/media/', $name);


            $input['ext'] = $file->getClientOriginalExtension();
            if (in_array($input['ext'], ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $input['type'] = 'photo';
            } elseif (in_array($input['ext'], ['mp4', 'avi', 'mov'])) {
                $input['type'] = 'video';
            } else {
                $input['type'] = 'unknown'; // Handle other file types as needed
            }

            $input['media'] = $name;
        }



        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.<a href="' . route('admin-media-index') . '">View media Lists.</a>';
        //   return redirect(route('admin-media-index'))->with($msg);
        return response()->json($msg);
        //--- Redirect Section Ends    


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Media::findOrFail($id);
        return view('admin.media.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'media'      => '',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Media::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('media')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images/media/', $name);
            if ($data->media != null) {
                if (file_exists(public_path() . '/assets/images/media/' . $data->media)) {
                    unlink(public_path() . '/assets/images/media/' . $data->media);
                }
            }


            $input['ext'] = $file->getClientOriginalExtension();
            if (in_array($input['ext'], ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $input['type'] = 'photo';
            } elseif (in_array($input['ext'], ['mp4', 'avi', 'mov'])) {
                $input['type'] = 'video';
            } else {
                $input['type'] = 'unknown'; // Handle other file types as needed
            }
            $input['media'] = $name;
        }
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.<a href="' . route('admin-media-index') . '">View media Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Media::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends     
    }
}
