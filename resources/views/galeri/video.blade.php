@extends('layouts.app')

@section('title', 'Galeri Video - SDN Doplang')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 pt-32 pb-20">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="bg-primary/10 text-primary px-4 py-1.5 rounded-full text-sm font-bold tracking-wider uppercase mb-4 inline-block">Visual Sekolah</span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Galeri Video Sekolah</h1>
            <div class="w-24 h-1.5 bg-primary mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg font-medium">
                Saksikan berbagai momen menarik dan liputan kegiatan SDN Doplang dalam bentuk video.
            </p>
        </div>

        @if($galeri->count() > 0)
            <!-- Video Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($galeri as $item)
                    @php
                        // Extract YouTube ID if it's a YouTube link
                        $videoId = '';
                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item->link_video, $match)) {
                            $videoId = $match[1];
                        }
                    @endphp
                    <div class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-slate-800">
                        <!-- Video Container -->
                        <div class="aspect-video relative overflow-hidden bg-black">
                            @if($videoId)
                                <iframe class="w-full h-full" 
                                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                                        title="{{ $item->judul }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        allowfullscreen></iframe>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-white/50">
                                    <i class="fas fa-video-slash text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <!-- Text Content -->
                        <div class="p-6">
                            <h3 class="text-gray-900 dark:text-white font-bold text-xl leading-tight mb-3">{{ $item->judul }}</h3>
                            <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-sm">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ $item->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $galeri->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white dark:bg-slate-900 rounded-3xl shadow-sm">
                <div class="w-24 h-24 bg-gray-100 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-play-circle text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Video</h3>
                <p class="text-gray-500 dark:text-gray-400">Galeri video akan segera kami perbarui.</p>
            </div>
        @endif
    </div>
</div>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }
    .page-item .page-link {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-weight: bold;
        transition: all 0.3s;
        border: none;
        background: white;
        color: #64748b;
    }
    .dark .page-item .page-link {
        background: #1e293b;
        color: #94a3b8;
    }
    .page-item.active .page-link {
        background: #0ea5e9;
        color: white;
        box-shadow: 0 10px 15px -3px rgba(14, 165, 233, 0.4);
    }
</style>
@endsection
