@extends('layouts.app')

@section('content')
<!-- Hero Background -->
<div class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 to-transparent dark:from-primary/20"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-sky-300/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/10 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary dark:text-sky-400 font-bold text-sm tracking-wide mb-4 border border-primary/20">
                Penerimaan Peserta Didik Baru
            </div>
            <h1 class="font-heading font-bold text-4xl md:text-5xl text-gray-900 dark:text-white mb-4 leading-tight">
                Formulir Pendaftaran <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-sky-400">Online</span>
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Lengkapi formulir di bawah ini dengan data yang valid dan benar untuk mendaftarkan putra-putri Anda ke SD Negeri Doplang.
            </p>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-gray-200 dark:border-slate-700 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <!-- Form Header Line -->
            <div class="h-2 w-full bg-gradient-to-r from-primary via-sky-400 to-blue-500"></div>
            
            <div class="p-8 md:p-12" x-data="{ step: 1, maxStep: 2 }">
                @if ($errors->any())
                <div class="mb-8 p-4 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-xl flex items-start gap-3 text-red-600 dark:text-red-400">
                    <i class="fas fa-exclamation-circle mt-0.5"></i>
                    <div>
                        <h4 class="font-bold mb-1">Pendaftaran Gagal</h4>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Stepper Progress -->
                <div class="mb-8">
                    <div class="flex items-center justify-between relative z-10">
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-white transition-colors duration-300"
                                :class="step >= 1 ? 'bg-primary shadow-lg shadow-primary/40' : 'bg-gray-200 dark:bg-slate-700 text-gray-500'">1</div>
                            <span class="text-xs font-bold mt-2" :class="step >= 1 ? 'text-primary' : 'text-gray-400'">Data Anak</span>
                        </div>
                        <div class="absolute top-5 left-1/4 right-1/4 h-1 bg-gray-200 dark:bg-slate-700 -z-10 rounded">
                            <div class="h-full bg-primary transition-all duration-500" :style="'width: ' + ((step-1)/(maxStep-1)*100) + '%'"></div>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-colors duration-300 text-white"
                                :class="step >= 2 ? 'bg-primary shadow-lg shadow-primary/40' : 'bg-gray-200 dark:bg-slate-700 text-gray-500'">2</div>
                            <span class="text-xs font-bold mt-2" :class="step >= 2 ? 'text-primary' : 'text-gray-400'">Data Orang Tua</span>
                        </div>
                    </div>
                </div>

                <form action="{{ route('ppdb.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Step 1: Data Calon Peserta Didik -->
                    <div x-show="step === 1" x-transition.opacity.duration.500ms>
                        <h3 class="font-heading font-bold text-xl text-gray-900 dark:text-white mb-6 pb-2 border-b border-gray-100 dark:border-slate-700 flex items-center gap-2">
                            <i class="fas fa-user-graduate text-primary"></i> Data Calon Peserta Didik
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="nama_lengkap" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="Masukkan nama lengkap sesuai akta kelahiran">
                            </div>

                            <div>
                                <label for="nisn" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">NISN <span class="text-red-500">*</span></label>
                                <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="Nomor Induk Siswa Nasional">
                            </div>

                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                                <select name="jenis_kelamin" id="jenis_kelamin" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label for="tempat_lahir" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="Kota/Kabupaten kelahiran">
                            </div>

                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            </div>

                            <div>
                                <label for="agama" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Agama <span class="text-red-500">*</span></label>
                                <select name="agama" id="agama" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                            </div>

                            <div>
                                <label for="asal_sekolah" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Asal Sekolah (TK/PAUD)</label>
                                <input type="text" name="asal_sekolah" id="asal_sekolah" value="{{ old('asal_sekolah') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="Boleh dikosongkan jika tidak ada">
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="button" @click="step++" class="px-8 py-3 bg-sky-500 hover:bg-sky-600 text-white font-bold rounded-xl shadow-lg transition-all flex items-center gap-2">
                                Lanjut <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Data Orang Tua / Wali -->
                    <div x-show="step === 2" x-transition.opacity.duration.500ms style="display: none;">
                        <h3 class="font-heading font-bold text-xl text-gray-900 dark:text-white mb-6 pb-2 border-b border-gray-100 dark:border-slate-700 flex items-center gap-2 mt-4">
                            <i class="fas fa-users text-primary"></i> Data Orang Tua / Wali
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_ayah" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nama Ayah <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            </div>

                            <div>
                                <label for="pekerjaan_ayah" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            </div>

                            <div>
                                <label for="nama_ibu" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nama Ibu Kandung <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            </div>

                            <div>
                                <label for="pekerjaan_ibu" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            </div>

                            <div class="md:col-span-2">
                                <label for="no_hp_ortu" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nomor WhatsApp / HP Orang Tua <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fab fa-whatsapp text-green-500 text-lg"></i>
                                    </div>
                                    <input type="text" name="no_hp_ortu" id="no_hp_ortu" value="{{ old('no_hp_ortu') }}" required
                                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        placeholder="081234567890">
                                </div>
                                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">Pastikan nomor aktif untuk keperluan informasi pendaftaran.</p>
                            </div>

                            <div class="md:col-span-2">
                                <label for="alamat_lengkap" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Alamat Lengkap Tempat Tinggal <span class="text-red-500">*</span></label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" rows="3" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="Jalan, RT/RW, Desa/Kelurahan, Kecamatan">{{ old('alamat_lengkap') }}</textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-8 flex flex-col md:flex-row gap-4 justify-between items-center border-t border-gray-100 dark:border-slate-700 mt-8">
                            <button type="button" @click="step--" class="px-8 py-3 bg-gray-200 dark:bg-slate-700 hover:bg-gray-300 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-200 font-bold rounded-xl transition-all flex items-center gap-2">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </button>
                            <button type="submit" class="w-full md:w-auto px-8 py-4 bg-primary hover:bg-sky-600 text-white font-bold rounded-xl shadow-lg shadow-primary/30 transition-all hover:-translate-y-1 flex items-center justify-center gap-2 group">
                                <span>Kirim Pendaftaran</span>
                                <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </div>
                        <p class="mt-4 text-sm text-gray-500 dark:text-gray-400 text-center">
                            <i class="fas fa-shield-alt text-primary/70 mr-1"></i> Data yang Anda kirimkan dilindungi dan hanya digunakan untuk keperluan PPDB.
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
