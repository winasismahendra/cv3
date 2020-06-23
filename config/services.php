<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'midtrans' => [
        // Midtrans server key
        'serverKey'     => 'SB-Mid-server-zxG-e3i5xcqcwE2I9OQ6dClt',
        // Midtrans client key
        'clientKey'     => 'SB-MiSB-Mid-client-r26AsjD_HdYhnK-X',
        // Isi false jika masih tahap development dan true jika sudah di production, default false (development)
        'isProduction'  => env('false', false),
        'isSanitized'   => env('true', false),
        'is3ds'         => env('true', false),                
    ],

];
