<?php

return [
    'account_id' => env('ZOOM_ACCOUNT_ID'),
    'client_id' => env('ZOOM_CLIENT_ID'),
    'client_secret' => env('ZOOM_CLIENT_SECRET'),
    'base_path' => 'https://api.zoom.us/v2',
    'token_path' => 'https://zoom.us/oauth/token',
    'meeting' => [
        'params' => [
            'topic' => 'Приватна зустріч', // Назва зустрічі
            'type' => 2,
            'start_time' => '2023-09-25T12:02:00Z', // час початку зустрічі.
            'duration' => 40, // тривалість зустрічі в хвилинах
            'password' => \Illuminate\Support\Str::random(10),
            'timezone' => 'Europe/Kiev',
            'settings' => [
                'host_video' => false, // Відео в організатора при підключені
                'participant_video' => true, // Відео в учасників при підключені
                'cn_meeting' => false, // Китай
                'in_meeting' => false, // Індія
                'join_before_host' => true, // Приєднуватись раніше організатора
                'jbh_time' => 0, // Час за який можна приєднатись до початку зустрічі "0"-будь-коли
                'mute_upon_entry' => true, // Вимикати звук при вході
                'watermark' => false,
                'use_pmi' => false, // Персональний ідентифікатор замість ID зустрічі
                'approval_type' => 2, // Тип підтвердження: default "1"- разово, "2"-не потрібно, "0"-автоматично
                'registration_type' => 1, // Тип реєстрації: default "1"-
                'audio' => 'voip',
                'auto_recording' => 'none', // Автоматичний запис конференції, змінити на "cloud"
                'waiting_room' => false // Зал очікування
            ]
        ]
    ]
];
