@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $colors = [
                    'text-teal-600 bg-teal-100 dark:bg-teal-900/50 dark:text-teal-400',
                    'text-pink-600 bg-pink-100 dark:bg-pink-900/50 dark:text-pink-400',
                    'text-orange-600 bg-orange-100 dark:bg-orange-900/50 dark:text-orange-400',
                    'text-emerald-600 bg-emerald-100 dark:bg-emerald-900/50 dark:text-emerald-400',
                    'text-red-500 bg-red-100 dark:bg-red-900/50 dark:text-red-400',
                    'text-blue-500 bg-blue-100 dark:bg-blue-900/50 dark:text-blue-400'
                ];
            @endphp
            @foreach($ekstrakurikuler as $idx => $ekskul)
            @php
                // Default assets mapping
                $defaultFoto = match($ekskul->nama) {
                    'Drum Band' => 'images/drumband.jpg',
                    'Menari' => 'images/hero/1.png',
                    'Melukis' => 'images/melukis.jpg',
                    'Baca Tulis Al-Qur\'an' => 'images/tbtq.jpg',
                    'Pramuka' => 'images/hero/4.png',
                    'Voli' => 'images/voli.jpg',
                    default => ''
                };
                
                // Use DB photo if exists, otherwise use default asset
                $fotoUrl = $ekskul->foto ? asset('storage/' . $ekskul->foto) : asset($defaultFoto);
            @endphp
            <div class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-sm border border-gray-100 dark:border-slate-700 hover:shadow-xl transition-all duration-300 group hover:-translate-y-2 flex flex-col h-full">
                <div class="h-48 bg-slate-100 dark:bg-slate-800 relative overflow-hidden">
                    @if($ekskul->foto || $defaultFoto)
                        <img src="{{ $fotoUrl }}" alt="{{ $ekskul->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-primary/20">
                            <i class="{{ $ekskul->icon }} text-6xl"></i>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                <div class="p-8 flex-1 flex flex-col">
                    <h3 class="font-heading font-bold text-xl mb-3 text-gray-900 dark:text-white group-hover:text-primary transition-colors">{{ $ekskul->nama }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-sm lg:text-base">
                        {{ $ekskul->deskripsi }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
