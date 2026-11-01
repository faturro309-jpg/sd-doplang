@extends('layouts.app')

@section('content')
<!-- Hero Background -->
<div class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 min-h-screen flex items-center justify-center overflow-hidden bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 to-transparent dark:from-primary/20"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-sky-300/20 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl border border-gray-200 dark:border-slate-700 p-8 md:p-12 relative overflow-hidden" data-aos="zoom-in">
            <!-- Background Decors -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-green-500/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-primary/10 rounded-full blur-2xl"></div>

            <div class="relative z-10">
                <div class="w-24 h-24 mx-auto bg-green-100 dark:bg-green-900/30 text-green-500 rounded-full flex items-center justify-center text-5xl mb-6 shadow-inner border-4 border-white dark:border-slate-800 relative">
                    <i class="fas fa-check"></i>
                    <div class="absolute inset-0 rounded-full border border-green-200 dark:border-green-800 animate-ping opacity-50"></div>
                </div>

                <h1 class="font-heading font-bold text-3xl md:text-4xl text-gray-900 dark:text-white mb-4">
                    Pendaftaran Berhasil!
                </h1>
                
                <div class="bg-slate-50 dark:bg-slate-700/50 rounded-2xl p-6 mb-8 border border-gray-100 dark:border-slate-600">
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-lg">
                        Terima kasih! Data calon peserta didik baru telah berhasil kami terima.
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Panitia PPDB SD Negeri Doplang akan memverifikasi data Anda. Harap menunggu informasi selanjutnya yang akan dikirimkan melalui nomor WhatsApp/HP yang telah Anda daftarkan.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('home') }}" class="w-full sm:w-auto px-8 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-700 dark:text-white font-bold rounded-xl transition-colors">
                        Kembali ke Beranda
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="w-full sm:w-auto px-8 py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl shadow-lg shadow-green-500/30 transition-all hover:-translate-y-1 flex items-center justify-center gap-2">
                        <i class="fab fa-whatsapp text-xl"></i> Hubungi Panitia
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
