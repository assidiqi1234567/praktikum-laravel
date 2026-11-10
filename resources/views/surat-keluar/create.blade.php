@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Card Container -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        
        <!-- Header Card -->
        <div class="px-6 py-5 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Tambah Surat Keluar</h1>
                <p class="text-sm text-slate-500 mt-0.5">Silakan isi formulir di bawah ini untuk mencatat surat keluar baru.</p>
            </div>
            <a href="{{ route('surat-keluar.index') }}" 
               class="inline-flex items-center gap-1.5 px-3 py-1.5 border border-slate-300 text-slate-700 hover:bg-slate-100 rounded-lg text-sm font-medium transition duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Kembali</span>
            </a>
        </div>

        <!-- Form Input -->
        <form action="{{ route('surat-keluar.store') }}" method="POST" class="p-6 space-y-5">
            @csrf
            
            <!-- Nomor Surat -->
            <div>
                <label for="nomor_surat" class="block text-sm font-medium text-slate-700 mb-1">Nomor Surat</label>
                <input 
                    type="text" 
                    id="nomor_surat" 
                    name="nomor_surat" 
                    value="{{ old('nomor_surat') }}" 
                    placeholder="Contoh: 001/SK/ABC/2026"
                    class="w-full px-4 py-2.5 bg-slate-50 border rounded-lg text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition duration-200 @error('nomor_surat') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                >
                @error('nomor_surat') 
                    <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                        <span>⚠️</span> {{ $message }}
                    </p> 
                @enderror
            </div>

            <!-- Grid untuk Tanggal & Tujuan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Tanggal -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Surat</label>
                    <input 
                        type="date" 
                        id="tanggal" 
                        name="tanggal" 
                        value="{{ old('tanggal') }}" 
                        class="w-full px-4 py-2.5 bg-slate-50 border rounded-lg text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition duration-200 @error('tanggal') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                    >
                    @error('tanggal') 
                        <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                            <span>⚠️</span> {{ $message }}
                        </p> 
                    @enderror
                </div>

                <!-- Tujuan -->
                <div>
                    <label for="tujuan" class="block text-sm font-medium text-slate-700 mb-1">Tujuan Surat</label>
                    <input 
                        type="text" 
                        id="tujuan" 
                        name="tujuan" 
                        value="{{ old('tujuan') }}" 
                        placeholder="Contoh: Dinas Pendidikan"
                        class="w-full px-4 py-2.5 bg-slate-50 border rounded-lg text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition duration-200 @error('tujuan') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                    >
                    @error('tujuan') 
                        <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                            <span>⚠️</span> {{ $message }}
                        </p> 
                    @enderror
                </div>
            </div>

            <!-- Perihal -->
            <div>
                <label for="perihal" class="block text-sm font-medium text-slate-700 mb-1">Perihal</label>
                <input 
                    type="text" 
                    id="perihal" 
                    name="perihal" 
                    value="{{ old('perihal') }}" 
                    placeholder="Contoh: Permohonan Bantuan Dana"
                    class="w-full px-4 py-2.5 bg-slate-50 border rounded-lg text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition duration-200 @error('perihal') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                >
                @error('perihal') 
                    <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                        <span>⚠️</span> {{ $message)}}
                    </p> 
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block text-sm font-medium text-slate-700 mb-1">Keterangan (Opsional)</label>
                <textarea 
                    id="keterangan" 
                    name="keterangan" 
                    rows="3" 
                    placeholder="Tambahkan catatan atau keterangan tambahan di sini..."
                    class="w-full px-4 py-2.5 bg-slate-50 border rounded-lg text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition duration-200 @error('keterangan') border-red-500 focus:ring-red-500 @else border-slate-300 @enderror"
                >{{ old('keterangan') }}</textarea>
                @error('keterangan') 
                    <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                        <span>⚠️</span> {{ $message }}
                    </p> 
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="{{ route('surat-keluar.index') }}" 
                   class="px-4 py-2.5 border border-slate-300 text-slate-700 hover:bg-slate-100 rounded-lg text-sm font-medium transition duration-200">
                    Batal
                </a>
                <button 
                    type="submit" 
                    class="px-5 py-2.5 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2">
                    Simpan Surat
                </button>
            </div>
        </form>
    </div>
</div>
@endsection