@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <!-- Page Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Detail Surat Masuk</h1>
            <p class="text-sm text-slate-500 mt-0.5">Informasi lengkap arsip surat masuk.</p>
        </div>
        
        <a href="{{ route('surat-masuk.index') }}" 
           class="inline-flex items-center gap-1.5 px-4 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-xl text-sm font-medium transition duration-200 shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 sm:p-8 space-y-6">
            
            <!-- Grid Informasi Utama -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-slate-100">
                <div>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Nomor Surat</span>
                    <span class="text-base font-bold text-slate-800">{{ $surat->nomor_surat }}</span>
                </div>
                
                <div>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Tanggal Surat</span>
                    <span class="text-base font-medium text-slate-700">{{ \Carbon\Carbon::parse($surat->tanggal)->translatedFormat('d F Y') }}</span>
                </div>
            </div>

            <!-- Pengirim & Perihal -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-slate-100">
                <div>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Pengirim</span>
                    <span class="text-base font-medium text-slate-800">{{ $surat->pengirim }}</span>
                </div>
                
                <div>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Perihal</span>
                    <span class="text-base font-medium text-slate-800">{{ $surat->perihal }}</span>
                </div>
            </div>

            <!-- Keterangan -->
            <div>
                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Keterangan / Disposisi</span>
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-200 text-slate-700 text-sm leading-relaxed">
                    {{ $surat->keterangan ?? 'Tidak ada keterangan tambahan.' }}
                </div>
            </div>

        </div>

        <!-- Card Footer (Aksi Edit / Hapus jika diizinkan) -->
        @can('manage-letters')
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
            <a href="{{ route('surat-masuk.edit', $surat->id) }}" 
               class="inline-flex items-center gap-1.5 px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-sm font-semibold transition duration-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <span>Edit Surat</span>
            </a>

            <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')" 
                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-semibold transition duration-200 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span>Hapus Surat</span>
                </button>
            </form>
        </div>
        @endcan

    </div>

</div>
@endsection