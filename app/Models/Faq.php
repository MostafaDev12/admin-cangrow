<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $fillable = [
        'blog_id',
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}