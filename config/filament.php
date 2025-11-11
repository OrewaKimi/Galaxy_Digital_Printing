<?php

return [

    'default_filesystem_disk' => env('FILESYSTEM_DISK', 'local'),

    'assets_path' => null,

    'cache_path' => base_path('bootstrap/cache/filament'),

    'livewire_loading_delay' => 'default',

    'system_route_prefix' => 'filament',

    'panels' => [

        'admin' => [
            'path' => 'admin',
            'guard' => 'admin',
            'login_url' => '/admin/login',
            'logout_url' => '/admin/logout',
            'home_url' => '/admin/dashboard',
            'middleware' => [
                'web',
            ],
        ],

        'production' => [
            'path' => 'production',
            'guard' => 'production',
            'login_url' => '/production/login',
            'logout_url' => '/production/logout',
            'home_url' => '/production/dashboard',
            'middleware' => [
                'web',
            ],
        ],

    ],

    'broadcasting' => [
        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        //     'forceTLS' => true,
        // ],
    ],

];
