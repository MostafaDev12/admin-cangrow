<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\AboutFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AboutFeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function datatables()
    {
        $datas = AboutFeature::orderBy('id', 'desc')->get();
        return Datatables::of($datas)
            ->addColumn('icon_preview', function (AboutFeature $data) {
                return '<span class="' . e($data->icon) . '" style="font-size:24px;"></span>';
            })
            ->addColumn('type_label', function (AboutFeature $data) {
                $labels = ['feature' => 'ميزة', 'value' => 'قيمة'];
                return $labels[$data->type] ?? $data->type;
            })
            ->addColumn('action', function (AboutFeature $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-about_features-edit', $data->id) . '"><i class="las la-edit"></i></a>
                    <a href="javascript:;" data-href="' . route('admin-about_features-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['icon_preview', 'type_label', 'action'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.about_features.index');
    }

    public function create()
    {
        return view('admin.about_features.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'icon' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new AboutFeature();
        $input = $request->all();
        $data->fill($input)->save();

        $msg = 'New Data Added Successfully.<a href="' . route('admin-about_features-index') . '">View list.</a>';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = AboutFeature::findOrFail($id);
        return view('admin.about_features.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'icon' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = AboutFeature::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        $msg = 'Data Updated Successfully.<a href="' . route('admin-about_features-index') . '">View list.</a>';
        return response()->json($msg);
    }

    public function destroy($id)
    {
        $data = AboutFeature::findOrFail($id);
        $data->delete();
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }
}
