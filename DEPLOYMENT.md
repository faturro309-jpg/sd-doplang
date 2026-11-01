# Panduan Deployment - Website SDN Doplang

**Framework:** Laravel 10 | **PHP:** ^8.1 | **Database:** MySQL | **Admin:** Filament 3

---

## Daftar Isi
1. [Persiapan Sebelum Upload](#1-persiapan-sebelum-upload)
2. [Cara Deploy ke Shared Hosting (cPanel)](#2-cara-deploy-ke-shared-hosting-cpanel)
3. [Cara Deploy ke VPS/Linux](#3-cara-deploy-ke-vpslinux)
4. [Konfigurasi .env Production](#4-konfigurasi-env-production)
5. [Setelah Deploy — Checklist](#5-setelah-deploy--checklist)
6. [Troubleshooting](#6-troubleshooting)

---

## 1. Persiapan Sebelum Upload

Lakukan langkah ini di **komputer lokal** sebelum upload ke server:

### A. Build aset frontend (Vite)
```bash
npm install
npm run build
```
Ini akan membuat folder `public/build/` yang berisi CSS dan JS yang sudah di-compile.

### B. Pastikan `.env.production` sudah diisi
Salin dan isi file `.env.production` (lihat [bagian 4](#4-konfigurasi-env-production)):
- `APP_URL` → domain website kamu
- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` → info dari hosting

### C. File yang PERLU diupload ke server:
```
✅ app/
✅ bootstrap/
✅ config/
✅ database/
✅ public/          ← WAJIB ada di document root
✅ resources/
✅ routes/
✅ storage/
✅ vendor/          ← upload ini ATAU jalankan composer di server
✅ public/build/    ← hasil npm run build
✅ artisan
✅ composer.json
✅ composer.lock

❌ node_modules/    ← JANGAN upload (besar, tidak perlu)
❌ .env             ← Buat manual di server, jangan upload dari lokal
❌ .git/            ← Tidak perlu
```

---

## 2. Cara Deploy ke Shared Hosting (cPanel)

### Langkah 1: Upload File

**Opsi A — File Manager cPanel:**
1. Buka **cPanel → File Manager**
2. Buka folder `public_html` (atau subdomain folder)
3. Upload semua isi project **kecuali** `node_modules`, `.git`, `.env`

**Opsi B — FTP (FileZilla):**
1. Buka FileZilla, masukkan credentials FTP dari hosting
2. Upload ke folder `public_html`

### Langkah 2: Pindahkan isi folder `public/` ke `public_html`

Karena cPanel menggunakan `public_html` sebagai root, kamu perlu:

```
SEBELUM:
public_html/
└── (kosong)

project/
├── app/
├── public/   ← isi folder ini pindahkan ke public_html
└── ...

SESUDAH:
public_html/
├── .htaccess   ← dari public/
├── index.php   ← dari public/
├── build/      ← dari public/
├── images/     ← dari public/
└── ...

sd-doplang/  ← sisa project (di luar public_html)
├── app/
├── config/
└── ...
```

### Langkah 3: Edit `index.php`

Setelah memindahkan `public/index.php` ke `public_html`, edit path-nya:

```php
// Ganti baris ini:
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Menjadi (sesuaikan path ke folder project):
require __DIR__.'/../sd-doplang/vendor/autoload.php';
$app = require_once __DIR__.'/../sd-doplang/bootstrap/app.php';
```

### Langkah 4: Buat Database di cPanel

1. Buka **cPanel → MySQL Databases**
2. Buat database baru (contoh: `username_sddoplang`)
3. Buat user MySQL baru
4. Assign user ke database dengan hak akses **ALL PRIVILEGES**
5. Catat nama DB, username, dan password

### Langkah 5: Upload dan Konfigurasi `.env`

1. Di cPanel File Manager, buka folder project (`sd-doplang/`)
2. Buat file baru bernama `.env`
3. Isi dengan konten dari `.env.production` (yang sudah kamu edit dengan data hosting)

### Langkah 6: Jalankan Perintah via cPanel Terminal

Buka **cPanel → Terminal** lalu masuk ke folder project:

```bash
cd ~/sd-doplang

# Generate APP_KEY jika belum ada
php artisan key:generate

# Jalankan migrasi
php artisan migrate --force

# Jalankan seeder (data awal)
php artisan db:seed

# Buat storage symlink
php artisan storage:link

# Cache config dan routes
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Atau jalankan langsung script otomatis:
```bash
chmod +x deploy.sh
./deploy.sh
```

---

## 3. Cara Deploy ke VPS/Linux

### Prasyarat Server
```bash
# PHP 8.1+
sudo apt install php8.1 php8.1-fpm php8.1-mysql php8.1-mbstring php8.1-xml php8.1-bcmath php8.1-curl php8.1-zip php8.1-gd

# Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Node.js (untuk build aset)
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt-get install -y nodejs

# MySQL
sudo apt install mysql-server
```

### Deploy dengan Git (Rekomendasi)

```bash
# Clone project
git clone https://github.com/username/sd-doplang.git /var/www/sd-doplang
cd /var/www/sd-doplang

# Salin dan isi .env
cp .env.production .env
nano .env  # Isi konfigurasi database dan domain

# Install dependensi
composer install --no-dev --optimize-autoloader

# Build aset
npm ci
npm run build

# Jalankan script deploy
chmod +x deploy.sh
./deploy.sh
```

### Konfigurasi Nginx (Jika Pakai Nginx)

```nginx
server {
    listen 80;
    server_name domain-kamu.com www.domain-kamu.com;
    root /var/www/sd-doplang/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Aktifkan HTTPS dengan Let's Encrypt:
```bash
sudo certbot --nginx -d domain-kamu.com -d www.domain-kamu.com
```

---

## 4. Konfigurasi `.env` Production

Edit file `.env` di server dengan nilai yang tepat:

```env
APP_NAME="SDN Doplang"
APP_ENV=production
APP_KEY=base64:...        # Di-generate otomatis dengan php artisan key:generate
APP_DEBUG=false           # WAJIB false di production!
APP_URL=https://domain-kamu.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=user_database
DB_PASSWORD=password_database

SESSION_SECURE_COOKIE=true   # Aktifkan jika pakai HTTPS
```

> **⚠️ PENTING:** `APP_DEBUG=false` wajib di production untuk keamanan!

---

## 5. Setelah Deploy — Checklist

- [ ] Website dapat dibuka di browser
- [ ] Halaman utama tampil tanpa error
- [ ] Halaman Berita, Galeri, Guru berfungsi
- [ ] Formulir PPDB dapat disubmit
- [ ] Admin Panel `/admin` dapat diakses
- [ ] Login admin berhasil
- [ ] **Password admin sudah diganti** (dari `admin123`)
- [ ] Upload foto guru/galeri di Filament berfungsi
- [ ] SSL/HTTPS aktif dan redirect HTTP → HTTPS berjalan
- [ ] Buka DevTools → tidak ada error di console

### Cara Ganti Password Admin:
1. Login ke `/admin`
2. Klik nama pengguna (pojok kanan atas)
3. Pilih **Edit Profile**
4. Ubah password dan simpan

---

## 6. Troubleshooting

### Error: 500 Internal Server Error
```bash
# Cek error log Laravel
tail -f storage/logs/laravel.log

# Pastikan permission folder benar
chmod -R 755 storage bootstrap/cache
```

### Error: Class not found / autoload issue
```bash
composer dump-autoload
php artisan config:clear
php artisan cache:clear
```

### Halaman kosong / tampilan rusak
```bash
# Rebuild aset Vite
npm run build

# Clear view cache
php artisan view:clear
php artisan view:cache
```

### Storage/gambar tidak tampil
```bash
# Buat ulang symlink
php artisan storage:link
```

### Error: No application encryption key
```bash
php artisan key:generate
php artisan config:cache
```

### Database connection error
- Pastikan `DB_HOST=localhost` (bukan `127.0.0.1`) di cPanel
- Cek username dan password database benar
- Pastikan user database sudah diberi hak akses ALL PRIVILEGES

---

## Kontak & Info

| Info | Detail |
|------|--------|
| **Aplikasi** | Website SDN Doplang |
| **Framework** | Laravel 10 + Filament 3 |
| **PHP** | ^8.1 |
| **Admin Panel** | `/admin` |
| **Admin Email** | admin@sddoplang.sch.id |
| **Timezone** | Asia/Jakarta |
| **Locale** | Indonesia (id) |
