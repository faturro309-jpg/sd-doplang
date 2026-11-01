@extends('layouts.app')

@section('title', 'Berita & Pengumuman - SDN Doplang')

@section('content')
<!-- Hero Cover Image -->
<div class="relative h-[250px] w-full mt-20 lg:mt-24 overflow-hidden bg-sky-600 dark:bg-slate-800">
    <!-- Subtle Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/40 to-sky-400/20 z-10"></div>
    <div class="absolute inset-0 z-20 flex items-center justify-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white drop-shadow-lg text-center font-heading">
            Berita <span class="text-sky-200">Sekolah</span>
        </h1>
    </div>
</div>

<section class="py-16 bg-slate-50 dark:bg-slate-900 transition-colors duration-500 min-h-screen">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12 flex flex-col lg:flex-row gap-12">
        
        <!-- Left Content: Main Grid -->
        <div class="w-full lg:w-[70%]">
            @if($beritas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                @foreach($beritas as $berita)
                <div class="rounded-3xl h-[450px] sm:h-[500px] w-full shadow-lg dark:shadow-slate-800/50 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 relative overflow-hidden group bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700">
                    
                    <!-- Image Area -->
                    <div class="relative h-[250px] overflow-hidden">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                                <i class="far fa-image text-5xl text-slate-400"></i>
                            </div>
                        @endif
                        
                        <!-- Floating Date -->
                        <div class="py-2 px-5 bg-primary text-white font-bold rounded-xl absolute left-6 bottom-4 z-20 shadow-md">
                            {{ $berita->created_at->translatedFormat('d M Y') }}
                        </div>
                    </div>
                    
                    <!-- Content Area -->
                    <div class="absolute bottom-0 left-0 right-0 bg-white dark:bg-slate-800 h-[220px] sm:h-[270px] pt-10 px-8 flex flex-col z-10 transition-colors duration-300">
                        <div class="flex-1">
                            <a href="{{ route('berita.show', $berita->slug) }}" class="block mb-3">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white line-clamp-2 hover:text-sky-600 transition-colors leading-tight">
                                    {{ $berita->judul }}
                                </h3>
                            </a>
                            <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($berita->konten), 120) }}
                            </p>
                        </div>
                        
                        <div class="pb-6 flex justify-center">
                            <a href="{{ route('berita.show', $berita->slug) }}" class="py-2.5 px-8 bg-slate-800 dark:bg-sky-600 hover:bg-primary dark:hover:bg-primary text-white font-bold rounded-full transition-colors text-sm w-full text-center">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $beritas->links() }}
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-slate-700">
                <div class="w-24 h-24 bg-gray-50 dark:bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="far fa-newspaper text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Berita</h3>
                <p class="text-gray-500 dark:text-gray-400">Nantikan informasi menarik lainnya dari kami.</p>
            </div>
            @endif
        </div>

        <!-- Right Content: Sidebar -->
        <div class="w-full lg:w-[30%] space-y-12">
            <!-- Berita Terkini -->
            <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-lg border border-gray-100 dark:border-slate-700">
                <div class="mb-6">
                    <h4 class="text-2xl font-bold text-gray-900 dark:text-white font-heading">Berita Terkini</h4>
                    <div class="w-16 h-1.5 bg-primary rounded-full mt-2"></div>
                </div>
                
                <div class="space-y-6">
                    @foreach($beritas->take(4) as $recent)
                    <a href="{{ route('berita.show', $recent->slug) }}" class="flex gap-4 group">
                        <div class="w-24 h-20 rounded-xl overflow-hidden shrink-0 relative">
                            @if($recent->foto)
                                <img src="{{ asset('storage/' . $recent->foto) }}" alt="thumb" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                                    <i class="far fa-image text-slate-400"></i>
                                </div>
                            @endif
                            <!-- Overlay Date -->
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center text-white text-xs font-bold text-center">
                                {{ $recent->created_at->format('d M') }}
                            </div>
                        </div>
                        <div>
                            <h5 class="text-sm font-bold text-gray-900 dark:text-white line-clamp-3 group-hover:text-primary transition-colors leading-snug">
                                {{ $recent->judul }}
                            </h5>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Banner / Link Cepat -->
            <a href="{{ route('ppdb.create') }}" class="block group">
                <div class="h-40 rounded-3xl overflow-hidden relative shadow-lg">
                    <img src="{{ asset('images/hero/2.png') }}" alt="Banner PPDB" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-sky-500/50 flex flex-col items-center justify-center p-4 text-center">
                        <h4 class="text-white font-bold text-xl mb-1">Pendaftaran Siswa Baru</h4>
                        <p class="text-white/90 text-sm">Telah Dibuka!</p>
                        <span class="mt-3 inline-block px-4 py-1.5 bg-white text-primary text-xs font-bold rounded-full group-hover:-translate-y-1 transition-transform">Daftar Sekarang</span>
                    </div>
                </div>
            </a>
        </div>

    </div>
</section>
@endsection
