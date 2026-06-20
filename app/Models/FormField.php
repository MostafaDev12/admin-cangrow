<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $table = 'form_fields';

    protected $fillable = [
        'form_id', 'name', 'type',
        'label_ar', 'label_en', 'label_fr',
        'placeholder_ar', 'placeholder_en', 'placeholder_fr',
        'options', 'visible', 'required', 'display_order',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * Decoded select options.
     */
    public function optionList()
    {
        if (empty($this->options)) {
            return [];
        }
        $decoded = json_decode($this->options, true);
        if (is_array($decoded)) {
            return array_values($decoded);
        }
        // Fallback: newline-separated list.
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->options))));
    }
}
