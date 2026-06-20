<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Traits\ManagesUploads;
use App\Models\Testimonial;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class TestimonialController extends Controller
{
    use ManagesUploads;

    protected $folder = 'assets/images/testimonials';

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function datatables()
    {
        $datas = Testimonial::orderBy('display_order')->orderBy('id', 'desc')->get();

        return Datatables::of($datas)
            ->editColumn('photo', function (Testimonial $data) {
                $src = $data->photo_url ?: asset('assets/images/noimage.png');
                return '<img style="width:60px;height:60px;border-radius:50%;object-fit:cover" src="' . $src . '">';
            })
            ->addColumn('rating_stars', function (Testimonial $data) {
                return str_repeat('★', (int) $data->rating) . str_repeat('☆', 5 - (int) $data->rating);
            })
            ->addColumn('status', function (Testimonial $data) {
                return $data->active
                    ? '<span class="badge bg-success">' . 'Active' . '</span>'
                    : '<span class="badge bg-danger">' . 'Inactive' . '</span>';
            })
            ->addColumn('action', function (Testimonial $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-testimonials-edit', $data->id) . '"><i class="las la-edit"></i></a>
                    <a href="javascript:;" data-href="' . route('admin-testimonials-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['photo', 'status', 'action'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.testimonials.index');
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:191',
            'rating'        => 'required|integer|min:1|max:5',
            'display_order' => 'nullable|integer',
            'photo'         => $this->imageRules(false),
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->except('photo');
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;

        if ($file = $request->file('photo')) {
            $input['photo'] = $this->storeImage($file, $this->folder);
        }

        Testimonial::create($input);

        $msg = 'New testimonial added successfully.' . ' <a href="' . route('admin-testimonials-index') . '">' . 'View list' . '</a>';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Testimonial::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:191',
            'rating'        => 'required|integer|min:1|max:5',
            'display_order' => 'nullable|integer',
            'photo'         => $this->imageRules(false),
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->except('photo');
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;

        if ($file = $request->file('photo')) {
            $new = $this->storeImage($file, $this->folder);
            $this->deleteImage($data->rawPhoto(), $this->folder);
            $input['photo'] = $new;
        }

        $data->update($input);

        $msg = 'Testimonial updated successfully.' . ' <a href="' . route('admin-testimonials-index') . '">' . 'View list' . '</a>';
        return response()->json($msg);
    }

    public function destroy($id)
    {
        $data = Testimonial::findOrFail($id);
        $this->deleteImage($data->rawPhoto(), $this->folder);
        $data->delete();

        return response()->json('Testimonial deleted successfully.');
    }
}
