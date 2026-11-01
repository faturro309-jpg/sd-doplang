@extends('layouts.app')

@section('content')
<!-- Hero Section (Redesigned) -->
<section class="relative pt-28 pb-32 sm:pt-32 sm:pb-40 lg:pt-48 lg:pb-52 overflow-hidden bg-slate-900 transition-colors duration-500">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/home-hero.png') }}" alt="SDN Doplang Background" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 bg-black/10 dark:bg-slate-900/40"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/30 via-transparent to-transparent"></div>
    </div>

    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-20">
        <!-- Accent Wave (Light Blue Glow) -->
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="absolute bottom-0 left-0 w-full h-[70px] sm:h-[110px] text-sky-400/20 fill-current blur-sm transition-colors duration-500">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C58,117.26,163.75,123.67,321.39,56.44Z" transform="translate(0, 10)"></path>
        </svg>
        
        <!-- Main Wave -->
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] sm:h-[100px] text-white dark:text-slate-900 fill-current drop-shadow-[0_-5px_15px_rgba(56,189,248,0.2)] transition-colors duration-500">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C58,117.26,163.75,123.67,321.39,56.44Z" class="stroke-sky-400/30" stroke-width="1"></path>
        </svg>
    </div>


    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            <!-- Left: Content -->
            <div data-aos="fade-right">
                <div class="inline-block px-4 py-1.5 rounded-full bg-white/20 text-white font-bold text-xs sm:text-sm tracking-wide mb-6 border border-white/30 backdrop-blur-md shadow-lg">
                    <i class="fas fa-check-circle mr-2 text-sky-300"></i> Akreditasi A - Sekolah Unggulan
                </div>
                
                <h1 class="font-heading text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-[1.1] drop-shadow-lg">
                    Selamat<br>
                    Datang di<br>
                    <span class="relative inline-block text-sky-300">
                        SD Negeri<br>Doplang
                        <svg class="absolute -bottom-7 left-0 w-full h-8 text-yellow-400" viewBox="0 0 300 30" preserveAspectRatio="none">
                            <path d="M5,5 Q150,25 295,5" stroke="currentColor" stroke-width="8" fill="none" stroke-linecap="round" class="opacity-80" />
                            <path d="M10,12 Q150,32 290,12" stroke="currentColor" stroke-width="6" fill="none" stroke-linecap="round" class="opacity-40" />
                        </svg>
                    </span>
                </h1>
                
                <p class="text-lg sm:text-xl text-sky-50 mb-10 leading-relaxed font-medium drop-shadow-sm max-w-2xl">
                    Beriman, Kreatif, Berprestasi, Berkarakter, dan Berbudaya. Mari bergabung bersama kami dalam membentuk generasi hebat penerus bangsa.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <a href="{{ route('visi-misi') }}" class="bg-white text-sky-800 hover:bg-sky-50 font-bold py-3.5 px-8 rounded-full transition-all w-full sm:w-auto shadow-xl flex items-center justify-center gap-2 hover:-translate-y-1">
                        <span>Visi & Misi</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('ppdb.create') }}" class="bg-sky-500/20 hover:bg-sky-500/30 text-white border-2 border-white/30 font-bold py-3.5 px-8 rounded-full transition-all w-full sm:w-auto flex items-center justify-center gap-2 hover:-translate-y-1 backdrop-blur-md">
                        <span>Pendaftaran Baru</span>
                        <i class="fas fa-user-plus"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Image Grid -->
            <div class="hidden lg:grid grid-cols-2 gap-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="space-y-6 pt-12">
                    <div class="rounded-3xl overflow-hidden shadow-2xl transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/hero/1.png') }}" alt="School" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-3xl overflow-hidden shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/hero/2.png') }}" alt="Students" class="w-full h-48 object-cover">
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="rounded-3xl overflow-hidden shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/hero/3.png') }}" alt="Activities" class="w-full h-48 object-cover">
                    </div>
                    <div class="rounded-3xl overflow-hidden shadow-2xl transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/hero/4.png') }}" alt="Ceremony" class="w-full h-64 object-cover">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Statistik Overlap Section -->
