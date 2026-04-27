<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Page;
use App\Models\PageImage;
use App\Models\PageTranslation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('admin.pages.index');
    }

    public function datatables()
    {
        $pages = Page::query()->orderBy('sort_order')->get();

        return DataTables::of($pages)
            ->addColumn('is_published_label', function ($p) {
                return $p->is_published
                    ? '<span class="badge bg-success">Published</span>'
                    : '<span class="badge bg-secondary">Draft</span>';
            })
            ->addColumn('updated_at_human', function ($p) {
                return $p->updated_at?->diffForHumans();
            })
            ->addColumn('action', function ($p) {
                $editUrl = route('admin-pages-edit', $p->id);
                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">'
                    . '<i class="las la-edit"></i> Edit</a>';
            })
            ->rawColumns(['is_published_label', 'action'])
            ->make(true);
    }

    public function edit($id)
    {
        $page = Page::with(['translations', 'images'])->findOrFail($id);
        $languages = Language::orderBy('id')->get();

        // Canonical key set: union of keys across all translations, falls back
        // to default-language translation if available.
        $contentKeys = collect();
        foreach ($page->translations as $t) {
            if (is_array($t->content_json)) {
                $contentKeys = $contentKeys->merge(array_keys($t->content_json));
            }
        }
        $contentKeys = $contentKeys->unique()->values();

        // Translations indexed by language_id for easy template lookup.
        $translations = $page->translations->keyBy('language_id');

        // Images grouped: $imagesByKey[$key]['default'] and ['per_lang'][$langId]
        $imagesByKey = [];
        foreach ($page->images as $img) {
            $bucket = $img->language_id === null ? 'default' : $img->language_id;
            $imagesByKey[$img->key] ??= ['default' => null, 'per_lang' => []];
            if ($bucket === 'default') {
                $imagesByKey[$img->key]['default'] = $img;
            } else {
                $imagesByKey[$img->key]['per_lang'][$bucket] = $img;
            }
        }
        $imageKeys = array_keys($imagesByKey);

        return view('admin.pages.edit', compact(
            'page',
            'languages',
            'translations',
            'contentKeys',
            'imageKeys',
            'imagesByKey'
        ));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $page->is_published = $request->boolean('is_published');
        $page->save();

        // ---- translations ------------------------------------------------
        foreach ($request->input('translations', []) as $langId => $data) {
            PageTranslation::updateOrCreate(
                ['page_id' => $page->id, 'language_id' => (int) $langId],
                [
                    'meta_title'       => $data['meta_title']       ?? null,
                    'meta_description' => $data['meta_description'] ?? null,
                    'content_json'     => $data['content']          ?? [],
                ]
            );
        }

        // ---- images ------------------------------------------------------
        $files = $request->file('images', []);
        foreach ($files as $key => $buckets) {
            // language-agnostic default
            if (! empty($buckets['default'])) {
                $path = $this->storeImage($buckets['default'], $page->slug);
                $existing = PageImage::where('page_id', $page->id)
                    ->where('key', $key)
                    ->whereNull('language_id')
                    ->first();
                if ($existing) {
                    $existing->update(['path' => $path]);
                } else {
                    PageImage::create([
                        'page_id'     => $page->id,
                        'language_id' => null,
                        'key'         => $key,
                        'path'        => $path,
                    ]);
                }
            }

            // per-language overrides
            foreach ($buckets as $bucket => $file) {
                if (! is_string($bucket) || ! str_starts_with($bucket, 'lang_')) {
                    continue;
                }
                if (empty($file)) {
                    continue;
                }
                $langId = (int) substr($bucket, 5);
                $path = $this->storeImage($file, $page->slug);
                PageImage::updateOrCreate(
                    ['page_id' => $page->id, 'key' => $key, 'language_id' => $langId],
                    ['path' => $path]
                );
            }
        }

        return redirect()
            ->route('admin-pages-edit', $page->id)
            ->with('success', 'Page updated successfully');
    }

    /**
     * Saves an upload to public/assets/images/bekdash/pages/{slug}/ and
     * returns the relative path (asset()-friendly).
     *
     * NOTE: old image files are intentionally NOT deleted yet (per spec).
     * The PageImage row is updated in place; the previous file remains on disk.
     */
    private function storeImage($file, string $slug): string
    {
        $dir = public_path('assets/images/bekdash/pages/' . $slug);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $name);

        return 'assets/images/bekdash/pages/' . $slug . '/' . $name;
    }
}
