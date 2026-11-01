@extends('layouts.app')

@section('title', 'Galeri Foto - SDN Doplang')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 pt-32 pb-20">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="bg-primary/10 text-primary px-4 py-1.5 rounded-full text-sm font-bold tracking-wider uppercase mb-4 inline-block">Momen Berharga</span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Galeri Foto Sekolah</h1>
            <div class="w-24 h-1.5 bg-primary mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg font-medium">
                Dokumentasi berbagai kegiatan dan momen berharga seluruh civitas akademika SDN Doplang.
            </p>
        </div>

        @if($galeri->count() > 0)
            <!-- Gallery Masonry Grid -->
            <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6" x-data="{ 
                selectedImage: null,
                selectedTitle: '',
                openModal(img, title) {
                    this.selectedImage = img;
                    this.selectedTitle = title;
                    document.body.style.overflow = 'hidden';
                },
                closeModal() {
                    this.selectedImage = null;
                    document.body.style.overflow = 'auto';
                }
            }">
                @foreach($galeri as $item)
                    <div class="break-inside-avoid group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 dark:border-slate-800 cursor-pointer"
                         @click="openModal('{{ asset('storage/' . $item->foto) }}', '{{ $item->judul }}')">
                        <!-- Image Container -->
                        <div class="overflow-hidden relative">
                            <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-center justify-center">
                                <i class="fas fa-search-plus text-3xl text-white drop-shadow-lg scale-50 group-hover:scale-100 transition-transform duration-300"></i>
                            </div>
                            <img src="{{ asset('storage/' . $item->foto) }}" 
                                 alt="{{ $item->judul }}"
                                 class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <!-- Text Content -->
                        <div class="p-5 relative z-20 bg-white dark:bg-slate-900">
                            <h3 class="text-gray-900 dark:text-white font-bold text-lg leading-tight mb-2 group-hover:text-primary transition-colors">{{ $item->judul }}</h3>
                            <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-sm">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ $item->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Lightbox Modal -->
                <div x-show="selectedImage" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 p-4 md:p-10"
                     @keydown.escape.window="closeModal()"
                     style="display: none;">
                    
                    <button @click="closeModal()" class="absolute top-6 right-6 text-white/50 hover:text-white transition text-3xl">
                        <i class="fas fa-times"></i>
                    </button>

                    <div class="max-w-5xl w-full flex flex-col items-center">
                        <img :src="selectedImage" class="max-h-[80vh] w-auto object-contain rounded-lg shadow-2xl">
                        <h2 x-text="selectedTitle" class="text-white text-2xl font-bold mt-6 text-center"></h2>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $galeri->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white dark:bg-slate-900 rounded-3xl shadow-sm">
                <div class="w-24 h-24 bg-gray-100 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="far fa-image text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Foto</h3>
                <p class="text-gray-500 dark:text-gray-400">Galeri foto akan segera kami perbarui.</p>
            </div>
        @endif
    </div>
</div>

<style>
    /* Custom pagination styling */
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
