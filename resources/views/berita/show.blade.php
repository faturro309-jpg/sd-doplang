@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 bg-white dark:bg-slate-900 transition-colors duration-500">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex mb-8 text-sm font-medium" data-aos="fade-right">
            <ol class="flex items-center space-x-2 text-gray-500 dark:text-gray-400">
                <li><a href="{{ route('home') }}" class="hover:text-sky-600 transition-colors">Beranda</a></li>
                <li><i class="fas fa-chevron-right text-[10px] mx-2"></i></li>
                <li><a href="{{ route('berita.index') }}" class="hover:text-sky-600 transition-colors">Berita</a></li>
                <li><i class="fas fa-chevron-right text-[10px] mx-2"></i></li>
                <li class="text-sky-600 truncate max-w-[200px]">{{ $berita->judul }}</li>
            </ol>
        </nav>

        <!-- Article Header -->
        <header class="mb-12" data-aos="fade-up">
            <h1 class="font-heading font-bold text-3xl md:text-5xl text-gray-900 dark:text-white mb-6 leading-tight">
                {{ $berita->judul }}
            </h1>
            
            <div class="flex flex-wrap items-center gap-6 text-sm text-gray-500 dark:text-gray-400">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-sky-100 dark:bg-slate-800 flex items-center justify-center text-sky-600">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <span>Admin Sekolah</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-calendar-alt text-sky-600"></i>
                    <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-clock text-sky-600"></i>
                    <span>{{ $berita->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($berita->foto)
        <div class="mb-12 rounded-[2.5rem] overflow-hidden shadow-2xl" data-aos="zoom-in">
            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-auto object-cover max-h-[500px]">
        </div>
        @endif

        <!-- Article Content -->
        <article class="prose prose-lg prose-sky max-w-none dark:prose-invert mb-16" data-aos="fade-up">
            {!! $berita->konten !!}
        </article>

        <hr class="border-gray-100 dark:border-slate-800 mb-16">

        <!-- Recent Berita (Sidebar equivalent) -->
        <div class="bg-slate-50 dark:bg-slate-800/50 rounded-[2.5rem] p-8 md:p-12" data-aos="fade-up">
            <h3 class="font-heading font-bold text-2xl text-gray-900 dark:text-white mb-8 flex items-center gap-3">
                <i class="fas fa-newspaper text-sky-600"></i>
                Berita Lainnya
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($recentBeritas as $recent)
                <a href="{{ route('berita.show', $recent->slug) }}" class="group block">
                    <div class="aspect-video rounded-2xl overflow-hidden mb-4 shadow-md group-hover:shadow-xl transition-all">
                        @if($recent->foto)
                            <img src="{{ asset('storage/' . $recent->foto) }}" alt="{{ $recent->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-sky-100 dark:bg-slate-700 flex items-center justify-center">
                                <i class="far fa-image text-3xl text-sky-300"></i>
                            </div>
                        @endif
                    </div>
                    <h4 class="font-bold text-gray-900 dark:text-white line-clamp-2 group-hover:text-sky-600 transition-colors text-sm md:text-base">
                        {{ $recent->judul }}
                    </h4>
                </a>
                @endforeach
            </div>
        </div>

        <!-- Back Link -->
        <div class="mt-12 text-center">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sky-600 font-bold hover:gap-3 transition-all">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Berita
            </a>
        </div>

    </div>
</section>
@endsection
