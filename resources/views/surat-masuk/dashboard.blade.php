@extends('layouts.app')

@section('title', 'Dashboard SIM-Surat')

@section('content')
<div class="space-y-6">
    
    <!-- Welcome Banner / Hero Card -->
    <div class="bg-gradient-to-r from-orange-500 to-amber-500 rounded-2xl shadow-md p-6 sm:p-8 text-white flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div class="space-y-2">
            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold tracking-wide uppercase">
                Dashboard Utama
            </span>
            <h1 class="text-2xl sm:text-3xl font-bold">Selamat Datang di SIM-Surat!</h1>
            <p class="text-orange-100 text-sm sm:text-base max-w-xl">
                Kelola surat masuk dan surat keluar instansi secara efisien, terstruktur, dan mudah dipantau kapan saja.
            </p>
        </div>
        
        <div class="flex-shrink-0 bg-white/10 backdrop-blur-md p-4 rounded-xl border border-white/20 hidden md:block">
            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>
    </div>

    <!-- Quick Stats / Shortcuts Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        
        <!-- Card Surat Masuk -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex items-center justify-between hover:shadow-md transition duration-200">
            <div class="space-y-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Modul Arsip</p>
                <h3 class="text-lg font-bold text-slate-800">Surat Masuk</h3>
                <p class="text-sm text-slate-500">Catat dan pantau surat yang diterima instansi.</p>
                <div class="pt-3">
                    <a href="{{ route('surat-masuk.index') }}" 
                       class="inline-flex items-center gap-1.5 text-sm font-semibold text-orange-600 hover:text-orange-700 transition duration-150">
                        <span>Buka Surat Masuk</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
            <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
            </div>
        </div>

        <!-- Card Surat Keluar -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex items-center justify-between hover:shadow-md transition duration-200">
            <div class="space-y-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Modul Arsip</p>
                <h3 class="text-lg font-bold text-slate-800">Surat Keluar</h3>
                <p class="text-sm text-slate-500">Kelola dan arsipkan surat yang diterbitkan instansi.</p>
                <div class="pt-3">
                    <a href="{{ route('surat-keluar.index') }}" 
                       class="inline-flex items-center gap-1.5 text-sm font-semibold text-orange-600 hover:text-orange-700 transition duration-150">
                        <span>Buka Surat Keluar</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            </div>
        </div>

    </div>

</div>
@endsection