<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $findUser = User::where('google_id', $googleUser->getId())->first();

            if ($findUser) {
                $findUser->update(['last_login' => now()]);
                Auth::login($findUser);
                return redirect()->route('home')->with('success', 'Berhasil login dengan Google!');
            } else {
                $newUser = User::create([
                    'full_name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'is_active' => true,
                    'role' => 'customer',
                ]);

                Auth::login($newUser);
                return redirect()->route('home')->with('success', 'Akun berhasil dibuat dan Anda login dengan Google!');
            }
        } catch (Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Gagal login dengan Google: ' . $e->getMessage());
        }
    }
}
