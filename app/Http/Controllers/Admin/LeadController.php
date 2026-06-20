<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Service;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function datatables(Request $request)
    {
        $query = Lead::with('service')->orderBy('id', 'desc');

        // Group filter coming from the sidebar links.
        switch ($request->group) {
            case 'service':
                $query->where('form_key', 'like', 'service_%');
                break;
            case 'contact':
                $query->where('form_key', 'contact_page');
                break;
            case 'medical_tourism':
                $query->where('form_key', 'medical_tourism');
                break;
            case 'homepage':
                $query->where('form_key', 'homepage');
                break;
        }

        // Column / explicit filters.
        if ($request->filled('f_source')) {
            $query->where('form_key', $request->f_source);
        }
        if ($request->filled('f_service')) {
            $query->where('service_id', $request->f_service);
        }
        if ($request->filled('f_status')) {
            $query->where('status', $request->f_status);
        }
        if ($request->filled('f_phone')) {
            $query->where('phone', 'like', '%' . $request->f_phone . '%');
        }
        if ($request->filled('f_name')) {
            $query->where('name', 'like', '%' . $request->f_name . '%');
        }
        if ($request->filled('f_date_from')) {
            $query->whereDate('created_at', '>=', $request->f_date_from);
        }
        if ($request->filled('f_date_to')) {
            $query->whereDate('created_at', '<=', $request->f_date_to);
        }

        $datas = $query->get();

        return Datatables::of($datas)
            ->editColumn('created_at', function (Lead $data) {
                return $data->created_at ? $data->created_at->format('Y-m-d H:i') : '';
            })
            ->addColumn('source', function (Lead $data) {
                return e($data->source_label);
            })
            ->addColumn('service_name', function (Lead $data) {
                return e($data->service->title_ar ?? $data->service->title_en ?? '—');
            })
            ->addColumn('status_badge', function (Lead $data) {
                $map = [
                    'new'       => 'bg-info',
                    'contacted' => 'bg-warning',
                    'booked'    => 'bg-primary',
                    'closed'    => 'bg-secondary',
                ];
                $class = $map[$data->status] ?? 'bg-info';
                return '<span class="badge ' . $class . '">' . e(ucfirst($data->status)) . '</span>';
            })
            ->addColumn('action', function (Lead $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-leads-show', $data->id) . '"><i class="las la-eye"></i></a>
                    <a href="javascript:;" data-href="' . route('admin-leads-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['status_badge', 'action'])
            ->toJson();
    }

    public function index(Request $request)
    {
        $group = $request->group;                 // null|service|contact|medical_tourism|homepage
        $services = Service::orderBy('title_ar')->get();
        $statuses = Lead::STATUSES;
        return view('admin.leads.index', compact('group', 'services', 'statuses'));
    }

    public function show($id)
    {
        $data = Lead::with('service')->findOrFail($id);
        $statuses = Lead::STATUSES;
        return view('admin.leads.show', compact('data', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $data = Lead::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'status'      => 'required|in:' . implode(',', Lead::STATUSES),
            'admin_notes' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $data->update([
            'status'      => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return response()->json('Lead updated successfully.');
    }

    public function destroy($id)
    {
        Lead::findOrFail($id)->delete();
        return response()->json('Lead deleted successfully.');
    }
}
