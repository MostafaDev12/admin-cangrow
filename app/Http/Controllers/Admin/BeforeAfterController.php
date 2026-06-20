<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Traits\ManagesUploads;
use App\Models\BeforeAfter;
use App\Models\Service;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class BeforeAfterController extends Controller
{
    use ManagesUploads;

    protected $folder = 'assets/images/services/before-after';

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function datatables(Request $request)
    {
        $query = BeforeAfter::with('service')->orderBy('display_order')->orderBy('id', 'desc');

        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        $datas = $query->get();

        return Datatables::of($datas)
            ->editColumn('before_photo', function (BeforeAfter $data) {
                $b = $data->before_photo ?: asset('assets/images/noimage.png');
                $a = $data->after_photo ?: asset('assets/images/noimage.png');
                return '<img style="width:70px;height:50px;object-fit:cover;margin:2px" src="' . $b . '"><img style="width:70px;height:50px;object-fit:cover;margin:2px" src="' . $a . '">';
            })
            ->addColumn('service_name', function (BeforeAfter $data) {
                return $data->service->title_ar ?? $data->service->title_en ?? '—';
            })
            ->addColumn('status', function (BeforeAfter $data) {
                return $data->active
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function (BeforeAfter $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-before-after-edit', $data->id) . '"><i class="las la-edit"></i></a>
                    <a href="javascript:;" data-href="' . route('admin-before-after-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['before_photo', 'status', 'action'])
            ->toJson();
    }

    public function index(Request $request)
    {
        $serviceId = $request->service_id;
        return view('admin.before_after.index', compact('serviceId'));
    }

    public function create()
    {
        return view('admin.before_after.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_id'    => 'required|integer|exists:services,id',
            'before_photo'  => $this->imageRules(true),
            'after_photo'   => $this->imageRules(true),
            'display_order' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->except(['before_photo', 'after_photo']);
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;
        $input['before_photo'] = $this->storeImage($request->file('before_photo'), $this->folder);
        $input['after_photo']  = $this->storeImage($request->file('after_photo'), $this->folder);

        BeforeAfter::create($input);

        $msg = 'New case added successfully. <a href="' . route('admin-before-after-index') . '">View list</a>';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = BeforeAfter::findOrFail($id);
        return view('admin.before_after.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = BeforeAfter::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'service_id'    => 'required|integer|exists:services,id',
            'before_photo'  => $this->imageRules(false),
            'after_photo'   => $this->imageRules(false),
            'display_order' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->except(['before_photo', 'after_photo']);
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;

        if ($file = $request->file('before_photo')) {
            $new = $this->storeImage($file, $this->folder);
            $this->deleteImage($data->rawBefore(), $this->folder);
            $input['before_photo'] = $new;
        }
        if ($file = $request->file('after_photo')) {
            $new = $this->storeImage($file, $this->folder);
            $this->deleteImage($data->rawAfter(), $this->folder);
            $input['after_photo'] = $new;
        }

        $data->update($input);

        $msg = 'Case updated successfully. <a href="' . route('admin-before-after-index') . '">View list</a>';
        return response()->json($msg);
    }

    public function destroy($id)
    {
        $data = BeforeAfter::findOrFail($id);
        $this->deleteImage($data->rawBefore(), $this->folder);
        $this->deleteImage($data->rawAfter(), $this->folder);
        $data->delete();

        return response()->json('Case deleted successfully.');
    }
}
