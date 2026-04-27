<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
        'language_id',
        'page_slug',
        'ip',
        'user_agent',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
