<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun admin terlebih dahulu
        $this->call(AdminSeeder::class);

        Fasilitas::create(['nama' => 'Fasilitas Lengkap', 'deskripsi' => 'Ruang kelas nyaman, laboratorium komputer, perpustakaan modern, dan area olahraga yang luas.', 'icon' => 'fas fa-building']);
        
        Guru::create(['nama' => 'Budi Pracoyo, S.Pd.SD.', 'jabatan' => 'Kepala Sekolah', 'deskripsi' => 'Mewujudkan visi sekolah dengan kepemimpinan yang berintegritas.', 'foto' => '']);
        
        Guru::create(['nama' => 'NUR WIDODO, S.Pd.', 'jabatan' => 'Guru Kelas VI', 'deskripsi' => 'Pendidik berpengalaman untuk kelas akhir.', 'foto' => '']);
        Guru::create(['nama' => 'DIKA ADI PRADANA, S.Pd.', 'jabatan' => 'Guru Kelas V', 'deskripsi' => 'Membimbing siswa dengan metode inovatif.', 'foto' => '']);
        Guru::create(['nama' => 'NURULIA IKA PRASETYANINGRUM, S.Pd.', 'jabatan' => 'Guru Kelas I', 'deskripsi' => 'Sabar dalam membimbing awal pendidikan siswa.', 'foto' => '']);
        Guru::create(['nama' => 'SEPTINA FAJARWATI, S.Pd.', 'jabatan' => 'Guru Kelas IV', 'deskripsi' => 'Berdedikasi tinggi dalam pengajaran.', 'foto' => '']);
        Guru::create(['nama' => 'MUH. MUSHLIH, S.Pd.I.', 'jabatan' => 'Guru PAI (Kelas I-VI)', 'deskripsi' => 'Pendidik Agama Islam.', 'foto' => '']);
        Guru::create(['nama' => 'DIAH MAULIDA SARASWATI, S.Pd.', 'jabatan' => 'Guru PJOK (Kelas I-VI)', 'deskripsi' => 'Pengajar Olahraga dan Kesehatan.', 'foto' => '']);
        Guru::create(['nama' => 'SEKAR ANGGUN EKA PRASASTI, S.Pd.', 'jabatan' => 'Guru Kelas II', 'deskripsi' => 'Mendidik dengan kasih sayang.', 'foto' => '']);
        Guru::create(['nama' => 'GRIVA ANGGRIASARI, S.Pd.', 'jabatan' => 'Guru Kelas III', 'deskripsi' => 'Kreatif dalam mengajar.', 'foto' => '']);
        Guru::create(['nama' => 'MARDI PRIYONO', 'jabatan' => 'Tenaga Administrasi', 'deskripsi' => 'Pelayanan administrasi sekolah.', 'foto' => '']);
        
        Prestasi::create(['judul' => 'Juara 1 OSN Matematika Tingkat Kecamatan', 'kategori' => 'Akademik', 'deskripsi' => 'Siswa kami secara konsisten meraih peringkat atas dalam kompetisi sains dan matematika tingkat kabupaten. Dedikasi tim pengajar dalam membimbing bakat anak-anak memastikan setiap siswa mendapatkan tantangan yang sesuai dengan potensi mereka.']);
        Prestasi::create(['judul' => 'Juara Umum FLS2N Bidang Seni Tari', 'kategori' => 'Non-Akademik', 'deskripsi' => 'Terkenal dengan prestasi seni dan olahraga, SDN Doplang telah membawa pulang berbagai trofi dari festival budaya dan turnamen atletik. Kami percaya bahwa pengembangan bakat di luar kelas sangat penting untuk membentuk karakter yang tangguh.']);
        
        Ekstrakurikuler::create(['nama' => 'Drum Band', 'deskripsi' => 'Membangun kedisiplinan dan kekompakan tim melalui irama musik yang membangkitkan semangat.', 'icon' => 'fas fa-drum']);
        Ekstrakurikuler::create(['nama' => 'Menari', 'deskripsi' => 'Melestarikan budaya bangsa sambil mengasah kelenturan tubuh dan rasa percaya diri di atas panggung.', 'icon' => 'fas fa-smile']);
        Ekstrakurikuler::create(['nama' => 'Melukis', 'deskripsi' => 'Wadah kreativitas tanpa batas untuk mengekspresikan imajinasi melalui goresan kuas dan warna.', 'icon' => 'fas fa-pen']);
        Ekstrakurikuler::create(['nama' => 'Baca Tulis Al-Qur\'an', 'deskripsi' => 'Membentuk karakter religius dan spiritualitas anak melalui pendalaman kitab suci sejak dini.', 'icon' => 'fas fa-book']);
        Ekstrakurikuler::create(['nama' => 'Pramuka', 'deskripsi' => 'Menanamkan jiwa kepemimpinan, kemandirian, dan cinta alam dalam setiap kegiatan kepanduan.', 'icon' => 'fas fa-fire']);
        Ekstrakurikuler::create(['nama' => 'Voli', 'deskripsi' => 'Meningkatkan ketangkasan fisik dan kerja sama tim dalam olahraga bola voli yang kompetitif.', 'icon' => 'fas fa-bolt']);
    }
}
