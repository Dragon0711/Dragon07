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

    'google' => [
        'client_id' => '635264664245-53lqgiqeqc7ponv17gpn6l032cp3sr3d.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],

    'facebook' => [
        'client_id' => 'xxxxx',
        'client_secret' => 'xxxxx',
        'redirect' => 'http://127.0.0.1:8000/callback/facebook',
    ],

];
