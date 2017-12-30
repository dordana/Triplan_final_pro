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
        'domain' => 'sandboxcb5f894f2b444b908fbb1d2b2e553d35.mailgun.org',
        'secret' => 'key-cc2fff5da0ac795e699cffb4612f3c57',
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
    
    'facebook' => [
        'client_id' => '1833340263362386',
        'client_secret' => '919b1fa6cf9bc59c071bb65049f6a19a',
        'redirect' => 'http://triplan1-dordana1191.c9users.io/auth/facebook/callback',
    ],
    
    'google' => [
        'client_id' => '732912376617-p5a1e0j724kbv300ep8ueuu02v8girqq.apps.googleusercontent.com',
        'client_secret' => 'b9Zbpw_8xdRWPUT3kGYW6f7H',
        'redirect' => 'http://triplan1-dordana1191.c9users.io/auth/google/callback',
    ],
    'twitter' => [
        'client_id' => 'yKITdtxFTjOvVGPMcsVltQ46f',
        'client_secret' => '5Vo30gGPAWRZR3XvyxCYMtroIYbT1EjpbOdph7U5PX1391N35B',
        'redirect' => 'http://triplan1-dordana1191.c9users.io/auth/twitter/callback',
    ],
];
