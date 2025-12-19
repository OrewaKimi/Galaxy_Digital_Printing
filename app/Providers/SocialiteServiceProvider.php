<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client as GuzzleClient;

class SocialiteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Socialite::extend('google', function ($app) {
            $config = $app['config']['services.google'];
            
            return Socialite::buildProvider(
                \Laravel\Socialite\Two\GoogleProvider::class,
                [
                    'client_id' => $config['client_id'],
                    'client_secret' => $config['client_secret'],
                    'redirect' => $config['redirect'],
                    'stateless' => false,
                    'guzzle' => [
                        'verify' => false,
                    ],
                ]
            );
        });
    }
}
