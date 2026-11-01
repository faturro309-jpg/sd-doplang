@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 px-4 py-2 rounded-full text-sm font-bold uppercase tracking-widest mb-4 inline-block">Achievement</span>
            <h1 class="font-heading text-5xl font-extrabold text-gray-900 dark:text-white mb-6">Pencapaian & Prestasi</h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto leading-relaxed">
                Dedikasi dan kerja keras seluruh civitas akademika SD Negeri Doplang dalam mengukir tinta emas di berbagai bidang kompetisi.
            </p>
        </div>

        <!-- Section 1: Prestasi Akademik (Full Width Style) -->
        <div class="mb-24" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-1 bg-teal-500 rounded-full"></div>
                <h3 class="font-heading font-bold text-3xl text-gray-900 dark:text-white">Prestasi Akademik</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($prestasi_akademik as $prestasi)
                <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-slate-700 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-teal-50 dark:bg-teal-900/20 rounded-2xl flex items-center justify-center text-teal-600 dark:text-teal-400 mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-graduation-cap text-xl"></i>
                    </div>
                    <h4 class="font-bold text-xl text-gray-900 dark:text-white mb-3">{{ $prestasi->judul }}</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">{{ $prestasi->deskripsi }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Section 2: Prestasi Non-Akademik (The 2-Column Grid) -->
        <div data-aos="fade-up">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-1 bg-orange-500 rounded-full"></div>
                <h3 class="font-heading font-bold text-3xl text-gray-900 dark:text-white">Prestasi Non-Akademik</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                <!-- Card 1: POPDA Renang -->
                <div class="bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-lg border border-gray-100 dark:border-slate-700 group hover:shadow-2xl transition-all duration-500">
                    <div class="h-80 relative overflow-hidden">
                        <img src="/images/prestasi4.jpg" alt="POPDA Renang" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-80"></div>
                        <div class="absolute bottom-6 left-8 right-8">
                            <span class="bg-blue-500 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3 inline-block">Juara 2 - Desember 2025</span>
                            <h4 class="font-bold text-2xl text-white">POPDA Renang</h4>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Prestasi luar biasa di cabang olahraga renang yang diraih dalam ajang bergengsi tingkat kabupaten Purworejo.</p>
                    </div>
                </div>

                <!-- Card 2: Juara 2 Petanque -->
                <div class="bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-lg border border-gray-100 dark:border-slate-700 group hover:shadow-2xl transition-all duration-500">
                    <div class="h-80 relative overflow-hidden">
                        <img src="/images/prestasi1.jpg" alt="Juara 2 Petanque" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-80"></div>
                        <div class="absolute bottom-6 left-8 right-8">
                            <span class="bg-orange-500 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3 inline-block">Juara 2 - POPDA 2025</span>
                            <h4 class="font-bold text-2xl text-white">Juara 2 Petanque</h4>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Raihan medali perak yang membanggakan oleh tim Petanque dalam ajang Pekan Olahraga Pelajar Daerah.</p>
                    </div>
                </div>

                <!-- Card 3: Juara 1 Petanque Triple Mix -->
                <div class="bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-lg border border-gray-100 dark:border-slate-700 group hover:shadow-2xl transition-all duration-500">
                    <div class="h-80 relative overflow-hidden">
                        <img src="/images/prestasi3.jpg" alt="Petanque Triple Mix" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-80"></div>
                        <div class="absolute bottom-6 left-8 right-8">
                            <span class="bg-teal-500 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3 inline-block">Juara 1 - Tahun 2024</span>
                            <h4 class="font-bold text-2xl text-white">Petanque Triple Mix</h4>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Berhasil meraih peringkat pertama dalam kategori Triple Mix pada kejuaraan Petanque tingkat Kabupaten.</p>
                    </div>
                </div>

                <!-- Card 4: Juara 1 Petanque Kabupaten -->
                <div class="bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-lg border border-gray-100 dark:border-slate-700 group hover:shadow-2xl transition-all duration-500">
                    <div class="h-80 relative overflow-hidden">
                        <img src="/images/prestasi2.png" alt="Juara Petanque Kabupaten" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-80"></div>
                        <div class="absolute bottom-6 left-8 right-8">
                            <span class="bg-yellow-500 text-gray-900 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3 inline-block">Juara 1 - Tingkat Kabupaten</span>
                            <h4 class="font-bold text-2xl text-white">Juara 1 Petanque Kabupaten</h4>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Dominasi tim Petanque SDN Doplang dengan meraih Juara 1 tingkat Kabupaten secara berturut-turut.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
