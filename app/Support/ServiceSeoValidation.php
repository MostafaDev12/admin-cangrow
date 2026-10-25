<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceSeoValidation
{
    public static function rules(Request $request, $id = null): array
    {
        $rules = [
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'is_published' => 'sometimes|boolean',
        ];
        foreach (['ar', 'en', 'fr'] as $locale) {
            foreach (['meta_title', 'meta_details', 'og_title', 'og_description'] as $field) {
                $rules[$field.'_'.$locale] = 'sometimes|nullable|string|max:10000';
            }
            if ($request->has('slug_'.$locale) && is_string($request->input('slug_'.$locale))) {
                $request->merge(['slug_'.$locale => str_replace(' ', '-', trim($request->input('slug_'.$locale) ?? ''))]);
            }
            $rules['slug_'.$locale] = [$id === null && $locale === 'ar' ? 'required' : 'sometimes', $locale === 'ar' ? 'required' : 'nullable', 'string', 'max:255', 'regex:/^[\pL\pN\pM_-]+$/u', Rule::unique('services', 'slug_'.$locale)->ignore($id)];
            $rules['slug_'.$locale][] = function ($attribute, $value, $fail) use ($locale, $id) {
                if (\Illuminate\Support\Facades\DB::table('service_slug_redirects')->where('locale', $locale)->where('slug', $value)->when($id, fn ($query) => $query->where('service_id', '!=', $id))->exists()) {
                    $fail('This URL is reserved by an existing service redirect.');
                }
            };
        }

        return $rules;
    }
}
