@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-24 overflow-hidden flex items-center min-h-[60vh] bg-slate-900">
    <div class="absolute inset-0 z-0">
        <!-- Background Image -->
        <div class="w-full h-full opacity-20 bg-fixed bg-center bg-cover scale-105" style="background-image: url('{{ asset('images/hero-bg.jpeg') }}');"></div>
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/90 to-slate-900"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/20 bg-white/10 text-white text-sm font-medium mb-6" data-aos="fade-down">
            <i class="far fa-user"></i> TAHUN AJARAN {{ date('Y') }}/{{ date('Y')+1 }}
        </div>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-xl" data-aos="fade-up">
            Penerimaan Siswa Baru
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Informasi Pendaftaran Peserta Didik Baru SD Negeri Doplang
        </p>
        
        <div class="mt-8 animate-bounce" data-aos="fade-up" data-aos-delay="200">
            <p class="text-sm text-gray-400 mb-2">Lihat Informasi</p>
            <i class="fas fa-arrow-down text-white text-xl"></i>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-12 bg-slate-50 dark:bg-slate-800 transition-colors duration-300 relative z-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24">
        
        <!-- Main Card -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-slate-700" data-aos="fade-up">
            <!-- Card Header -->
            <div class="bg-primary px-6 py-5 text-white flex items-center gap-3">
                <i class="fas fa-shield-check text-xl"></i>
                <h2 class="font-heading font-bold text-xl">Sistem Penerimaan Murid Baru (SPMB)</h2>
            </div>
            
            <div class="p-6 md:p-8 space-y-8">
                <!-- Info Banner -->
                <div class="bg-sky-50 dark:bg-sky-900/20 border-l-4 border-sky-500 p-4 rounded-r-lg">
                    <p class="text-sky-800 dark:text-sky-300 font-medium">
                        Pendaftaran Penerimaan Siswa Baru Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }} akan diumumkan melalui:
                    </p>
                </div>

                <!-- Three Columns Icons -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Website -->
                    <div class="text-center p-6 rounded-xl border border-gray-100 dark:border-slate-700 hover:shadow-md transition">
                        <div class="w-16 h-16 rounded-full bg-sky-50 dark:bg-sky-900/30 flex items-center justify-center text-primary text-2xl mx-auto mb-4">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-2">Website Sekolah</h3>
                        <a href="{{ url('/') }}" class="text-sm text-primary hover:underline break-all">sdndoplang.sch.id</a>
                    </div>
                    
                    <!-- Media Sosial -->
                    <div class="text-center p-6 rounded-xl border border-gray-100 dark:border-slate-700 hover:shadow-md transition">
                        <div class="w-16 h-16 rounded-full bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 text-2xl mx-auto mb-4">
                            <i class="far fa-comments"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-2">Media Sosial</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Facebook, Instagram, dan WhatsApp</p>
                    </div>

                    <!-- Sekolah -->
                    <div class="text-center p-6 rounded-xl border border-gray-100 dark:border-slate-700 hover:shadow-md transition">
                        <div class="w-16 h-16 rounded-full bg-teal-50 dark:bg-teal-900/30 flex items-center justify-center text-teal-600 dark:text-teal-400 text-2xl mx-auto mb-4">
                            <i class="far fa-building"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-2">Sekolah</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Pengumuman di papan informasi sekolah</p>
                    </div>
                </div>

                <!-- Proses Pendaftaran Manual -->
                <div class="bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500 p-6 rounded-r-lg">
                    <h3 class="font-bold text-gray-900 dark:text-white mb-2 text-lg">Proses Pendaftaran Manual</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Pendaftaran dilakukan secara manual dengan datang langsung ke sekolah dan membawa berkas persyaratan. Informasi lengkap mengenai persyaratan akan diumumkan melalui channel di atas.
                    </p>
                </div>

                <!-- Location & Contact Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4 border-t border-gray-100 dark:border-slate-700">
                    <!-- Lokasi -->
                    <div>
                        <div class="flex items-center gap-2 font-bold text-primary mb-3">
                            <i class="fas fa-map-marker-alt"></i> Lokasi Pendaftaran
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                            SD Negeri Doplang<br>
                            Jalan Tentara Pelajar No.16, Keseneng<br>
                            Kec. Purworejo, Kab. Purworejo<br>
                            Provinsi Jawa Tengah 54111
                        </p>
                        
                        <!-- Embedded Google Map -->
                        <div class="rounded-xl overflow-hidden shadow-inner border border-gray-100 dark:border-slate-700 h-48 w-full bg-gray-100">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.544146462747!2d110.0076!3d-7.7126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8ca16e913a8d%3A0x7d6b38c356999999!2sSD%20Negeri%20Doplang!5e0!3m2!1sen!2sid!4v1714080000000!5m2!1sen!2sid" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <a href="https://maps.app.goo.gl/r6L6W9S2nQj7n6Y6" target="_blank" class="inline-block mt-3 text-sm text-primary hover:underline font-medium">
                            <i class="fas fa-external-link-alt"></i> Buka di Google Maps
                        </a>
                    </div>

                    <!-- Kontak -->
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2 font-bold text-primary mb-3">
                            <i class="fas fa-phone-alt"></i> Kontak Panitia PPDB
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 text-sm space-y-4 flex-grow">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-sky-50 dark:bg-sky-900/30 flex items-center justify-center text-primary">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <span>(0275) 324777</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-sky-50 dark:bg-sky-900/30 flex items-center justify-center text-primary">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <span>halo@sdndoplang.sch.id</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-sky-50 dark:bg-sky-900/30 flex items-center justify-center text-primary">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <span>Senin-Jumat, 07.30-14.00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Catatan Penting -->
        <div class="mt-8 bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-slate-700" data-aos="fade-up">
            <div class="bg-amber-600 text-white px-6 py-4 flex items-center gap-3">
                <i class="fas fa-exclamation-triangle"></i>
                <h2 class="font-heading font-bold text-lg">Catatan Penting</h2>
            </div>
            <div class="p-6 md:p-8">
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-info-circle text-amber-600 mt-1"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm md:text-base">Informasi lengkap mengenai jadwal, persyaratan, dan prosedur pendaftaran akan diumumkan mendekati masa pendaftaran.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-info-circle text-amber-600 mt-1"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm md:text-base">Pastikan untuk selalu memantau pengumuman resmi dari sekolah melalui channel yang telah ditentukan.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-info-circle text-amber-600 mt-1"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm md:text-base">Pendaftaran hanya dilakukan secara langsung di sekolah dengan membawa berkas persyaratan asli dan fotokopi.</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>
@endsection
