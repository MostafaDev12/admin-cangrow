<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalTourismBlock extends Model
{
    protected $table = 'medical_tourism_blocks';

    public const TYPES = ['benefit', 'journey', 'support', 'faq'];

    protected $fillable = [
        'type', 'icon',
        'title_ar', 'title_en',
        'description_ar', 'description_en',
        'display_order', 'active',
    ];

    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public static function ofType(string $type)
    {
        return static::type($type)->active()->orderBy('display_order')->orderBy('id')->get();
    }
}