<section class="relative z-30 -mt-16 sm:-mt-24 lg:-mt-32">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 lg:gap-8" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl p-6 lg:p-8 text-center shadow-2xl border border-white/20 dark:border-slate-700 hover:-translate-y-2 transition-all">
                <h4 class="font-bold text-4xl text-sky-600 dark:text-sky-400 mb-2">111+</h4>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Siswa Aktif</p>
            </div>
            <div @click="activeModal = 'guru'" class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl p-6 lg:p-8 text-center shadow-2xl border border-white/20 dark:border-slate-700 hover:-translate-y-2 transition-all cursor-pointer group">
                <h4 class="font-bold text-4xl text-sky-600 dark:text-sky-400 mb-2 group-hover:scale-110 transition-transform">10</h4>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Guru & Staf</p>
            </div>
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl p-6 lg:p-8 text-center shadow-2xl border border-white/20 dark:border-slate-700 hover:-translate-y-2 transition-all">
                <h4 class="font-bold text-4xl text-sky-600 dark:text-sky-400 mb-2">500+</h4>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Alumni</p>
            </div>
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl p-6 lg:p-8 text-center shadow-2xl border border-white/20 dark:border-slate-700 hover:-translate-y-2 transition-all">
                <h4 class="font-bold text-4xl text-sky-600 dark:text-sky-400 mb-2">A</h4>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Akreditasi</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Info -->
<section class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300 relative z-20">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8" data-aos="fade-up">
            
            <!-- Card 1: Visi Kami -->
            <a href="{{ route('visi-misi') }}" class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-gray-200 dark:border-slate-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-sky-300 dark:hover:border-slate-500 group relative overflow-hidden flex flex-col h-full">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-sky-600 to-sky-400"></div>
                <div class="w-14 h-14 rounded-2xl bg-sky-50 dark:bg-slate-700 flex items-center justify-center text-sky-600 mb-6 group-hover:bg-sky-600 group-hover:text-white transition-colors shadow-inner">
                    <i class="fas fa-bullseye text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl mb-3 text-gray-900 dark:text-white relative z-10 flex items-center justify-between">
                    Visi Kami
                    <i class="fas fa-arrow-right text-sm text-sky-600 opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </h3>
                <p class="text-gray-600 dark:text-gray-400 relative z-10 leading-relaxed text-sm lg:text-base">"Terwujudnya Peserta didik yang bertaqwa, berkarakter, berprestasi, berkebhinekaan global, dan peduli lingkungan."</p>
            </a>

            <!-- Card 2: Fasilitas Lengkap -->
            <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-gray-200 dark:border-slate-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-sky-300 dark:hover:border-slate-500 group relative overflow-hidden flex flex-col h-full cursor-pointer" onclick="document.getElementById('detail-sekolah').scrollIntoView({behavior: 'smooth'})">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-sky-600 to-sky-400"></div>
                <div class="w-14 h-14 rounded-2xl bg-sky-50 dark:bg-slate-700 flex items-center justify-center text-sky-600 mb-6 group-hover:bg-sky-600 group-hover:text-white transition-colors shadow-inner">
                    <i class="fas fa-laptop-house text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl mb-3 text-gray-900 dark:text-white relative z-10 flex items-center justify-between">
                    Fasilitas Lengkap
                    <i class="fas fa-arrow-down text-sm text-sky-600 opacity-0 group-hover:opacity-100 transition-all -translate-y-2 group-hover:translate-y-0"></i>
                </h3>
                <p class="text-gray-600 dark:text-gray-400 relative z-10 leading-relaxed text-sm lg:text-base">Dilengkapi dengan sarana dan prasarana modern untuk mendukung proses belajar mengajar yang optimal.</p>
            </div>

            <!-- Card 3: Tenaga Pengajar -->
            <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-gray-200 dark:border-slate-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-sky-300 dark:hover:border-slate-500 group relative overflow-hidden flex flex-col h-full cursor-pointer" onclick="document.getElementById('detail-sekolah').scrollIntoView({behavior: 'smooth'})">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-sky-600 to-sky-400"></div>
                <div class="w-14 h-14 rounded-2xl bg-sky-50 dark:bg-slate-700 flex items-center justify-center text-sky-600 mb-6 group-hover:bg-sky-600 group-hover:text-white transition-colors shadow-inner">
                    <i class="fas fa-user-graduate text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl mb-3 text-gray-900 dark:text-white relative z-10 flex items-center justify-between">
                    Tenaga Pengajar
                    <i class="fas fa-arrow-down text-sm text-sky-600 opacity-0 group-hover:opacity-100 transition-all -translate-y-2 group-hover:translate-y-0"></i>
                </h3>
                <p class="text-gray-600 dark:text-gray-400 relative z-10 leading-relaxed text-sm lg:text-base">Didampingi oleh guru-guru profesional yang berdedikasi tinggi dalam mendidik sepenuh hati.</p>
            </div>
            
        </div>
    </div>
