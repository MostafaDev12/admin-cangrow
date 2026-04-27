<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'template',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order'   => 'integer',
    ];

    // ----- Relations -------------------------------------------------------

    public function translations(): HasMany
    {
        return $this->hasMany(PageTranslation::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(PageImage::class);
    }

    // ----- Lookup helpers --------------------------------------------------

    public function translationFor($languageId): ?PageTranslation
    {
        if ($languageId === null) {
            return null;
        }

        if ($this->relationLoaded('translations')) {
            return $this->translations->firstWhere('language_id', $languageId);
        }

        return $this->translations()->where('language_id', $languageId)->first();
    }

    public function currentTranslation(): ?PageTranslation
    {
        return $this->translationFor($this->currentLanguageId());
    }

    /**
     * Resolve the current language id from session('sign'), then from
     * the default language as a fallback.
     */
    protected function currentLanguageId(): ?int
    {
        $sign = session('sign');

        if ($sign) {
            $language = Language::where('sign', $sign)->first();
            if ($language) {
                return $language->id;
            }
        }

        $default = Language::where('is_default', 1)->first();

        return $default?->id;
    }

    // ----- Blade-facing API ------------------------------------------------

    /**
     * Resolution order:
     *   1. Current translation's content_json
     *   2. Provided default
     */
    public function t($key, $default = '')
    {
        $translation = $this->currentTranslation();
        if ($translation) {
            $json = $translation->content_json;
            if (is_array($json)) {
                $value = data_get($json, $key);
                if ($value !== null && $value !== '') {
                    return $value;
                }
            }
        }

        return $default;
    }

    /**
     * Resolution order:
     *   1. page_images row matching (page_id, key, language_id = current)
     *   2. page_images row matching (page_id, key, language_id = NULL)
     *   3. Provided default (literal asset URL)
     *   4. asset('dummy/<key>.jpg')
     */
    public function image($key, $default = '')
    {
        $images = $this->relationLoaded('images')
            ? $this->images
            : $this->images()->get();

        $languageId = $this->currentLanguageId();

        $match = null;
        if ($languageId) {
            $match = $images->first(
                fn ($i) => $i->key === $key && (int) $i->language_id === (int) $languageId
            );
        }
        if (! $match) {
            $match = $images->first(
                fn ($i) => $i->key === $key && $i->language_id === null
            );
        }
        if ($match && $match->path) {
            return asset($match->path);
        }

        if ($default !== '' && $default !== null) {
            return $default;
        }

        return asset('dummy/' . $key . '.jpg');
    }
}
