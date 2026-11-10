<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIM-Surat')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-500 text-slate-800 font-sans flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    <header class="bg-white border-b border-slate-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo & Judul Sistem -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-xl shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold tracking-wide text-slate-800">
                        SIM<span class="text-orange-500">-Surat</span>
                    </h2>
                </div>

                <!-- Navigasi Utama -->
                <nav class="flex items-center space-x-1 sm:space-x-4">
                    <a href="{{ route('dashboard') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-medium transition duration-150 {{ request()->routeIs('dashboard') ? 'bg-orange-50 text-orange-600 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('surat-masuk.index') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-medium transition duration-150 {{ request()->routeIs('surat-masuk.*') ? 'bg-orange-50 text-orange-600 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Surat Masuk
                    </a>
                    <a href="{{ route('surat-keluar.index') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-medium transition duration-150 {{ request()->routeIs('surat-keluar.*') ? 'bg-orange-50 text-orange-600 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Surat Keluar
                    </a>
                </nav>

                <!-- Status User & Logout -->
                @auth
                <div class="flex items-center space-x-4 pl-4 border-l border-slate-200">
                    <div class="hidden md:block text-right">
                        <p class="text-xs text-slate-400">Masuk sebagai</p>
                        <p class="text-sm font-semibold text-slate-700">{{ auth()->user()->name }}</p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" 
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 border border-orange-200 text-orange-600 hover:bg-orange-50 hover:border-orange-300 rounded-lg text-sm font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
                @endauth

            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-auto py-4">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-sm text-slate-500">
                &copy; {{ date('Y') }} <span class="font-semibold text-slate-700">Sistem Informasi Surat</span>. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>