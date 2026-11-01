#!/bin/bash
# ============================================================
# DEPLOY SCRIPT - SDN Doplang (Laravel 10)
# Untuk: Linux VPS / cPanel Terminal / SSH
# ============================================================
# CARA PAKAI:
#   chmod +x deploy.sh
#   ./deploy.sh
# ============================================================

set -e  # Hentikan jika ada error

echo ""
echo "╔══════════════════════════════════════════════╗"
echo "║   DEPLOYMENT SDN DOPLANG - Laravel 10        ║"
echo "╚══════════════════════════════════════════════╝"
echo ""

# ── Cek apakah .env ada ──────────────────────────────────
if [ ! -f ".env" ]; then
    echo "❌ ERROR: File .env tidak ditemukan!"
    echo "   Salin .env.production ke .env dan isi konfigurasinya."
    exit 1
fi

echo "✅ File .env ditemukan"
echo ""

# ── 1. Install dependensi PHP (production only) ──────────
echo "📦 [1/8] Menginstall dependensi Composer (production)..."
composer install --no-dev --optimize-autoloader --no-interaction
echo "   ✓ Composer selesai"
echo ""

# ── 2. Build aset frontend ───────────────────────────────
echo "🎨 [2/8] Build aset Vite (npm run build)..."
if [ -f "package.json" ]; then
    npm ci --production=false
    npm run build
    echo "   ✓ Aset berhasil di-build ke /public/build"
else
    echo "   ⚠️  package.json tidak ditemukan, skip build aset"
fi
echo ""

# ── 3. Set permission folder ─────────────────────────────
echo "🔐 [3/8] Mengatur permission folder..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
echo "   ✓ Permission storage & bootstrap/cache OK"
echo ""

# ── 4. Cache konfigurasi Laravel ─────────────────────────
echo "⚡ [4/8] Cache konfigurasi Laravel..."
php artisan config:clear
php artisan config:cache
echo "   ✓ Config cached"
echo ""

# ── 5. Cache routes ──────────────────────────────────────
echo "🛣️  [5/8] Cache routes..."
php artisan route:clear
php artisan route:cache
echo "   ✓ Routes cached"
echo ""

# ── 6. Cache views ───────────────────────────────────────
echo "🖼️  [6/8] Cache views (Blade templates)..."
php artisan view:clear
php artisan view:cache
echo "   ✓ Views cached"
echo ""

# ── 7. Jalankan migrasi database ─────────────────────────
echo "🗄️  [7/8] Menjalankan migrasi database..."
php artisan migrate --force
echo "   ✓ Migrasi selesai"
echo ""

# ── 8. Storage symlink ───────────────────────────────────
echo "🔗 [8/8] Membuat storage symlink..."
php artisan storage:link
echo "   ✓ Storage link dibuat di /public/storage"
echo ""

# ── Selesai ──────────────────────────────────────────────
echo "╔══════════════════════════════════════════════╗"
echo "║   ✅ DEPLOYMENT BERHASIL!                     ║"
echo "╚══════════════════════════════════════════════╝"
echo ""
echo "📌 Langkah selanjutnya:"
echo "   1. Buka browser dan cek website berjalan normal"
echo "   2. Login ke Admin Panel: /admin"
echo "      Email   : admin@sddoplang.sch.id"
echo "      Password: admin123  ← SEGERA GANTI!"
echo "   3. Ubah password admin melalui panel Filament"
echo ""
