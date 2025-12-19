<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckAppUrl extends Command
{
    protected $signature = 'check:midtrans-config';
    protected $description = 'Check Midtrans configuration and callback setup';

    public function handle()
    {
        $this->info('=== Midtrans Configuration Status ===');
        $this->newLine();
        
        $appUrl = config('app.url');
        $this->info("APP_URL: {$appUrl}");
        
        $serverKey = config('midtrans.server_key');
        $clientKey = config('midtrans.client_key');
        $isProduction = config('midtrans.is_production');
        
        $this->info('Midtrans Server Key: ' . ($serverKey ? 'Set' : 'NOT SET'));
        $this->info('Midtrans Client Key: ' . ($clientKey ? 'Set' : 'NOT SET'));
        $this->info('Midtrans Mode: ' . ($isProduction ? 'PRODUCTION' : 'SANDBOX'));
        
        $this->newLine();
        $this->info('=== Callback Configuration ===');
        
        if ($appUrl === 'http://localhost' || str_contains($appUrl, 'localhost')) {
            $this->error('⚠️  WARNING: APP_URL is set to localhost!');
            $this->newLine();
            $this->warn('Midtrans CANNOT send callbacks to localhost.');
            $this->warn('Automatic payment updates will NOT work.');
            $this->newLine();
            $this->info('Solutions:');
            $this->info('1. Deploy to a public server and update APP_URL in .env');
            $this->info('2. Use ngrok for local testing:');
            $this->info('   - Download ngrok from https://ngrok.com/');
            $this->info('   - Run: ngrok http 8000');
            $this->info('   - Update APP_URL in .env to the ngrok URL');
            $this->info('3. Use manual payment completion command:');
            $this->info('   - php artisan order:complete-payment <order_number>');
            $this->newLine();
            $this->info('Expected callback URL: ' . $appUrl . '/payment/midtrans/callback');
        } else {
            $this->info('✓ APP_URL is publicly accessible');
            $this->info('Expected callback URL: ' . $appUrl . '/payment/midtrans/callback');
            $this->newLine();
            $this->info('Make sure this URL is:');
            $this->info('1. Accessible from the internet');
            $this->info('2. Not blocked by firewall');
            $this->info('3. HTTPS enabled (required for production)');
        }
        
        $this->newLine();
        $this->info('=== Callback Routes ===');
        $this->info('Route 1: POST /payment/midtrans/callback');
        $this->info('Route 2: POST /midtrans/callback');
        $this->info('Both routes are exempt from CSRF protection.');
        
        $this->newLine();
        $this->info('=== Testing ===');
        $this->info('1. Create a test order from the website');
        $this->info('2. Complete payment in Midtrans');
        $this->info('3. Check logs: storage/logs/laravel.log');
        $this->info('4. Look for: "Midtrans Callback Received"');
        $this->info('5. If no logs appear, callbacks are not reaching the server');
        
        return 0;
    }
}
