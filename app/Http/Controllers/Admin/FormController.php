<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormField;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function datatables()
    {
        $datas = Form::orderBy('id')->get();

        return Datatables::of($datas)
            ->addColumn('status', function (Form $data) {
                return $data->enabled
                    ? '<span class="badge bg-success">Enabled</span>'
                    : '<span class="badge bg-secondary">Disabled</span>';
            })
            ->addColumn('fields_count', function (Form $data) {
                return $data->fields()->count();
            })
            ->addColumn('action', function (Form $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-forms-edit', $data->id) . '"><i class="las la-edit"></i> Manage</a>
                </div>';
            })
            ->rawColumns(['status', 'action'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.forms.index');
    }

    public function edit($id)
    {
        $data = Form::with('fields')->findOrFail($id);
        return view('admin.forms.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Form::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'heading_ar'        => 'nullable|string|max:500',
            'source_identifier' => 'nullable|string|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->only([
            'source_identifier',
            'heading_ar', 'heading_en', 'heading_fr',
            'description_ar', 'description_en', 'description_fr',
            'button_text_ar', 'button_text_en', 'button_text_fr',
            'success_message_ar', 'success_message_en', 'success_message_fr',
        ]);
        $input['enabled'] = $request->has('enabled') ? 1 : 0;

        $data->update($input);

        $msg = 'Form settings saved successfully.';
        return response()->json($msg);
    }

    // ---------------- Form Fields ----------------

    public function fieldsDatatables($formId)
    {
        $datas = FormField::where('form_id', $formId)->orderBy('display_order')->get();

        return Datatables::of($datas)
            ->addColumn('label', function (FormField $data) {
                return e($data->label_ar ?: $data->label_en ?: $data->name);
            })
            ->addColumn('flags', function (FormField $data) {
                $v = $data->visible ? '<span class="badge bg-success">Visible</span>' : '<span class="badge bg-secondary">Hidden</span>';
                $r = $data->required ? ' <span class="badge bg-warning">Required</span>' : ' <span class="badge bg-light text-muted">Optional</span>';
                return $v . $r;
            })
            ->addColumn('action', function (FormField $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-forms-field-edit', $data->id) . '"><i class="las la-edit"></i></a>
                    <a href="javascript:;" data-href="' . route('admin-forms-field-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['flags', 'action'])
            ->toJson();
    }

    public function fieldCreate($formId)
    {
        $form = Form::findOrFail($formId);
        return view('admin.forms.field_create', compact('form'));
    }

    public function fieldStore(Request $request, $formId)
    {
        $form = Form::findOrFail($formId);

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:100|regex:/^[a-zA-Z0-9_]+$/',
            'type'          => 'required|in:text,email,tel,textarea,date,select',
            'display_order' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->all();
        $input['form_id'] = $form->id;
        $input['visible'] = $request->has('visible') ? 1 : 0;
        $input['required'] = $request->has('required') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;

        FormField::create($input);

        $msg = 'Field added successfully. <a href="' . route('admin-forms-edit', $form->id) . '">Back to form</a>';
        return response()->json($msg);
    }

    public function fieldEdit($id)
    {
        $data = FormField::findOrFail($id);
        $form = $data->form;
        return view('admin.forms.field_edit', compact('data', 'form'));
    }

    public function fieldUpdate(Request $request, $id)
    {
        $data = FormField::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:100|regex:/^[a-zA-Z0-9_]+$/',
            'type'          => 'required|in:text,email,tel,textarea,date,select',
            'display_order' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->all();
        $input['visible'] = $request->has('visible') ? 1 : 0;
        $input['required'] = $request->has('required') ? 1 : 0;
        $input['display_order'] = $request->display_order ?? 0;

        $data->update($input);

        $msg = 'Field updated successfully. <a href="' . route('admin-forms-edit', $data->form_id) . '">Back to form</a>';
        return response()->json($msg);
    }

    public function fieldDestroy($id)
    {
        $data = FormField::findOrFail($id);
        $data->delete();

        return response()->json('Field deleted successfully.');
    }
}
