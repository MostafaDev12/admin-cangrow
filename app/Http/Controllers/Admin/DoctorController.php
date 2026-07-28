<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Traits\ManagesUploads;
use App\Models\Doctor;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class DoctorController extends Controller
{
    use ManagesUploads;

    protected $folder = 'assets/images/doctors';

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function datatables()
    {
        $datas = Doctor::orderBy('display_order')->orderBy('id', 'desc')->get();

        return Datatables::of($datas)
            ->editColumn('photo', function (Doctor $data) {
                $src = $data->photo_url ?: asset('assets/images/noimage.png');
                return '<img style="width:55px;height:55px;border-radius:50%;object-fit:cover" src="' . $src . '">';
            })
            ->addColumn('name', function (Doctor $data) {
                return e($data->name_ar ?: $data->name_en);
            })
            ->addColumn('title', function (Doctor $data) {
                return e($data->title_ar ?: $data->title_en);
            })
            ->addColumn('status', function (Doctor $data) {
                return $data->active
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('featured', function (Doctor $data) {
                return $data->featured
                    ? '<span class="badge bg-warning"><i class="fas fa-star"></i> Featured</span>'
                    : '<span class="badge bg-light text-dark">—</span>';
            })
            ->addColumn('action', function (Doctor $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-doctors-edit', $data->id) . '"><i class="las la-edit"></i></a>
                    <a href="javascript:;" data-href="' . route('admin-doctors-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['photo', 'status', 'featured', 'action'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.doctors.index');
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar'       => 'required|string|max:191',
            'title_ar'      => 'nullable|string|max:191',
            'display_order' => 'nullable|integer',
            'photo'         => $this->imageRules(false),
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->except('photo');
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['featured'] = $request->has('featured') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;
        if ($file = $request->file('photo')) {
            $input['photo'] = $this->storeImage($file, $this->folder);
        }

        Doctor::create($input);

        return response()->json('New doctor added successfully. <a href="' . route('admin-doctors-index') . '">View list</a>');
    }

    public function edit($id)
    {
        $data = Doctor::findOrFail($id);
        return view('admin.doctors.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Doctor::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name_ar'       => 'required|string|max:191',
            'title_ar'      => 'nullable|string|max:191',
            'display_order' => 'nullable|integer',
            'photo'         => $this->imageRules(false),
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->except('photo');
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['featured'] = $request->has('featured') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;
        if ($file = $request->file('photo')) {
            $new = $this->storeImage($file, $this->folder);
            $this->deleteImage($data->rawPhoto(), $this->folder);
            $input['photo'] = $new;
        }

        $data->update($input);

        return response()->json('Doctor updated successfully. <a href="' . route('admin-doctors-index') . '">View list</a>');
    }

    public function destroy($id)
    {
        $data = Doctor::findOrFail($id);
        $this->deleteImage($data->rawPhoto(), $this->folder);
        $data->delete();

        return response()->json('Doctor deleted successfully.');
    }
}
