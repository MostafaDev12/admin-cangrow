<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Traits\ManagesUploads;
use App\Models\Service;
use App\Support\EmbedUrl;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class ServiceVideoController extends Controller
{
    use ManagesUploads;

    protected $folder = 'assets/images/videos';

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function datatables()
    {
        $datas = Service::orderBy('video_order')->orderBy('id', 'desc')->get();

        return Datatables::of($datas)
            ->addColumn('service_name', function (Service $data) {
                return $data->title_ar ?? $data->title_en ?? ('#' . $data->id);
            })
            ->addColumn('video_status', function (Service $data) {
                return $data->video_enabled
                    ? '<span class="badge bg-success">Enabled</span>'
                    : '<span class="badge bg-secondary">Disabled</span>';
            })
            ->addColumn('has_video', function (Service $data) {
                return $data->youtube_video_url ? '<i class="las la-check text-success"></i>' : '<i class="las la-times text-danger"></i>';
            })
            ->addColumn('action', function (Service $data) {
                return '<div class="action-list">
                    <a class="btn btn-sm btn-secondary" href="' . route('admin-service-video-edit', $data->id) . '"><i class="las la-edit"></i> Edit video</a>
                </div>';
            })
            ->rawColumns(['video_status', 'has_video', 'action'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.service_video.index');
    }

    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return view('admin.service_video.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Service::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'youtube_video_url' => 'nullable|string|max:500',
            'video_button_link' => 'nullable|url|max:500',
            'video_thumbnail'   => $this->imageRules(false),
            'video_order'       => 'nullable|integer',
        ]);
        $validator->after(function ($v) use ($request) {
            $url = trim((string) $request->youtube_video_url);
            if ($url !== '' && ! EmbedUrl::isValidYoutube($url)) {
                $v->errors()->add('youtube_video_url', 'Please enter a valid YouTube URL (watch, youtu.be, embed, or shorts link).');
            }
        });
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->only([
            'youtube_video_url',
            'video_badge_ar', 'video_badge_en', 'video_badge_fr',
            'video_heading_ar', 'video_heading_en', 'video_heading_fr',
            'video_description_ar', 'video_description_en', 'video_description_fr',
            'video_button_text_ar', 'video_button_text_en', 'video_button_text_fr',
            'video_button_link', 'video_title',
        ]);
        $input['video_enabled'] = $request->has('video_enabled') ? 1 : 0;
        $input['video_order'] = $request->video_order ?? 0;

        if ($file = $request->file('video_thumbnail')) {
            $new = $this->storeImage($file, $this->folder);
            $this->deleteImage($data->getRawOriginal('video_thumbnail'), $this->folder);
            $input['video_thumbnail'] = $new;
        }

        $data->update($input);

        $msg = 'Video settings saved successfully. <a href="' . route('admin-service-video-index') . '">View list</a>';
        return response()->json($msg);
    }
}
