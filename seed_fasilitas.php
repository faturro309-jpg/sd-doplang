<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

App\Models\Fasilitas::truncate();

$fasilitas = [
    ['nama' => 'Ruang Kelas', 'jumlah' => 6, 'icon' => 'fas fa-chalkboard', 'color' => 'emerald'],
    ['nama' => 'Ruang Guru', 'jumlah' => 1, 'icon' => 'fas fa-users', 'color' => 'blue'],
    ['nama' => 'Perpustakaan', 'jumlah' => 1, 'icon' => 'fas fa-book-reader', 'color' => 'purple'],
    ['nama' => 'Musholla', 'jumlah' => 1, 'icon' => 'fas fa-mosque', 'color' => 'orange'],
    ['nama' => 'Ruang UKS', 'jumlah' => 2, 'icon' => 'fas fa-first-aid', 'color' => 'red'],
    ['nama' => 'Lapangan Olahraga', 'jumlah' => 1, 'icon' => 'fas fa-futbol', 'color' => 'teal'],
];

foreach ($fasilitas as $item) {
    App\Models\Fasilitas::create([
        'nama' => $item['nama'],
        'jumlah' => $item['jumlah'],
        'deskripsi' => '',
        'icon' => $item['icon'],
    ]);
}

echo "Seeding fasilitas completed!\n";
