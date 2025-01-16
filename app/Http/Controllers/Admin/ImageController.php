<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Media;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Validator;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Image::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('media', function (Image $data) {
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
            ->editColumn('category', function (Image $data) {
                $media =  optional($data->category)->title_ar ?? '';
 
                return $media;
            })
            ->addColumn('action', function (Image $data) {
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
        return view('admin.image.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Category::get();

        return view('admin.image.create',compact('cats'));
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
        $data = new Image();
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
        $msg = 'New Data Added Successfully.<a href="' . route('admin-image-index') . '">View image Lists.</a>';
        //   return redirect(route('admin-image-index'))->with($msg);
        return response()->json($msg);
        //--- Redirect Section Ends    


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Image::findOrFail($id);
        $cats = Category::get();
        return view('admin.image.edit', compact('data','cats'));
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
        $data = Image::findOrFail($id);
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
        $msg = 'Data Updated Successfully.<a href="' . route('admin-image-index') . '">View image Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Image::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends     
    }
}
