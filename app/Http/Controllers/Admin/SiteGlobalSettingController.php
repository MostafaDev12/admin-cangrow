<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\SiteGlobalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteGlobalSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function edit()
    {
        $languages = Language::orderBy('id')->get();

        // One row per language. Index by language_id for easy template lookup.
        $rows = SiteGlobalSetting::all()->keyBy('language_id');

        // Canonical key list = union of keys present in any language row.
        // New keys get added to the form automatically when the seeder pushes
        // them into content_json (matches how admin/pages auto-discovers).
        $contentKeys = collect();
        foreach ($rows as $row) {
            if (is_array($row->content_json)) {
                $contentKeys = $contentKeys->merge(array_keys($row->content_json));
            }
        }
        $contentKeys = $contentKeys->unique()->values();

        return view('admin.site_globals.edit', compact('languages', 'rows', 'contentKeys'));
    }

    public function update(Request $request)
    {
        foreach ($request->input('translations', []) as $langId => $data) {
            $content = $data['content'] ?? [];
            SiteGlobalSetting::updateOrCreate(
                ['language_id' => (int) $langId],
                ['content_json' => $content],
            );
        }

        // Invalidate the per-language site-globals cache so edits surface
        // immediately. Cache keys are written by FrontPagesController::siteGlobals()
        // as 'site_globals.<lang_sign>'.
        foreach (Language::pluck('sign') as $sign) {
            Cache::forget('site_globals.' . $sign);
        }

        return redirect()
            ->route('admin-site-globals-edit')
            ->with('success', 'Site settings updated successfully');
    }
}
