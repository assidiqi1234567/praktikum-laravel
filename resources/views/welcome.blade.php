<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SIM-Surat') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- CDN Tailwind CSS sebagai fallback jika Vite belum di-build -->
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="bg-slate-50 text-slate-800 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col font-sans">
        
        <!-- Header / Navigasi Masuk & Register -->
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-3">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl shadow-md transition duration-200"
                        >
                            Dashboard SIM-Surat
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 border border-orange-300 text-orange-600 hover:bg-orange-50 font-semibold rounded-xl transition duration-200"
                        >
                            Masuk (Log in)
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl shadow-md transition duration-200"
                            >
                                Daftar Akun
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Main Content Hero -->
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                
                <!-- Sisi Kiri: Deskripsi & Informasi Sistem -->
                <div class="flex-1 p-6 lg:p-12 flex flex-col justify-center space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-xs font-semibold w-max">
                        <span>✨ Sistem Informasi Pengelolaan Surat</span>
                    </div>

                    <div class="space-y-2">
                        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">SIM-Surat</h1>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Platform digital terpusat untuk mempermudah pencatatan, pengarsipan, dan pemantauan surat masuk serta surat keluar instansi secara efisien dan aman.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl shadow-md transition duration-200 text-sm">
                                Buka Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl shadow-md transition duration-200 text-sm">
                                Mulai Masuk
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Sisi Kanan: Ilustrasi / Kartu Estetik Oranye -->
                <div class="lg:w-[420px] bg-gradient-to-br from-orange-500 to-amber-500 p-8 lg:p-12 text-white flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center shadow-inner">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold">Arsip Surat Instansi Terpadu</h2>
                        <p class="text-orange-100 text-sm leading-relaxed">
                            Akses riwayat surat masuk dan surat keluar kapan saja dengan sistem keamanan berbasis peran (Role & Permission).
                        </p>
                    </div>

                    <div class="pt-6 border-t border-white/20 mt-8">
                        <p class="text-xs text-orange-100">&copy; {{ date('Y') }} SIM-Surat. All rights reserved.</p>
                    </div>
                </div>

            </main>
        </div>

    </body>
</html>