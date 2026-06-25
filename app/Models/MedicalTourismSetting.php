<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalTourismSetting extends Model
{
    protected $table = 'medical_tourism_settings';

    protected $guarded = [];

    /**
     * Full URL accessors for the managed images.
     */
    public function imageUrl(string $field): ?string
    {
        $value = $this->attributes[$field] ?? null;
        return $value ? url('/') . '/assets/images/medical-tourism/' . $value : null;
    }

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], ['enabled' => 1]);
    }
}
