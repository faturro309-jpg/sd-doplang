<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => { localStorage.setItem('darkMode', val); if(val) document.documentElement.classList.add('dark'); else document.documentElement.classList.remove('dark'); })">

<head>
    <script>
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('darkMode', 'true');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('darkMode', 'false');
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi SDN Doplang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Nunito:wght@500;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS (CDN for immediate usage) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#0ea5e9', // Sky 500
                        secondary: '#f59e0b', // Amber 500
                        accent: '#10b981', // Emerald 500
                        dark: '#0f172a', // Slate 900
                        'dark-lighter': '#1e293b', // Slate 800
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Nunito', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .dark .glass-nav {
            background: rgba(15, 23, 42, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1A1A1A 0%, #000000 100%);
        }

        .text-glow {
            text-shadow: 0 0 20px rgba(240, 95, 64, 0.5);
        }
    </style>

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body
    class="bg-white text-gray-800 font-sans antialiased overflow-x-hidden dark:bg-slate-900 dark:text-gray-100 transition-colors duration-300">

    <!-- Navbar -->
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="fixed w-full z-50 glass-nav transition-all duration-300"
        x-data="{ scrolled: false, mobileMenuOpen: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group h-full">
                    {{-- Logo Tut Wuri Handayani --}}
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg"
                         alt="Logo Tut Wuri Handayani"
                         class="h-10 sm:h-12 w-auto object-contain flex-shrink-0 drop-shadow-md">
                    <span class="font-heading font-bold text-xl sm:text-3xl tracking-tight text-primary">
                        <span class="hidden sm:inline">SD Negeri Doplang</span>
                        <span class="sm:hidden">SDN Doplang</span>
                    </span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold text-[19px] transition {{ request()->routeIs('home') ? 'text-primary' : '' }}">Home</a>
                    
                    <!-- Profil Dropdown -->
                    <div class="relative h-full flex items-center" x-data="{ open: false }" @click.away="open = false"
                        @mouseenter="open = true" @mouseleave="open = false">
                        <button @click="open = !open"
                            class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold text-[19px] transition flex items-center gap-1">
                            Profil <i class="fas fa-chevron-down text-[11px] mt-0.5 transition-transform"
                                :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms style="display: none;"
                            class="absolute top-[80%] left-0 pt-3 w-52 z-50">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-gray-100 dark:border-slate-700 py-2">
                                <a href="{{ route('sejarah.index') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Sejarah Sekolah</a>
                                <a href="{{ route('visi-misi') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Visi & Misi</a>
                                <a href="/#detail-sekolah" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Sarana Prasarana</a>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Dropdown -->
                    <div class="relative h-full flex items-center" x-data="{ open: false }" @click.away="open = false"
                        @mouseenter="open = true" @mouseleave="open = false">
                        <button @click="open = !open"
                            class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold text-[19px] transition flex items-center gap-1">
                            Informasi <i class="fas fa-chevron-down text-[11px] mt-0.5 transition-transform"
                                :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms style="display: none;"
                            class="absolute top-[80%] left-0 pt-3 w-52 z-50">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-gray-100 dark:border-slate-700 py-2">
                                <a href="{{ route('berita.index') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Berita Terbaru</a>
                                <a href="{{ route('galeri.foto') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Galeri Foto</a>
                                <a href="{{ route('galeri.video') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Galeri Video</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kesiswaan Dropdown -->
                    <div class="relative h-full flex items-center" x-data="{ open: false }" @click.away="open = false"
                        @mouseenter="open = true" @mouseleave="open = false">
                        <button @click="open = !open"
                            class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold text-[19px] transition flex items-center gap-1">
                            Kesiswaan <i class="fas fa-chevron-down text-[11px] mt-0.5 transition-transform"
                                :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms style="display: none;"
                            class="absolute top-[80%] left-0 pt-3 w-52 z-50">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-gray-100 dark:border-slate-700 py-2">
                                <a href="{{ route('prestasi.index') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Prestasi</a>
                                <a href="{{ route('ekstrakurikuler.index') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Ekstrakurikuler</a>
                                <a href="{{ route('ppdb.create') }}" class="block px-4 py-2.5 text-[15px] font-bold text-gray-700 dark:text-gray-300 hover:bg-sky-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition">Pendaftaran PPDB</a>
                            </div>
                        </div>
                    </div>

                    <!-- Direktori Guru (Single Link) -->
                    <a href="{{ route('direktori.guru') }}" 
                        class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold text-[19px] transition">
                        Direktori Guru & Tendik
                    </a>
                </div>

                <!-- Right Actions -->
                <div class="hidden md:flex items-center space-x-6">
                    <button @click="darkMode = !darkMode"
                        class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition focus:outline-none text-xl">
                        <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
                    </button>
                    <a href="{{ url('admin/login') }}" class="bg-primary/10 text-primary dark:bg-emerald-500/20 dark:text-emerald-400 hover:bg-primary hover:text-white px-5 py-2 rounded-full font-bold transition-all text-sm">Login Admin</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center gap-4">
                    <button @click="darkMode = !darkMode"
                        class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary p-2 text-xl">
                        <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
                    </button>
                    <a href="{{ url('admin/login') }}" class="text-primary font-bold text-sm">Login</a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-gray-800 dark:text-gray-200 hover:text-primary p-2">
                        <i class="fas" :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            class="md:hidden bg-white dark:bg-slate-900 border-t border-gray-100 dark:border-slate-800 absolute w-full left-0 shadow-2xl">
            <div class="px-4 pt-4 pb-8 space-y-3">
                <a href="{{ route('home') }}"
                    class="block px-4 py-3 rounded-xl text-lg font-bold text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-slate-800 {{ request()->routeIs('home') ? 'bg-sky-50 dark:bg-sky-900/20 text-primary' : '' }}">Home</a>

                <!-- Profil Dropdown -->
                <div x-data="{ open: false }" class="border-t border-gray-100 dark:border-slate-800 pt-2 mt-2">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-3 py-3 rounded-md text-lg font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-primary dark:hover:text-primary">
                        Profil <i class="fas fa-chevron-down text-sm transition-transform"
                            :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition style="display: none;"
                        class="pl-4 pr-2 py-2 space-y-1 bg-gray-50/50 dark:bg-slate-800/50 rounded-lg mt-1">
                        <a href="{{ route('sejarah.index') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Sejarah Sekolah</a>
                        <a href="{{ route('visi-misi') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Visi & Misi</a>
                        <a href="/#detail-sekolah" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Sarana Prasarana</a>
                    </div>
                </div>

                <!-- Informasi Dropdown -->
                <div x-data="{ open: false }" class="border-t border-gray-100 dark:border-slate-800 pt-2 mt-2">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-3 py-3 rounded-md text-lg font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-primary dark:hover:text-primary">
                        Informasi <i class="fas fa-chevron-down text-sm transition-transform"
                            :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition style="display: none;"
                        class="pl-4 pr-2 py-2 space-y-1 bg-gray-50/50 dark:bg-slate-800/50 rounded-lg mt-1">
                        <a href="{{ route('berita.index') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Berita Terbaru</a>
                        <a href="{{ route('galeri.foto') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Galeri Foto</a>
                        <a href="{{ route('galeri.video') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Galeri Video</a>
                    </div>
                </div>

                <!-- Kesiswaan Dropdown -->
                <div x-data="{ open: false }" class="border-t border-gray-100 dark:border-slate-800 pt-2 mt-2">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-3 py-3 rounded-md text-lg font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-primary dark:hover:text-primary">
                        Kesiswaan <i class="fas fa-chevron-down text-sm transition-transform"
                            :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition style="display: none;"
                        class="pl-4 pr-2 py-2 space-y-1 bg-gray-50/50 dark:bg-slate-800/50 rounded-lg mt-1">
                        <a href="{{ route('prestasi.index') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Prestasi</a>
                        <a href="{{ route('ekstrakurikuler.index') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Ekstrakurikuler</a>
                        <a href="{{ route('ppdb.create') }}" class="block px-3 py-2 rounded-md text-[16px] font-bold text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary">Pendaftaran PPDB</a>
                    </div>
                </div>

                <!-- Direktori Guru -->
                <a href="{{ route('direktori.guru') }}"
                    class="block px-4 py-3 rounded-xl text-lg font-bold text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-slate-800">Direktori Guru & Tendik</a>
            </div>
        </div>
    </nav>        </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative bg-white dark:bg-slate-900 min-h-screen pt-20 transition-colors duration-300">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                class="fixed top-24 right-5 z-[60] bg-green-500/90 backdrop-blur text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 animate-fade-in-down">
                <i class="fas fa-check-circle text-2xl"></i>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-20 pb-10 border-t-[6px] border-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">

                <!-- Col 1: About -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="font-heading font-bold text-3xl mb-6 flex items-center gap-3">
                        <i class="fas fa-graduation-cap text-primary"></i> SDN Doplang
                    </h3>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        Mewujudkan generasi cerdas, berkarakter mulia, dan berwawasan luas. Tempat terbaik bagi anak
                        Anda untuk belajar dan berkembang dalam lingkungan yang asri dan suportif.
                    </p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition text-gray-300 hover:text-white"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/sdndoplang" target="_blank"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition text-gray-300 hover:text-white"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition text-gray-300 hover:text-white"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="font-heading font-bold text-xl mb-6 relative inline-block">
                        Tautan Cepat
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-primary rounded-full"></span>
                    </h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('home') }}"
                                class="hover:text-primary transition flex items-center gap-2"><i
                                    class="fas fa-chevron-right text-xs"></i> Beranda</a></li>
                        <li><a href="{{ route('prestasi.index') }}"
                                class="hover:text-primary transition flex items-center gap-2"><i
                                    class="fas fa-chevron-right text-xs"></i> Prestasi</a></li>
                        <li><a href="{{ route('ekstrakurikuler.index') }}"
                                class="hover:text-primary transition flex items-center gap-2"><i
                                    class="fas fa-chevron-right text-xs"></i> Ekstrakurikuler</a></li>
                        <li><a href="{{ route('alur.index') }}"
                                class="hover:text-primary transition flex items-center gap-2"><i
                                    class="fas fa-chevron-right text-xs"></i> Alur Pendaftaran</a></li>
                    </ul>
                </div>

                <!-- Col 3: Contact -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="font-heading font-bold text-xl mb-6 relative inline-block">
                        Hubungi Kami
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-primary rounded-full"></span>
                    </h4>
                    <ul class="space-y-4 text-gray-400">
                        <li class="flex items-start gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-map-marker-alt"></i></div>
                            <span class="mt-1 leading-snug">Jalan Tentara Pelajar No.16, Kec. Purworejo, Kab. Purworejo,
                                Prov. Jawa Tengah</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-phone-alt"></i></div>
                            <span>(0275) 324777</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-envelope"></i></div>
                            <span>halo@sdndoplang.sch.id</span>
                        </li>
                    </ul>
                </div>

            </div>

            <div
                class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} SD Negeri Doplang. Hak Cipta Dilindungi Undang-Undang.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-gray-300 transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-gray-300 transition">Syarat Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            offset: 50,
            once: true,
            mirror: false
        });
    </script>
    @stack('scripts')
</body>

</html>