</section>


<!-- Sambutan Kepala Sekolah -->
@php
    $kepsek = $gurus->firstWhere('jabatan', 'Kepala Sekolah');
@endphp
<section class="py-24 bg-slate-50 dark:bg-slate-900 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="font-heading font-bold text-3xl md:text-5xl text-gray-900 dark:text-white mb-4">Sambutan <span class="text-sky-600">Kepala Sekolah</span></h2>
            <div class="w-24 h-1.5 bg-sky-500 mx-auto rounded-full"></div>
        </div>

        <div class="relative pt-20" data-aos="fade-up">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-40 h-40 rounded-full border-8 border-white dark:border-slate-800 shadow-2xl overflow-hidden z-20 bg-gradient-to-br from-sky-500 to-sky-700 flex items-center justify-center">
                @if($kepsek && $kepsek->foto)
                    <img src="{{ asset('storage/' . $kepsek->foto) }}" alt="{{ $kepsek->nama }}" class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('images/kepsek.jpg') }}" alt="Kepala Sekolah" class="w-full h-full object-cover" onerror="this.outerHTML='<i class=\'fas fa-user-tie text-white text-7xl\'></i>'">
                @endif
            </div>
            
            <div class="bg-white dark:bg-slate-800 rounded-[3rem] p-10 md:p-16 shadow-2xl border border-gray-100 dark:border-slate-700 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-sky-500 to-sky-300"></div>
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-sky-50 dark:bg-slate-700/30 rounded-full blur-3xl"></div>
                
                <i class="fas fa-quote-left text-5xl text-sky-100 dark:text-slate-700 absolute top-12 left-12"></i>
                
                <div class="relative z-10 pt-10">
                    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 italic leading-relaxed mb-8">
                        {{ $kepsek->deskripsi ?? '"Assalamu\'alaikum warahmatullahi wabarakatuh. Selamat datang di website resmi SD Negeri Doplang. Website ini kami hadirkan sebagai media informasi dan jembatan komunikasi antara sekolah, orang tua wali murid, serta masyarakat. Kami berharap portal ini dapat memberikan gambaran nyata mengenai kegiatan dan perkembangan belajar anak-anak di sekolah. Mari kita terus bersinergi dalam mendampingi putra-putri kita agar tumbuh menjadi generasi yang cerdas, berkarakter, dan berakhlak mulia."' }}
                    </p>
                    
                    <div class="space-y-1">
                        <h4 class="font-heading font-bold text-2xl text-gray-900 dark:text-white">{{ $kepsek->nama ?? 'Budi Pracoyo, S.Pd.SD.' }}</h4>
                        <p class="text-sky-600 font-bold tracking-widest uppercase text-sm">Kepala Sekolah SDN Doplang</p>
                    </div>
                </div>

                <i class="fas fa-quote-right text-5xl text-sky-100 dark:text-slate-700 absolute bottom-12 right-12"></i>
            </div>
        </div>
    </div>
</section>

<!-- Profil & Detail Sekolah Section -->
<section id="detail-sekolah" class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300 relative overflow-hidden" x-data="{ activeModal: null }">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-400/5 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3 pointer-events-none"></div>

    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <div class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary dark:text-sky-400 font-bold text-sm tracking-wide mb-4 border border-primary/20">Profil Singkat</div>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-gray-900 dark:text-white mb-4">Mengenal SD Negeri Doplang</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">Pusat pendidikan dasar unggulan yang berdedikasi untuk mencetak generasi cerdas, berkarakter, dan berwawasan luas.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            <!-- Left: Identitas Sekolah -->
            <div class="lg:col-span-5 flex flex-col gap-8" data-aos="fade-right">
                <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-200 dark:border-slate-700 h-full flex flex-col relative overflow-hidden group hover:border-primary/20 transition-colors">
                    <!-- Top accent line -->
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-primary to-sky-300"></div>
                    <!-- Watermark Icon -->
                    <div class="absolute -bottom-8 -right-8 text-slate-50 dark:text-slate-700/20 rotate-[15deg] transform group-hover:scale-110 group-hover:rotate-[10deg] transition-all duration-700 pointer-events-none">
                        <i class="fas fa-school text-[220px]"></i>
                    </div>
                    
                    <div class="mb-8 border-b border-gray-100 dark:border-slate-700 pb-8 relative z-10">
                        <div class="flex items-center gap-5">
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-50 to-sky-100 dark:from-slate-700 dark:to-slate-600 text-primary dark:text-sky-400 flex items-center justify-center text-4xl shadow-inner border border-blue-100/50 dark:border-slate-600 shrink-0">
                                <i class="fas fa-school"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-2xl text-gray-900 dark:text-white mb-1">SD Negeri Doplang</h3>
                                <p class="text-primary dark:text-sky-400 font-bold text-sm uppercase tracking-wider">Sekolah Berstandar Nasional</p>
                            </div>
                        </div>
                    </div>
                        <div class="flex-1 relative z-10">
                            <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-slate-700 shadow-sm relative z-10">
                                <table class="w-full text-left text-sm text-gray-600 dark:text-gray-400">
                                    <tbody class="divide-y divide-gray-200 dark:divide-slate-700">
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Nama Sekolah</th>
                                            <td class="px-4 py-2.5 font-bold text-gray-900 dark:text-white">SD Negeri Doplang</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">NPSN</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">20338820</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">NSS</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">101030606028</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Jenjang Pendidikan</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">Sekolah Dasar</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Status Sekolah</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">Negeri</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Akreditasi</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">A Tahun 2021</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Alamat</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">Jalan Tentara Pelajar No . 16</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Kelurahan</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">Doplang</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Kecamatan</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">Purworejo</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Kode Pos</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">54114</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Kabupaten/Kota</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">Purworejo</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Provinsi</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">Jawa Tengah</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-900 dark:text-white w-[40%] bg-slate-50 dark:bg-slate-800/50 border-r border-gray-200 dark:border-slate-700">Email</th>
                                            <td class="px-4 py-2.5 text-gray-900 dark:text-white">sdndoplang20@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- Right: Sarana Prasarana & Struktur Organisasi -->
            <div class="lg:col-span-7 flex flex-col gap-6" data-aos="fade-left">
                <!-- Sarana Prasarana (Simplified) -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-slate-700">
                    <h3 class="font-heading font-bold text-2xl text-gray-900 dark:text-white mb-6 border-b border-gray-100 dark:border-slate-700 pb-4">Sarana & Prasarana</h3>
                    
                    @php
                        $colorClasses = [
                            ['hover' => 'hover:border-emerald-500', 'bg' => 'bg-emerald-100 dark:bg-emerald-900/30', 'text' => 'text-emerald-600 dark:text-emerald-400'],
                            ['hover' => 'hover:border-blue-500', 'bg' => 'bg-blue-100 dark:bg-blue-900/30', 'text' => 'text-blue-600 dark:text-blue-400'],
                            ['hover' => 'hover:border-purple-500', 'bg' => 'bg-purple-100 dark:bg-purple-900/30', 'text' => 'text-purple-600 dark:text-purple-400'],
                            ['hover' => 'hover:border-orange-500', 'bg' => 'bg-orange-100 dark:bg-orange-900/30', 'text' => 'text-orange-600 dark:text-orange-400'],
                            ['hover' => 'hover:border-red-500', 'bg' => 'bg-red-100 dark:bg-red-900/30', 'text' => 'text-red-600 dark:text-red-400'],
                            ['hover' => 'hover:border-teal-500', 'bg' => 'bg-teal-100 dark:bg-teal-900/30', 'text' => 'text-teal-600 dark:text-teal-400'],
                        ];
                    @endphp
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @forelse($fasilitas as $item)
                        @php
                            $style = $colorClasses[$loop->index % count($colorClasses)];
                        @endphp
                        <div class="bg-slate-50 dark:bg-slate-900/50 p-4 rounded-2xl border border-gray-100 dark:border-slate-700 flex flex-col items-center justify-center text-center group {{ $style['hover'] }} transition-colors">
                            <div class="w-12 h-12 rounded-full {{ $style['bg'] }} {{ $style['text'] }} flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <i class="{{ $item->icon ?: 'fas fa-check-circle' }} text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 dark:text-white text-lg">{{ $item->jumlah }}</h4>
                            <p class="text-xs text-gray-500 font-medium">{{ $item->nama }}</p>
                        </div>
                        @empty
                        <div class="col-span-full text-center text-gray-500 text-sm py-4">Belum ada data fasilitas.</div>
                        @endforelse
                    </div>
                </div>

                <!-- Struktur Organisasi -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-slate-700" x-data="{ showBagan: false }">
                        <h3 class="font-heading font-bold text-xl text-gray-900 dark:text-white mb-4">Struktur Organisasi</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Klik tombol di bawah ini untuk melihat bagan struktur organisasi SD Negeri Doplang.</p>
                        
                        <button @click="showBagan = true" class="w-full bg-emerald-50 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400 hover:bg-emerald-500 hover:text-white border border-emerald-200 dark:border-emerald-800 py-4 rounded-xl font-bold transition-all flex items-center justify-center gap-3 group">
                            <i class="fas fa-sitemap text-xl group-hover:scale-110 transition-transform"></i>
                            <span>Lihat Bagan Struktur Organisasi</span>
                        </button>

                        <!-- Modal -->
                        <div x-show="showBagan" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6" x-cloak>
                            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showBagan = false" x-transition.opacity></div>
                            <div class="relative bg-white dark:bg-slate-800 w-full max-w-5xl rounded-3xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]" x-transition.scale.origin.center>
                                <div class="flex justify-between items-center p-4 sm:p-6 border-b border-gray-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/80">
                                    <h3 class="font-heading font-bold text-xl text-gray-900 dark:text-white">Bagan Struktur Organisasi</h3>
                                    <button @click="showBagan = false" class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="p-4 sm:p-8 overflow-y-auto bg-slate-50 dark:bg-slate-900 flex justify-center items-start flex-1 min-h-[50vh]">
                                    <!-- Tailwind Org Chart -->
                                    <div class="flex flex-col items-center gap-6 pb-10 w-full overflow-x-auto">
                                        
                                        <!-- Level 1: Kepala Sekolah -->
                                        <div class="flex flex-col items-center">
                                            <div class="bg-white dark:bg-slate-800 border-2 border-emerald-500 shadow-lg rounded-xl p-4 text-center w-64 relative z-10">
                                                <h4 class="font-bold text-gray-900 dark:text-white text-sm">KEPALA SEKOLAH</h4>
                                                <div class="w-10 h-0.5 bg-emerald-500 mx-auto my-2"></div>
                                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">Budi Pracoyo, S.Pd.SD</p>
                                                <p class="text-xs text-gray-500">NIP: 196804061994031008</p>
                                            </div>
                                            <!-- Vertical Line -->
                                            <div class="w-0.5 h-6 bg-emerald-500"></div>
                                        </div>

                                        <!-- Level 2: Guru Kelas (Horizontal Branches) -->
                                        <div class="relative flex flex-col items-center w-full max-w-5xl">
                                            <!-- Horizontal Connector -->
                                            <div class="absolute top-0 w-[85%] h-0.5 bg-emerald-500"></div>
                                            
                                            <div class="flex flex-wrap justify-center gap-4 w-full relative z-10 pt-6">
                                                <!-- Vertical connectors for each item are done via margin/padding and pseudo elements, but for simplicity we use top borders or absolute divs -->
                                                
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-36">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU KELAS I</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Nurulla Ika P., S.Pd.</p>
                                                    </div>
                                                </div>
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-36">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU KELAS II</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Sekar Anggun E. P., S.Pd.</p>
                                                    </div>
                                                </div>
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-36">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU KELAS III</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Griva Anggrasari, S.Pd.</p>
                                                    </div>
                                                </div>
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-36">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU KELAS IV</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Septina Fajarwati, S.Pd.</p>
                                                    </div>
                                                </div>
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-36">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU KELAS V</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Dika Adi Pradana, S.Pd.</p>
                                                    </div>
                                                </div>
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-36">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU KELAS VI</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Nur Widodo, S.Pd.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Center Main Trunk Connector -->
                                        <div class="w-0.5 h-8 bg-emerald-500 -mt-6"></div>

                                        <!-- Level 3: Guru Mapel & ADM -->
                                        <div class="relative flex flex-col items-center w-full max-w-2xl">
                                            <div class="absolute top-0 w-[60%] h-0.5 bg-emerald-500"></div>
                                            <div class="flex justify-center gap-8 w-full relative z-10 pt-6">
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-40">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU PAI</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Muh. Muslih, S.Pd.I.</p>
                                                    </div>
                                                </div>
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-40">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">GURU PJOK</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Diah Maulida S., S.Pd.</p>
                                                    </div>
                                                </div>
                                                <div class="relative flex flex-col items-center">
                                                    <div class="absolute -top-6 w-0.5 h-6 bg-emerald-500"></div>
                                                    <div class="bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-700/50 shadow-md rounded-lg p-3 text-center w-40">
                                                        <h4 class="font-bold text-gray-900 dark:text-white text-xs">TENAGA ADM</h4>
                                                        <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Mardi Priyono</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Main Trunk Continues -->
                                        <div class="w-0.5 h-8 bg-emerald-500 -mt-6"></div>

                                        <!-- Level 4: Penjaga Sekolah -->
                                        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-600 shadow-sm rounded-lg p-3 text-center w-48 relative z-10">
                                            <h4 class="font-bold text-gray-900 dark:text-white text-xs">PENJAGA SEKOLAH</h4>
                                            <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-1">Mardi Priyono</p>
                                        </div>

                                        <div class="w-0.5 h-8 bg-emerald-500"></div>

                                        <!-- Level 5: Siswa -->
                                        <div class="bg-emerald-500 text-white shadow-md rounded-lg p-3 text-center w-48 relative z-10">
                                            <h4 class="font-bold text-sm tracking-widest">SISWA / SISWI</h4>
                                        </div>

                                        <div class="w-0.5 h-8 border-l-2 border-dashed border-emerald-500"></div>

                                        <!-- Level 6: Masyarakat -->
                                        <div class="bg-white dark:bg-slate-800 border-2 border-dashed border-gray-300 dark:border-slate-600 rounded-lg p-3 text-center w-56 relative z-10">
                                            <h4 class="font-bold text-gray-600 dark:text-gray-400 text-xs">MASYARAKAT SEKITAR</h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terbaru -->
