<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Galaxy Digital Printing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
            <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-6">
                Cloud Admin
            </h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded">
                    <p class="text-red-700">{{ $errors->first() }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded">
                    <p class="text-red-700">{{ session('error') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('cloud-admin.post-login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan password"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-[#4a6741] text-white py-2 px-4 rounded-md hover:bg-[#3a5631] transition-colors font-medium"
                >
                    Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>
