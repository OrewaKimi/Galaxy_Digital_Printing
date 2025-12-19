@extends('layouts.app')

@section('title', 'Profil Saya - Galaxy Digital Printing')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Profil Saya</h1>
                <p class="text-gray-600 mt-2">Kelola informasi akun Anda</p>
            </div>
            
            <div class="space-y-6">
                <div class="border-b pb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <p class="text-lg text-gray-900">{{ Auth::user()->full_name ?? Auth::user()->name ?? 'Tidak diatur' }}</p>
                </div>

                <div class="border-b pb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <p class="text-lg text-gray-900">{{ Auth::user()->email }}</p>
                    @if(Auth::user()->google_id)
                        <span class="inline-block mt-2 bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">
                            <i class="fab fa-google mr-1"></i> Login dengan Google
                        </span>
                    @endif
                </div>

                <div class="border-b pb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                    <p class="text-lg text-gray-900">
                        @if(Auth::user()->phone)
                            {{ Auth::user()->phone }}
                        @else
                            <span class="text-gray-500 italic">Belum diatur</span>
                        @endif
                    </p>
                </div>

                <div class="border-b pb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <p class="text-lg text-gray-900">{{ Auth::user()->username }}</p>
                </div>

                <div class="border-b pb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Role/Status</label>
                    <p class="text-lg text-gray-900 capitalize">
                        @if(Auth::user()->role === 'customer')
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Pelanggan</span>
                        @else
                            {{ Auth::user()->role }}
                        @endif
                    </p>
                </div>

                <div class="border-b pb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status Email</label>
                    <p class="text-lg">
                        @if(Auth::user()->email_verified_at)
                            <span class="text-green-600 flex items-center gap-2">
                                <i class="fas fa-check-circle"></i> Terverifikasi
                            </span>
                        @else
                            <span class="text-yellow-600 flex items-center gap-2">
                                <i class="fas fa-exclamation-circle"></i> Belum Terverifikasi
                            </span>
                        @endif
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Terdaftar Sejak</label>
                    <p class="text-lg text-gray-900">{{ Auth::user()->created_at->format('d M Y - H:i') }}</p>
                </div>
            </div>

            <div class="mt-10 border-t pt-6 flex gap-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded transition-colors">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded transition-colors">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