<section class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300 relative overflow-hidden">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-gray-900 dark:text-white mb-4">Berita Terbaru</h2>
            <div class="w-24 h-1.5 bg-primary mx-auto rounded-full mb-6"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($beritas as $berita)
            <div class="bg-slate-50 dark:bg-slate-800 rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative h-48 overflow-hidden">
                    @if($berita->foto)
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                            <i class="far fa-image text-4xl text-slate-400"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        {{ $berita->created_at->format('d M Y') }}
                    </div>
                </div>
                <div class="p-6">
                    <a href="{{ route('berita.show', $berita->slug) }}" class="block font-bold text-xl mb-3 text-gray-900 dark:text-white hover:text-primary transition-colors line-clamp-2">
                        {{ $berita->judul }}
                    </a>
                    <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3 mb-4">
                        {{ Str::limit(strip_tags($berita->konten), 100) }}
                    </p>
                    <a href="{{ route('berita.show', $berita->slug) }}" class="text-primary font-bold text-sm hover:underline">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 bg-slate-900 dark:bg-sky-600 text-white px-8 py-3 rounded-full hover:bg-primary font-bold transition-colors">
                Lihat Semua Berita <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Lokasi / Map Section -->
<section class="py-24 bg-slate-50 dark:bg-slate-800 transition-colors duration-300 relative overflow-hidden">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch" data-aos="zoom-in">
            <!-- Info Card -->
            <div class="lg:col-span-5 xl:col-span-4 bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-xl border border-gray-200 dark:border-slate-700 h-full flex flex-col justify-center">
                <h3 class="font-heading font-bold text-2xl lg:text-3xl text-gray-900 dark:text-white mb-8 relative inline-block">
                    Informasi Kontak
                    <div class="absolute -bottom-3 left-0 w-12 h-1.5 bg-primary rounded-full"></div>
                </h3>
                
                <ul class="space-y-6 flex-1">
                    <li class="flex items-start gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400 flex items-center justify-center shrink-0 border border-blue-100 dark:border-slate-700 shadow-sm">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 dark:text-white mb-1">Alamat Lengkap</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Sekolah Dasar Negeri Doplang, Jl. Tentara Pelajar, Rw. III, Kel. Doplang, Kec. Purworejo, Kab. Purworejo, Jawa Tengah 54114</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400 flex items-center justify-center shrink-0 border border-blue-100 dark:border-slate-700 shadow-sm">
                            <i class="fas fa-phone-alt text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 dark:text-white mb-1">Telepon</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">(0275) 324777</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400 flex items-center justify-center shrink-0 border border-blue-100 dark:border-slate-700 shadow-sm">
                            <i class="fas fa-envelope text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 dark:text-white mb-1">Email</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">sdndoplang20@gmail.com</p>
                        </div>
                    </li>
                </ul>
                
                <a href="https://maps.google.com/?q=7XHV%2BM7G+Sekolah+Dasar+Negeri+Doplang,+Jl.+Tentara+Pelajar,+Doplang,+Purworejo" target="_blank" class="mt-8 flex items-center justify-center gap-3 w-full bg-blue-600 text-white py-4 rounded-2xl hover:bg-blue-700 font-bold transition-all shadow-md hover:shadow-xl hover:-translate-y-1">
                    <i class="fas fa-external-link-alt"></i> Lihat di Google Maps
                </a>
            </div>
            
            <!-- Map Container -->
            <div class="lg:col-span-7 xl:col-span-8 bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-xl border border-gray-200 dark:border-slate-700 flex flex-col min-h-[400px]">
                <div class="rounded-2xl overflow-hidden w-full relative bg-slate-100 dark:bg-slate-800 flex-grow min-h-[250px] mb-6">
                    <iframe src="https://maps.google.com/maps?q=7XHV%2BM7G+Sekolah+Dasar+Negeri+Doplang,+Jl.+Tentara+Pelajar,+Doplang,+Purworejo&t=&z=16&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="absolute inset-0"></iframe>
                </div>
                
                <div class="px-2">
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400 mb-6">
                        <div>
                            <span class="block text-gray-500 text-xs mb-1">Lintang</span>
                            <span class="font-bold text-gray-900 dark:text-white">-7.7208</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs mb-1">Bujur</span>
                            <span class="font-bold text-gray-900 dark:text-white">109.993</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://maps.google.com/?q=7XHV%2BM7G+Sekolah+Dasar+Negeri+Doplang,+Jl.+Tentara+Pelajar,+Doplang,+Purworejo" target="_blank" class="flex-1 flex items-center justify-center gap-2 bg-white dark:bg-slate-800 border border-blue-200 dark:border-blue-900/50 text-blue-600 dark:text-blue-400 py-2.5 rounded-xl hover:bg-blue-50 dark:hover:bg-slate-700 font-bold transition-colors">
                            <i class="fas fa-map"></i> Google Maps
                        </a>
                        <button onclick="navigator.clipboard.writeText('https://maps.google.com/?q=7XHV%2BM7G+Sekolah+Dasar+Negeri+Doplang,+Jl.+Tentara+Pelajar,+Doplang,+Purworejo'); alert('Tautan Peta berhasil disalin!')" class="flex-1 flex items-center justify-center gap-2 bg-white dark:bg-slate-800 border border-blue-200 dark:border-blue-900/50 text-blue-600 dark:text-blue-400 py-2.5 rounded-xl hover:bg-blue-50 dark:hover:bg-slate-700 font-bold transition-colors">
                            <i class="fas fa-link"></i> Salin Tautan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection