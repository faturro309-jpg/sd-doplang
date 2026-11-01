<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

App\Models\Guru::truncate();

$gurus = [
    ['nip' => '198507132014061002', 'nama' => 'SUSI SETYA NUGRAHA, S.Pd.SD.', 'jabatan' => 'Kepala Sekolah'],
    ['nip' => '196709082006041006', 'nama' => 'NUR WIDODO, S.Pd.', 'jabatan' => 'Guru Kelas VI'],
    ['nip' => '199608312019031002', 'nama' => 'DIKA ADI PRADANA, S.Pd.', 'jabatan' => 'Guru Kelas V'],
    ['nip' => '199304262020122004', 'nama' => 'NURULIA IKA PRASETYANINGRUM, S.Pd.', 'jabatan' => 'Guru Kelas I'],
    ['nip' => '198409132022212013', 'nama' => 'SEPTINA FAJARWATI, S.Pd.', 'jabatan' => 'Guru Kelas IV'],
    ['nip' => '198805272023211005', 'nama' => 'MUH. MUSHLIH, S.Pd.I.', 'jabatan' => 'Guru PAI'],
    ['nip' => '199906262024212030', 'nama' => 'DIAH MAULIDA SARASWATI, S.Pd.', 'jabatan' => 'Guru PJOK'],
    ['nip' => '199104122025212037', 'nama' => 'SEKAR ANGGUN EKA PRASASTI, S.Pd.', 'jabatan' => 'Guru Kelas II'],
    ['nip' => '199801272025212017', 'nama' => 'GRIVA ANGGRISARI, S.Pd.', 'jabatan' => 'Guru Kelas III'],
    ['nip' => '198103052025211072', 'nama' => 'MARDI PRIYONO', 'jabatan' => 'Tenaga ADM & Penjaga Sekolah'],
];

foreach ($gurus as $guru) {
    App\Models\Guru::create($guru);
}

echo "Seeding completed!\n";
