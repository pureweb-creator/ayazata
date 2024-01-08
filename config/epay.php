<?php

return [
    'test' => [
        'token_url' => env('TEST_EPAY_TOKEN_URL'),
        'status_url' => env('TEST_EPAY_STATUS_URL'),
        'client_id' => env('TEST_EPAY_CLIENT_ID'),
        'client_secret' => env('TEST_EPAY_CLIENT_SECRET'),
        'terminal_id' => env('TEST_EPAY_TERMINAL_ID'),
        'js_lib_url' => env('TEST_EPAY_JSLIB_URL')
    ],
    'production' => [
        'token_url' => env('EPAY_TOKEN_URL'),
        'status_url' => env('EPAY_STATUS_URL'),
        'client_id' => env('EPAY_CLIENT_ID'),
        'client_secret' => env('EPAY_CLIENT_SECRET'),
        'terminal_id' => env('EPAY_TERMINAL_ID'),
        'js_lib_url' => env('EPAY_JSLIB_URL')
    ]
];
