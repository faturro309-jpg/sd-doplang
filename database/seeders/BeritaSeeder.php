<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::create([
            'judul' => 'Kegiatan Kerja Bakti Rutin Menjaga Kebersihan Lingkungan Sekolah',
            'slug' => Str::slug('Kegiatan Kerja Bakti Rutin Menjaga Kebersihan Lingkungan Sekolah'),
            'konten' => '<p>Siswa-siswi SD Negeri Doplang hari ini melaksanakan kegiatan kerja bakti bersama para guru untuk menjaga kebersihan dan kenyamanan lingkungan sekolah. Kegiatan ini rutin dilakukan setiap hari Sabtu sebagai bagian dari program penguatan karakter peduli lingkungan.</p><p>Para siswa terlihat sangat antusias dalam membersihkan halaman, taman, dan ruang kelas masing-masing. Dengan lingkungan yang bersih, diharapkan proses belajar mengajar dapat berjalan lebih optimal dan sehat.</p>',
            'status' => 'Published',
        ]);
    }
}
