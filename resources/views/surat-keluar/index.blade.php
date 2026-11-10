@extends('layouts.app')

@section('title', 'Daftar Surat Keluar')

@section('content')
<div class="space-y-6">
    
    <!-- Flash Message (Success) -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Page Header & Action Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Daftar Surat Keluar</h1>
            <p class="text-sm text-slate-500 mt-0.5">Kelola dan pantau seluruh arsip surat keluar instansi.</p>
        </div>
        
        @can('manage-letters')
        <a href="{{ route('surat-keluar.create') }}" 
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition duration-200 text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Tambah Surat Keluar</span>
        </a>
        @endcan
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs font-semibold uppercase tracking-wider">
                        <th class="py-3.5 px-4 sm:px-6 w-16 text-center">No</th>
                        <th class="py-3.5 px-4 sm:px-6">Nomor Surat</th>
                        <th class="py-3.5 px-4 sm:px-6">Tanggal</th>
                        <th class="py-3.5 px-4 sm:px-6">Tujuan</th>
                        <th class="py-3.5 px-4 sm:px-6">Perihal</th>
                        <th class="py-3.5 px-4 sm:px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($suratKeluar as $surat)
                        <tr class="hover:bg-slate-50/70 transition duration-150">
                            <td class="py-4 px-4 sm:px-6 text-center font-medium text-slate-400">{{ $loop->iteration }}</td>
                            <td class="py-4 px-4 sm:px-6 font-semibold text-slate-800">{{ $surat->nomor_surat }}</td>
                            <td class="py-4 px-4 sm:px-6 text-slate-600 whitespace-nowrap">{{ \Carbon\Carbon::parse($surat->tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="py-4 px-4 sm:px-6 font-medium text-slate-800">{{ $surat->tujuan }}</td>
                            <td class="py-4 px-4 sm:px-6 text-slate-600 max-w-xs truncate">{{ $surat->perihal }}</td>
                            <td class="py-4 px-4 sm:px-6 text-center whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('surat-keluar.show', $surat->id) }}" 
                                       class="px-2.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-medium transition duration-150 flex items-center gap-1" title="Detail">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        <span>Detail</span>
                                    </a>

                                    @can('manage-letters')
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('surat-keluar.edit', $surat->id) }}" 
                                           class="px-2.5 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-lg text-xs font-medium transition duration-150 flex items-center gap-1" title="Edit">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            <span>Edit</span>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')" 
                                                    class="px-2.5 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-medium transition duration-150 flex items-center gap-1" title="Hapus">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-sm font-medium text-slate-500">Belum ada data surat keluar.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection