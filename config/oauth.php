<?php

return [
    'google' => [
        'id' => env('GOOGLE_OAUTH_ID'),
        'secret' => env('GOOGLE_OAUTH_SECRET'),
        'redirect' => env('GOOGLE_OAUTH_REDIRECT'),
        'scopes' => [
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile'
        ],
        'url' => [
            'auth' => 'https://accounts.google.com/o/oauth2/auth',
            'token' => 'https://accounts.google.com/o/oauth2/token',
            'user_info' => 'https://www.googleapis.com/oauth2/v1/userinfo',
        ]
    ]
];
