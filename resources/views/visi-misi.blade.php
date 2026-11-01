@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-24 overflow-hidden flex items-center min-h-[60vh] bg-slate-900">
    <div class="absolute inset-0 z-0">
        <!-- Optional Background Image (Uncomment to use) -->
        <!-- <img src="{{ asset('images/hero-bg.jpeg') }}" class="w-full h-full object-cover object-center opacity-20 bg-fixed" /> -->
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-xl" data-aos="fade-up">
            Visi, Misi & <span class="text-sky-400">Tujuan Sekolah</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Informasi terbaru dari SDN Doplang
        </p>
        
        <div class="mt-8 animate-bounce" data-aos="fade-up" data-aos-delay="200">
            <p class="text-sm text-gray-400 mb-2">Lihat Detail</p>
            <i class="fas fa-chevron-down text-sky-400 text-xl"></i>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-slate-50 dark:bg-slate-800 transition-colors duration-300 -mt-10 rounded-t-[3rem] relative z-20 shadow-2xl">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-gray-900 dark:text-white mb-4">Landasan & Arah Tujuan Sekolah</h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed max-w-3xl mx-auto">
                Komitmen kami dalam menciptakan lingkungan belajar yang inspiratif, berkarakter, dan berprestasi tertuang dalam visi, misi, dan tujuan sekolah.
            </p>
            <div class="w-24 h-1 bg-primary mx-auto mt-8 rounded-full"></div>
        </div>

        <div class="space-y-12">
            <!-- Visi -->
            <div class="bg-white dark:bg-slate-900 p-8 md:p-10 rounded-3xl shadow-lg border border-gray-100 dark:border-slate-700" data-aos="fade-up">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-sky-100 dark:bg-slate-800 text-primary dark:text-sky-400 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-gray-900 dark:text-white">Visi Sekolah</h3>
                </div>
                <div class="pl-0 md:pl-18">
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed font-medium italic border-l-4 border-primary pl-6 py-2">
                        "Terwujudnya Peserta didik yang bertaqwa, berkarakter, berprestasi, berkebhinekaan global, dan peduli lingkungan."
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="bg-white dark:bg-slate-900 p-8 md:p-10 rounded-3xl shadow-lg border border-gray-100 dark:border-slate-700" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-sky-100 dark:bg-slate-800 text-primary dark:text-sky-400 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-gray-900 dark:text-white">Misi Sekolah</h3>
                </div>
                <div class="pl-0 md:pl-18">
                    <ul class="space-y-4 text-gray-700 dark:text-gray-300">
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">1.</span>
                            <span class="leading-relaxed">Membangun kebiasaan tertib beribadah, kajian keagamaan rutin dan 5S (Senyum, Sapa, Salam, Santun dan Sopan) pada peserta didik.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">2.</span>
                            <span class="leading-relaxed">Memperoleh dan memproses informasi dan gagasan, menganalisis dan mengevaluasi penalaran, merefleksi dan mengevaluasi pemikirannya, menghasilkan gagasan yang orisinal.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">3.</span>
                            <span class="leading-relaxed">Mengenal dan menghargai budaya, komunikasi dan interaksi antar budaya, refleksi dan tanggungjawab terhadap pengalaman kebhinekaan, berkeadilan sosial.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">4.</span>
                            <span class="leading-relaxed">Mengembangkan dan menerapkan pembelajaran berbasis HOTS dan membangun 6 kemampuan literasi dasar (literasi baca dan tulis, literasi numerasi, literasi sains, literasi digital, literasi budaya dan literasi finansial) dengan berlandaskan prinsip kejujuran, kemandirian dengan memperhatikan bakat dan minat peserta didik.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">5.</span>
                            <span class="leading-relaxed">Memfasilitasi terlampauinya capaian kompetensi minimal tingkat SD oleh peserta didik melalui matrikulasi, pemantauan perkembangan belajar, identifikasi permasalahan belajar, perbaikan, pendampingan, pengembangan dan kerjasama dengan orang tua.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">6.</span>
                            <span class="leading-relaxed">Membangun kesadaran untuk membiasakan dan menerapkan gaya hidup peduli lingkungan sehingga dapat melestarikan dan menjaga kebersihan lingkungan sekolah.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tujuan -->
            <div class="bg-white dark:bg-slate-900 p-8 md:p-10 rounded-3xl shadow-lg border border-gray-100 dark:border-slate-700" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-sky-100 dark:bg-slate-800 text-primary dark:text-sky-400 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                        <i class="fas fa-flag-checkered"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-gray-900 dark:text-white">Tujuan Sekolah</h3>
                </div>
                <div class="pl-0 md:pl-18">
                    <ul class="space-y-4 text-gray-700 dark:text-gray-300">
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">1.</span>
                            <span class="leading-relaxed">Mewujudkan peserta didik yang memiliki sikap religius dan berakhlak mulia sesuai dengan profil pelajar Pancasila.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">2.</span>
                            <span class="leading-relaxed">Meningkatkan prestasi peserta didik baik di bidang akademik maupun non-akademik secara berkelanjutan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">3.</span>
                            <span class="leading-relaxed">Menumbuhkan sikap kesadaran akan kebhinekaan global dan kemampuan bersosialisasi dengan baik.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="font-bold min-w-[20px]">4.</span>
                            <span class="leading-relaxed">Mengembangkan karakter warga sekolah yang peduli dan proaktif terhadap pelestarian lingkungan sekitar.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection
