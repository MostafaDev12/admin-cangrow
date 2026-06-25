<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicalTourismBlock;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class MedicalTourismBlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    protected $labels = [
        'benefit' => 'Benefit',
        'journey' => 'Journey Step',
        'support' => 'Support Item',
        'faq'     => 'FAQ',
    ];

    protected function validType($type)
    {
        abort_unless(in_array($type, MedicalTourismBlock::TYPES), 404);
        return $type;
    }

    public function datatables($type)
    {
        $type = $this->validType($type);
        $datas = MedicalTourismBlock::type($type)->orderBy('display_order')->orderBy('id')->get();

        return Datatables::of($datas)
            ->addColumn('title', function (MedicalTourismBlock $d) {
                return e($d->title_ar ?: $d->title_en);
            })
            ->addColumn('status', function (MedicalTourismBlock $d) {
                return $d->active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function (MedicalTourismBlock $d) use ($type) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-mt-blocks-edit', [$type, $d->id]) . '"><i class="las la-edit"></i></a>
                    <a href="javascript:;" data-href="' . route('admin-mt-blocks-delete', [$type, $d->id]) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['status', 'action'])
            ->toJson();
    }

    public function index($type)
    {
        $type = $this->validType($type);
        $label = $this->labels[$type];
        return view('admin.medical_tourism.blocks_index', compact('type', 'label'));
    }

    public function create($type)
    {
        $type = $this->validType($type);
        $label = $this->labels[$type];
        return view('admin.medical_tourism.block_create', compact('type', 'label'));
    }

    public function store(Request $request, $type)
    {
        $type = $this->validType($type);

        $validator = Validator::make($request->all(), [
            'title_ar'      => 'required|string|max:500',
            'display_order' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->only(['icon', 'title_ar', 'title_en', 'description_ar', 'description_en']);
        $input['type'] = $type;
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;

        MedicalTourismBlock::create($input);

        return response()->json($this->labels[$type] . ' added successfully. <a href="' . route('admin-mt-blocks-index', $type) . '">View list</a>');
    }

    public function edit($type, $id)
    {
        $type = $this->validType($type);
        $label = $this->labels[$type];
        $data = MedicalTourismBlock::where('type', $type)->findOrFail($id);
        return view('admin.medical_tourism.block_edit', compact('data', 'type', 'label'));
    }

    public function update(Request $request, $type, $id)
    {
        $type = $this->validType($type);
        $data = MedicalTourismBlock::where('type', $type)->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title_ar'      => 'required|string|max:500',
            'display_order' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->only(['icon', 'title_ar', 'title_en', 'description_ar', 'description_en']);
        $input['active'] = $request->has('active') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;

        $data->update($input);

        return response()->json($this->labels[$type] . ' updated successfully. <a href="' . route('admin-mt-blocks-index', $type) . '">View list</a>');
    }

    public function destroy($type, $id)
    {
        $type = $this->validType($type);
        MedicalTourismBlock::where('type', $type)->findOrFail($id)->delete();
        return response()->json($this->labels[$type] . ' deleted successfully.');
    }
}
