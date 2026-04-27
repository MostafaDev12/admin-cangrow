<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * One row per language. content_json holds chrome strings keyed by name —
 * site_title, menu_*, contact_*, etc. — so the admin can edit them without
 * a code deploy.
 *
 * Distinct from App\Models\SiteGlobal which is the per-request runtime DTO
 * the bekdash views consume via $globals->t().
 */
class SiteGlobalSetting extends Model
{
    protected $table = 'site_globals';

    protected $fillable = ['language_id', 'content_json'];

    protected $casts = [
        'content_json' => 'array',
    ];
}
