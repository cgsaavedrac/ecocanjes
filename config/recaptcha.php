<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Keys
    |--------------------------------------------------------------------------
    |
    | Set the public and private API keys as provided by reCAPTCHA.
    |
    | In version 2 of reCAPTCHA, public_key is the Site key,
    | and private_key is the Secret key.
    |
    */
    /*CLAVES ANTERIORES CON CORREO DE PESIC
    'public_key'     => env('RECAPTCHA_PUBLIC_KEY', '6Le092EUAAAAAPE7VCRM225jq8pPeSWn2KiA2x8g'),
    'private_key'    => env('RECAPTCHA_PRIVATE_KEY', '6Le092EUAAAAAIYsACoM4lmwCDkkBMZzxRAmBZqs'),
    */
    'public_key'     => env('RECAPTCHA_PUBLIC_KEY', '6LfyXZEUAAAAAFt0Va1fr1KauECzLG3yba0vVWke'),
    'private_key'    => env('RECAPTCHA_PRIVATE_KEY', '6LfyXZEUAAAAAEiHlPoMfbfvLAOtIUd6FboRtPZf'),

    /*
    |--------------------------------------------------------------------------
    | Template
    |--------------------------------------------------------------------------
    |
    | Set a template to use if you don't want to use the standard one.
    |
    */
    'template'    => '',

    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    |
    | Determine how to call out to get response; values are 'curl' or 'native'.
    | Only applies to v2.
    |
    */
    'driver'      => 'curl',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | Various options for the driver
    |
    */
    'options'     => [

        'curl_timeout' => 1,
        'curl_verify' => true,

    ],

    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    |
    | Set which version of ReCaptcha to use.
    |
    */

    'version'     => 2,

];
