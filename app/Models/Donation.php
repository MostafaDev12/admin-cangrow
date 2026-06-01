<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'order_id',
        'payment_session_id',
        'transaction_id',
        'amount',
        'currency',
        'type',
        'service_name',
        'payment_method',
        'status',
        'response_data'
    ];

    protected $casts = [
        'response_data' => 'array'
    ];
}