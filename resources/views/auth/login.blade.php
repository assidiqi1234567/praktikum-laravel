<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
    <!-- CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 border border-slate-200">
        <!-- Header / Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 text-orange-600 rounded-full mb-3">
                <!-- Icon Surat (SVG) -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Login SIM-Surat</h1>
            <p class="text-sm text-slate-500 mt-1">Masukkan akun Anda untuk melanjutkan</p>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf
            
            <!-- Input Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Alamat Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="nama@email.com"
                    class="w-full px-4 py-2.5 bg-slate-50 border rounded-lg text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition duration-200 @error('email') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                >
                @error('email') 
                    <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                        <span>⚠️</span> {{ $message }}
                    </p> 
                @enderror
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="••••••••"
                    class="w-full px-4 py-2.5 bg-slate-50 border rounded-lg text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition duration-200 @error('password') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                >
                @error('password') 
                    <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                        <span>⚠️</span> {{ $message }}
                    </p> 
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button 
                type="submit" 
                class="w-full bg-orange-500 hover:bg-orange-600 active:bg-orange-700 text-white font-semibold py-2.5 rounded-lg shadow-md hover:shadow-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2"
            >
                Masuk
            </button>
        </form>
    </div>

</body>
</html>