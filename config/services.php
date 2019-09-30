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

    'facebook' => [
        'client_id' => '2264875973623068',
        'client_secret' => 'f9c3437a9379e8948cabc8def7d96bad',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '800588917604-63s3jqpjqfbsl6chqu1qktsgj79smhne.apps.googleusercontent.com',
        'client_secret' => 'EYHCT0JOvw0e-KT9DK-7o1XR',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

    'github' => [
        'client_id' => '170547f17e6da9ce3de8',
        'client_secret' => 'a2849afc1e66c19b79288008848ea4563c65c04a',
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],

    'linkedin' => [
        'client_id' => '816c11ugr32qr6',
        'client_secret' => '5Q5rdiUuNBWIOwFt',
        'redirect' => 'http://localhost:8000/login/linkedin/callback',
    ],

];
