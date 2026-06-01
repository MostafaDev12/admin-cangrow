<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


'kashier' => [
    'mid' => env('KASHIER_MID'),
    'api_key' => env('KASHIER_API_KEY'),
    'secret_key' => env('KASHIER_SECRET_KEY'),
    'mode' => env('KASHIER_MODE', 'test'),
    'callback_url' => env('KASHIER_CALLBACK_URL'),
],


'kashier_zakat' => [
    'mid' => env('KASHIER_ZAKAT_MID'),
    'api_key' => env('KASHIER_ZAKAT_API_KEY'),
    'secret_key' => env('KASHIER_ZAKAT_SECRET_KEY'),
],

'kashier_sadaqa' => [
    'mid' => env('KASHIER_SADAQA_MID'),
    'api_key' => env('KASHIER_SADAQA_API_KEY'),
    'secret_key' => env('KASHIER_SADAQA_SECRET_KEY'),
],



];
