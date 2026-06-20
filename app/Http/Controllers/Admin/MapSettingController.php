<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MapSetting;
use App\Support\EmbedUrl;
use Illuminate\Http\Request;
use Validator;

class MapSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * @var array<string,string>
     */
    protected $pages = [
        'contact_page' => 'Contact Page Map',
        'homepage'     => 'Homepage Map',
    ];

    public function index()
    {
        $maps = [];
        foreach ($this->pages as $key => $label) {
            $maps[$key] = MapSetting::firstOrCreate(['page_key' => $key], ['enabled' => 1]);
        }
        return view('admin.maps.index', compact('maps'));
    }

    public function edit($key)
    {
        abort_unless(isset($this->pages[$key]), 404);
        $data = MapSetting::firstOrCreate(['page_key' => $key], ['enabled' => 1]);
        $label = $this->pages[$key];
        return view('admin.maps.edit', compact('data', 'label'));
    }

    public function update(Request $request, $key)
    {
        abort_unless(isset($this->pages[$key]), 404);
        $data = MapSetting::firstOrCreate(['page_key' => $key], ['enabled' => 1]);

        $validator = Validator::make($request->all(), [
            'embed_url'   => 'nullable|string|max:2000',
            'direct_link' => 'nullable|url|max:2000',
            'latitude'    => 'nullable|string|max:50',
            'longitude'   => 'nullable|string|max:50',
        ]);
        $validator->after(function ($v) use ($request) {
            $embed = trim((string) $request->embed_url);
            if ($embed !== '' && ! EmbedUrl::isGoogleMaps($embed)) {
                $v->errors()->add('embed_url', 'The embed URL must be a valid Google Maps link.');
            }
            $direct = trim((string) $request->direct_link);
            if ($direct !== '' && ! EmbedUrl::isGoogleMaps($direct)) {
                $v->errors()->add('direct_link', 'The direct link must be a valid Google Maps link.');
            }
        });
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->only([
            'embed_url', 'clinic_name',
            'address_ar', 'address_en', 'address_fr',
            'latitude', 'longitude', 'map_title', 'direct_link',
            'button_text_ar', 'button_text_en', 'button_text_fr',
        ]);
        $input['enabled'] = $request->has('enabled') ? 1 : 0;

        $data->update($input);

        $msg = 'Map settings saved successfully. <a href="' . route('admin-maps-index') . '">View maps</a>';
        return response()->json($msg);
    }
}
