<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Traits\ManagesUploads;
use App\Models\BeforeAfter;
use App\Models\MedicalTourismSetting;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Validator;

class MedicalTourismController extends Controller
{
    use ManagesUploads;

    protected $folder = 'assets/images/medical-tourism';

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    // ---------------- Page settings ----------------

    public function settings()
    {
        $data = MedicalTourismSetting::current();
        return view('admin.medical_tourism.settings', compact('data'));
    }

    public function settingsUpdate(Request $request)
    {
        $data = MedicalTourismSetting::current();

        $validator = Validator::make($request->all(), [
            'hero_heading_ar' => 'nullable|string|max:500',
            'hero_image'      => $this->imageRules(false),
            'final_cta_image' => $this->imageRules(false),
            'og_image'        => $this->imageRules(false),
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $input = $request->except(['hero_image', 'final_cta_image', 'og_image', '_token']);
        $input['enabled'] = $request->has('enabled') ? 1 : 0;

        foreach (['hero_image', 'final_cta_image', 'og_image'] as $imgField) {
            if ($file = $request->file($imgField)) {
                $new = $this->storeImage($file, $this->folder);
                $this->deleteImage($data->getRawOriginal($imgField), $this->folder);
                $input[$imgField] = $new;
            }
        }

        $data->update($input);

        return response()->json('Medical Tourism page settings saved successfully.');
    }

    // ---------------- Featured content ----------------

    public function featured()
    {
        $services     = Service::orderBy('mt_order')->orderBy('id')->get();
        $beforeAfters = BeforeAfter::with('service')->orderBy('id', 'desc')->get();
        $testimonials = Testimonial::orderBy('display_order')->get();

        return view('admin.medical_tourism.featured', compact('services', 'beforeAfters', 'testimonials'));
    }

    public function featuredUpdate(Request $request)
    {
        $services     = collect($request->input('services', []))->map('intval')->all();
        $beforeAfters = collect($request->input('before_afters', []))->map('intval')->all();
        $testimonials = collect($request->input('testimonials', []))->map('intval')->all();

        Service::query()->update(['mt_featured' => 0]);
        if ($services) {
            Service::whereIn('id', $services)->update(['mt_featured' => 1]);
        }

        BeforeAfter::query()->update(['mt_featured' => 0]);
        if ($beforeAfters) {
            BeforeAfter::whereIn('id', $beforeAfters)->update(['mt_featured' => 1]);
        }

        Testimonial::query()->update(['mt_featured' => 0]);
        if ($testimonials) {
            Testimonial::whereIn('id', $testimonials)->update(['mt_featured' => 1]);
        }

        return response()->json('Featured content updated successfully.');
    }
}
