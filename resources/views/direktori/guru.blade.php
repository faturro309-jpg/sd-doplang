@extends('layouts.app')

@section('title', 'Direktori Guru & Tendik - SDN Doplang')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 pt-32 pb-20">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="bg-primary/10 text-primary px-4 py-1.5 rounded-full text-sm font-bold tracking-wider uppercase mb-4 inline-block">Tenaga Pendidik</span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Direktori Guru & Tendik</h1>
            <div class="w-24 h-1.5 bg-primary mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg font-medium">
                Mengenal lebih dekat para pengajar dan staf kependidikan SDN Doplang yang berdedikasi tinggi.
            </p>
        </div>

        @if($gurus->count() > 0)
            <!-- Teachers Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($gurus as $guru)
                    <div class="group bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-md hover:shadow-2xl transition-all duration-500 border border-gray-100 dark:border-slate-800 flex flex-col items-center text-center">
                        <!-- Photo Container -->
                        <div class="w-40 h-40 rounded-full overflow-hidden relative mb-5 ring-4 ring-primary/10 group-hover:ring-primary/30 transition-all duration-300 shrink-0 shadow-inner">
                            @if($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}" 
                                     alt="{{ $guru->nama }}"
                                     class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 130"
                                         class="w-2/3 h-2/3 mt-4 text-gray-300 dark:text-slate-600" fill="currentColor">
                                        <circle cx="50" cy="38" r="22"/>
                                        <path d="M50 68 C28 68 12 82 10 110 L90 110 C88 82 72 68 50 68 Z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Info Content -->
                        <div class="w-full">
                            <h3 class="text-gray-900 dark:text-white font-bold text-lg sm:text-xl mb-1 group-hover:text-primary transition-colors line-clamp-2">{{ $guru->nama }}</h3>
                            @if($guru->nip)
                                <p class="text-sm text-gray-500 mb-2 font-mono">NIP: {{ $guru->nip }}</p>
                            @endif
                            <p class="text-primary font-semibold text-xs uppercase tracking-wider bg-primary/5 inline-block px-3 py-1 rounded-full mt-2">{{ $guru->jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white dark:bg-slate-900 rounded-3xl shadow-sm">
                <div class="w-24 h-24 bg-gray-100 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Data Belum Tersedia</h3>
                <p class="text-gray-500 dark:text-gray-400">Daftar guru akan segera kami perbarui.</p>
            </div>
        @endif
    </div>
</div>
@endsection
