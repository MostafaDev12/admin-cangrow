<?php

namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Shared image upload helpers following the project's existing
 * public/assets/images convention, with unique filenames and safe deletes.
 */
trait ManagesUploads
{
    /**
     * Move an uploaded file into public/$folder with a unique name and
     * return the stored filename. Returns null when no file is given.
     */
    protected function storeImage(?UploadedFile $file, string $folder): ?string
    {
        if (! $file) {
            return null;
        }

        $ext  = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg');
        $name = time() . '_' . Str::random(10) . '.' . $ext;

        $file->move(public_path($folder), $name);

        return $name;
    }

    /**
     * Delete a previously stored file if it still exists on disk.
     */
    protected function deleteImage(?string $filename, string $folder): void
    {
        if (! $filename) {
            return;
        }

        $path = public_path($folder . '/' . $filename);
        if (is_file($path)) {
            @unlink($path);
        }
    }

    /**
     * Standard validation rules for an uploaded image.
     */
    protected function imageRules(bool $required = false): string
    {
        $rules = $required ? 'required|' : 'nullable|';
        // type, size (<= 4MB), and sane min/max dimensions
        return $rules . 'image|mimes:jpeg,jpg,png,gif,webp|max:4096|dimensions:min_width=100,min_height=100,max_width=5000,max_height=5000';
    }
}
