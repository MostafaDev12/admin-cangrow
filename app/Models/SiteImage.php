<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    protected $fillable = ['key', 'path', 'section', 'label'];

    public static function getByKey($key)
    {
        $image = static::where('key', $key)->first();
        return $image ? asset($image->path) : '';
    }

    public static function getPath($key)
    {
        $image = static::where('key', $key)->first();
        return $image ? $image->path : '';
    }

    public static function getAllGrouped()
    {
        return static::orderBy('section')->orderBy('label')->get()->groupBy('section');
    }
}
