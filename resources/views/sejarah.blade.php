@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-24 overflow-hidden flex items-center min-h-[60vh] bg-slate-900">
    <div class="absolute inset-0 z-0">
        <!-- Background Image -->
        <div class="w-full h-full opacity-30 bg-fixed bg-center bg-cover scale-105" style="background-image: url('{{ asset('images/hero-bg.jpeg') }}');"></div>
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-800/80 to-slate-900"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-xl" data-aos="fade-up">
            Sejarah <span class="text-sky-400">SDN Doplang</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Jejak Perjalanan Pendidikan dari Masa ke Masa
        </p>
        
        <div class="mt-8 animate-bounce" data-aos="fade-up" data-aos-delay="200">
            <p class="text-sm text-gray-400 mb-2">Telusuri Sejarah Kami</p>
            <i class="fas fa-arrow-down text-white text-xl"></i>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-slate-50 dark:bg-slate-800 transition-colors duration-300 -mt-10 rounded-t-[3rem] relative z-20 shadow-2xl">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Section 1: Asal Usul (Latest Photo Here) -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-lg border border-gray-100 dark:border-slate-700 overflow-hidden" data-aos="fade-up">
            <div class="bg-slate-900 text-white px-8 py-5 flex items-center gap-3">
                <i class="far fa-clock text-xl text-sky-400"></i>
                <h2 class="font-heading font-bold text-2xl">Asal Usul SDN Doplang</h2>
            </div>
            <div class="p-8 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed text-lg">
                    <p>
                        SD Negeri Doplang merupakan lembaga pendidikan dasar negeri yang terletak di Jalan Tentara Pelajar No. 16, Kelurahan Doplang, Kecamatan Purworejo, Kabupaten Purworejo. Berdasarkan informasi profil sekolah yang tersedia secara publik, SD Negeri Doplang berdiri pada tanggal 1 Februari 1985.
                    </p>
                    <p>
                        Kehadiran sekolah ini menjadi wujud komitmen dalam menyediakan layanan pendidikan dasar bagi masyarakat di wilayah Doplang dan sekitarnya. Sejak awal berdirinya, SD Negeri Doplang berperan dalam membentuk generasi muda melalui penyelenggaraan kegiatan belajar mengajar yang berorientasi pada pengembangan pengetahuan, karakter, dan keterampilan siswa.
                    </p>
                    <p>
                        Seiring berjalannya waktu, sekolah ini terus berkembang dengan dukungan masyarakat dan pemerintah, baik dalam peningkatan mutu pendidikan maupun penyediaan sarana dan prasarana sekolah.
                    </p>
                </div>
                <div class="rounded-2xl overflow-hidden shadow-md relative group">
                    <img src="{{ asset('images/home-hero.png') }}" alt="SDN Doplang Terbaru" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>

        <!-- Section 2: Kilas Balik -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-lg border border-gray-100 dark:border-slate-700 overflow-hidden" data-aos="fade-up">
            <div class="bg-sky-700 text-white px-8 py-5 flex items-center gap-3">
                <i class="far fa-building text-xl"></i>
                <h2 class="font-heading font-bold text-2xl">Kilas Balik & Perkembangan Gedung</h2>
            </div>
            <div class="p-8 md:p-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 dark:border-slate-700 order-2 lg:order-1">
                    <img src="{{ asset('images/sejarah-kilas-balik.png') }}" class="w-full h-full object-cover shadow" alt="Halaman SDN Doplang">
                </div>
                <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed text-lg order-1 lg:order-2">
                    <h3 class="font-bold text-gray-900 dark:text-white text-xl mb-4">Perkembangan Fasilitas & Gedung SDN Doplang</h3>
                    <p>
                        Sejak awal berdirinya pada 1 Februari 1985, SDN Doplang secara bertahap telah melalui berbagai pembenahan dan peningkatan sarana prasarana fisik untuk menunjang kegiatan belajar mengajar yang nyaman.
                    </p>
                    <p>
                        Peningkatan fasilitas dan pemeliharaan gedung sekolah ini selalu dilakukan dengan mempertimbangkan kualitas pendidikan yang lebih baik, dengan dukungan penuh dari masyarakat setempat dan pemerintah.
                    </p>
                </div>
            </div>
        </div>

        <!-- Section 3: Timeline -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-lg border border-gray-100 dark:border-slate-700 overflow-hidden" data-aos="fade-up">
            <div class="bg-slate-900 text-white px-8 py-5 flex items-center gap-3">
                <i class="far fa-calendar-alt text-xl text-sky-400"></i>
                <h2 class="font-heading font-bold text-2xl">Garis Waktu SDN Doplang</h2>
            </div>
            <div class="p-8 md:p-10 relative">
                <!-- Vertical Line -->
                <div class="absolute left-10 md:left-24 top-10 bottom-10 w-1 bg-gray-200 dark:bg-slate-700 hidden md:block"></div>
                
                <div class="space-y-10">
                    <!-- Timeline Item 1 -->
                    <div class="relative flex flex-col md:flex-row items-start md:items-center gap-6" data-aos="fade-up">
                        <div class="md:w-32 flex-shrink-0 z-10 flex md:justify-end">
                            <div class="bg-sky-600 text-white font-bold py-2 px-4 rounded-full shadow-md text-sm">
                                1985
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-slate-800 p-6 rounded-2xl border border-gray-100 dark:border-slate-700 flex-grow shadow-sm hover:shadow-md transition">
                            <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-2">Awal Berdiri</h3>
                            <p class="text-gray-600 dark:text-gray-400">SD Negeri Doplang berdiri secara resmi pada tanggal 1 Februari 1985 untuk menyediakan layanan pendidikan dasar bagi masyarakat wilayah Doplang.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="relative flex flex-col md:flex-row items-start md:items-center gap-6" data-aos="fade-up">
                        <div class="md:w-32 flex-shrink-0 z-10 flex md:justify-end">
                            <div class="bg-sky-600 text-white font-bold py-2 px-4 rounded-full shadow-md text-sm">
                                Perkembangan
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-slate-800 p-6 rounded-2xl border border-gray-100 dark:border-slate-700 flex-grow shadow-sm hover:shadow-md transition">
                            <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-2">Peningkatan Mutu dan Fasilitas</h3>
                            <p class="text-gray-600 dark:text-gray-400">Sekolah terus berkembang baik dalam perbaikan mutu pendidikan, kegiatan belajar mengajar, maupun penyediaan sarana gedung seiring berjalannya waktu.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="relative flex flex-col md:flex-row items-start md:items-center gap-6" data-aos="fade-up">
                        <div class="md:w-32 flex-shrink-0 z-10 flex md:justify-end">
                            <div class="bg-sky-600 text-white font-bold py-2 px-4 rounded-full shadow-md text-sm">
                                Saat Ini
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-slate-800 p-6 rounded-2xl border border-gray-100 dark:border-slate-700 flex-grow shadow-sm hover:shadow-md transition">
                            <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-2">Pendidikan Karakter & Prestasi</h3>
                            <p class="text-gray-600 dark:text-gray-400">Saat ini SDN Doplang secara aktif terus membentuk generasi muda yang berorientasi pada pengembangan pengetahuan, karakter, dan keterampilan peserta didik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
