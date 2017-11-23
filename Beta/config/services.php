<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => '1052258627400-6u52huvg136fclgbpf3r7au4k4lkkgmv.apps.googleusercontent.com',
        'client_secret' => 'EjaGqu4bpYrQWonFOlECa5Pr',
        'redirect' => 'http://localhost:8000/google/callback',
    ],
    'facebook' => [
        'client_id' => '126566148034238',
        'client_secret' => '8b66f9b67fad0b0e2fef0a07398d755a',
        'redirect' => 'http://localhost:8000/facebook/callback',
    ],

];
