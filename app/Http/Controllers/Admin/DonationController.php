<?php

namespace App\Http\Controllers\Admin;

use DataTables;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Donation::orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('amount', function (Donation $data) {
                return number_format($data->amount, 2) . ' ' . $data->currency;
            })
            ->editColumn('status', function (Donation $data) {
                $map = [
                    'completed' => 'success',
                    'pending'   => 'warning',
                    'failed'    => 'danger',
                ];
                $class = $map[$data->status] ?? 'secondary';
                return '<span class="badge bg-' . $class . '">' . e($data->status) . '</span>';
            })
            ->editColumn('created_at', function (Donation $data) {
                return $data->created_at ? $data->created_at->format('Y-m-d H:i') : '';
            })
            ->addColumn('action', function (Donation $data) {
                return '<div class="action-list">
                <a href="javascript:;" data-href="' . route('admin-donations-delete', $data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete  btn btn-sm btn-danger"><i class="las la-trash"></i></a>
                </div>';
            })
            ->rawColumns(['status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.donations.index');
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Donation::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
