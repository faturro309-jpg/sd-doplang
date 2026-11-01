<?php
\App\Models\Guru::truncate();
$data = [
    ['nama' => 'Susi Setya Nugraha, S.Pd.SD.', 'jabatan' => 'Kepala Sekolah', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Nur Widodo, S.Pd.', 'jabatan' => 'Guru Kelas VI', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Dika Adi Pradana, S.Pd.', 'jabatan' => 'Guru Kelas V', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Nurulia Ika Prasetyaningrum, S.Pd.', 'jabatan' => 'Guru Kelas I', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Septina Fajarwati, S.Pd.', 'jabatan' => 'Guru Kelas IV', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Muh. Muslih, S.Pd.I.', 'jabatan' => 'Guru PAI', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Diah Maulida Saraswati, S.Pd.', 'jabatan' => 'Guru PJOK', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Sekar Anggun Eka Prasasti, S.Pd.', 'jabatan' => 'Guru Kelas II', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Griva Anggriasari, S.Pd.', 'jabatan' => 'Guru Kelas III', 'deskripsi' => '', 'foto' => ''],
    ['nama' => 'Mardi Priyono', 'jabatan' => 'Tenaga ADM Sekolah', 'deskripsi' => '', 'foto' => '']
];
foreach($data as $d) {
    \App\Models\Guru::create($d);
}
echo "Seeded successfully.\n";
