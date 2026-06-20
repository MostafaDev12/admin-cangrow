<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';

    protected $fillable = [
        'form_id', 'form_key', 'source_page', 'service_id',
        'name', 'phone', 'email', 'city', 'country',
        'subject', 'treatment', 'preferred_date', 'message',
        'payload', 'status', 'admin_notes',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    public const STATUSES = ['new', 'contacted', 'booked', 'closed'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Human readable source label.
     */
    public function getSourceLabelAttribute()
    {
        $map = [
            'contact_page'    => 'Contact Page',
            'medical_tourism' => 'Medical Tourism',
            'homepage'        => 'Homepage',
        ];

        if (isset($map[$this->form_key])) {
            return $map[$this->form_key];
        }

        if (str_starts_with((string) $this->form_key, 'service_')) {
            return 'Service Page';
        }

        return $this->form_key ?: 'Unknown';
    }
}
