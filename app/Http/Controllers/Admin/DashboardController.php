<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use InvalidArgumentException;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Generalsetting;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use App\Models\Product;
use App\Models\Counter;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {

        $days = "";
        $sales = "";

     //   $visitors = Visitor::get();

        $referrals = Counter::where('type','referral')->orderBy('total_count','desc')->take(5)->get();
        
        $browsers = Counter::where('type','browser')->orderBy('total_count','desc')->take(5)->get();
 
        $visitors = Visitor::select('country', DB::raw('COUNT(*) as count') )
        ->groupBy('country' )
        ->orderByDesc('count')
        ->take(10)
        ->get();

        $countries = $visitors->pluck('country');
        $sessions = $visitors->pluck('count');


        $visitors_ip = Visitor::select('country', DB::raw('COUNT(*) as count'),'ip_address' )
        ->groupBy('country' ,'ip_address')
        ->orderByDesc('count')
        ->take(10)
        ->get();

        $visitDurations = Visitor::select(DB::raw('TIMESTAMPDIFF(SECOND, created_at, updated_at) as duration'))
        ->get();

        $durationCategories = [
            '0-30' => 0,
            '31-60' => 0,
            '61-120' => 0,
            '121-240' => 0,
        ];
    
        foreach ($visitDurations as $visit) {
            $duration = $visit->duration;
            if ($duration <= 30) $durationCategories['0-30']++;
            elseif ($duration <= 60) $durationCategories['31-60']++;
            elseif ($duration <= 120) $durationCategories['61-120']++;
            else $durationCategories['121-240']++;
        }


        $coords = [];

        foreach ($visitors_ip as $visitor) {
            $ip = $visitor->ip_address;
    
            // Check if loc is already saved in the visitors table
            if (!$visitor->latitude || !$visitor->longitude) {
                $response = Http::get("http://ipinfo.io/{$ip}/json?token=36d7049a61a982");
                $location = $response->json();
    
                if (isset($location['loc'])) {
                    $latLong = explode(',', $location['loc']);
                    
                    // Save coordinates in your database to avoid repetitive API requests
                    $visitor->latitude = $latLong[0];
                    $visitor->longitude = $latLong[1];
                    $visitor->save();
    
                    $coords[$visitor->country] = [
                        'lat' => $latLong[0],
                        'lon' => $latLong[1]
                    ];
                }
            } else {
                // If coordinates are already saved, use them
                $coords[$visitor->country] = [
                    'lat' => $visitor->latitude,
                    'lon' => $visitor->longitude
                ];
            }
        }

        $topReferrals = Counter::where('type', 'referral')
        ->select('referral', DB::raw('SUM(total_count) as total_count'))
        ->groupBy('referral')
        ->orderByDesc('total_count')
        ->get();

    $totalReferrals = $topReferrals->sum('total_count');

    $topSix = $topReferrals->take(6);

    $otherCount = $topReferrals->skip(6)->sum('total_count');

    $referralData = $topSix->map(function ($item) use ($totalReferrals) {
        return [
            'referral' => $item->referral,
            'percentage' => $item->total_count != 0 ?round(($item->total_count / $totalReferrals) * 100, 2) : 0
        ];
    });

    if ($otherCount > 0) {
        $referralData->push([
            'referral' => 'Other',
            'percentage' => round(($otherCount / $totalReferrals) * 100, 2)
        ]);
    }
    

    $devices = Counter::where('type', 'browser')->orderByDesc('total_count')->get();

    // Calculate total count
    $totalCount = $devices->sum('total_count');

    // Get the top 6 devices
    $topDevices = $devices->take(6);

    // Calculate "Other" count if there are more than 6 devices
    $otherCount = $devices->skip(6)->sum('total_count');

    // Prepare data for chart
    $deviceData = $topDevices->map(function ($device) use ($totalCount) {
        return [
            'name' => $device->referral,
            'count' => $device->total_count,
            'percentage' => $totalCount > 0 ? round(($device->total_count / $totalCount) * 100, 2) : 0
        ];
    });

    // Add "Other" if applicable
    if ($otherCount > 0) {
        $deviceData->push([
            'name' => 'Other',
            'count' => $otherCount,
            'percentage' => $totalCount > 0 ? round(($otherCount / $totalCount) * 100, 2) : 0
        ]);
    }


        return view('admin.dashboard',compact('referrals','browsers',
        'visitors','countries','sessions', 'coords','referralData','totalReferrals','deviceData', 'totalCount'));
    }
    
    public function profile()
    {
        $data = Auth::guard('admin')->user();
        return view('admin.profile',compact('data'));
    }

    public function profileupdate(Request $request)
    {
        //--- Validation Section

        $rules =
        [
            'photo' => 'mimes:jpeg,jpg,png,svg,webp',
            'email' => 'unique:admins,email,'.Auth::guard('admin')->user()->id
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        $input = $request->all();
        $data = Auth::guard('admin')->user();
            if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('images/',$name);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/images/'.$data->photo)) {
                        unlink(public_path().'/images/'.$data->photo);
                    }
                }
            $input['photo'] = $name;
            }
        $data->update($input);
        $msg = 'Successfully updated your profile';
        return response()->json($msg);
    }

    public function passwordreset()
    {
        $data = Auth::guard('admin')->user();
        return view('admin.password',compact('data'));
    }

    public function changepass(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $admin->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    return response()->json(array('errors' => [ 0 => 'Confirm password does not match.' ]));
                }
            }else{
                return response()->json(array('errors' => [ 0 => 'Current password Does not match.' ]));
            }
        }
        $admin->update($input);
        $msg = 'Successfully change your passwprd';
        return response()->json($msg);
    }


 

    

 

}
