<?php

namespace App\Support;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServiceSeoInput
{
    public static function validator(Request $request, ?int $id = null)
    {
        $existing = $id ? Service::withoutGlobalScopes()->find($id) : null;
        foreach (config('service_seo.locales') as $locale) {
            $key = 'slug_'.$locale;
            if (is_string($request->input($key)) && $request->input($key) !== $existing?->getRawOriginal($key)) {
                $request->merge([$key => str_replace(' ', '-', trim($request->input($key)))]);
            }
        }
        $rules = [
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'is_published' => 'sometimes|boolean',
        ];
        foreach (config('service_seo.locales') as $locale) {
            foreach (['meta_title' => 255, 'meta_details' => 2000, 'og_title' => 255, 'og_description' => 2000] as $field => $max) {
                $rules[$field.'_'.$locale] = 'nullable|string|max:'.$max;
            }
            $rules['slug_'.$locale] = ['nullable', 'string', 'max:500', function ($attribute, $value, $fail) use ($id, $existing) {
                if ($existing && $existing->getRawOriginal($attribute) === $value) {
                    return;
                }
                if (! preg_match('/^[\pL\pN\pM_\-]+$/u', $value)) {
                    $fail(__('The service URL contains invalid characters.'));

                    return;
                }
                $query = Service::withoutGlobalScopes()->where(function ($query) use ($value) {
                    foreach (config('service_seo.locales') as $language) {
                        $query->orWhere('slug_'.$language, $value);
                    }
                });
                if ($id) {
                    $query->where('id', '!=', $id);
                }
                $history = DB::table('service_slug_histories')->where('slug', $value);
                if ($id) {
                    $history->where('service_id', '!=', $id);
                }
                if ($query->exists() || $history->exists()) {
                    $fail(__('This service URL is already in use.'));
                }
            }];
        }
        $validator = Validator::make($request->all(), $rules);
        $validator->after(function ($validator) use ($request, $id) {
            $existing = $id ? Service::withoutGlobalScopes()->find($id) : null;
            $hasSlug = false;
            foreach (config('service_seo.locales') as $locale) {
                $key = 'slug_'.$locale;
                $value = $request->exists($key) ? $request->input($key) : $existing?->getRawOriginal($key);
                $hasSlug = $hasSlug || filled($value);
                if ($existing && filled($existing->getRawOriginal($key)) && $request->exists($key) && blank($value)) {
                    $validator->errors()->add($key, __('An existing service URL cannot be cleared.'));
                }
            }
            if (! $hasSlug) {
                $validator->errors()->add('slug_ar', __('At least one service URL is required.'));
            }
        });

        return $validator;
    }

    public static function input(Request $request): array
    {
        $input = $request->except(['og_image', 'photo']);
        if ($file = $request->file('og_image')) {
            $name = (string) \Illuminate\Support\Str::uuid().'.'.$file->extension();
            $file->move(public_path('assets/images/services'), $name);
            $input['og_image'] = $name;
        }

        return $input;
    }
}
