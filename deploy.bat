@echo off
REM ============================================================
REM  DEPLOY SCRIPT - SDN Doplang (Laravel 10)
REM  Untuk: Windows (jika upload manual via FTP)
REM  Jalankan di Command Prompt dari folder project
REM ============================================================

echo.
echo ╔══════════════════════════════════════════════╗
echo ║   DEPLOYMENT SDN DOPLANG - Laravel 10        ║
echo ╚══════════════════════════════════════════════╝
echo.

REM ── Cek .env ─────────────────────────────────────────────
if not exist ".env" (
    echo [ERROR] File .env tidak ditemukan!
    echo         Salin .env.production ke .env dan isi konfigurasinya.
    pause
    exit /b 1
)

echo [OK] File .env ditemukan
echo.

REM ── 1. Install Composer ───────────────────────────────────
echo [1/8] Menginstall dependensi Composer production...
call composer install --no-dev --optimize-autoloader --no-interaction
if %errorlevel% neq 0 (
    echo [ERROR] Composer install gagal!
    pause
    exit /b 1
)
echo     OK - Composer selesai
echo.

REM ── 2. Build aset Vite ────────────────────────────────────
echo [2/8] Build aset Vite...
if exist "package.json" (
    call npm ci
    call npm run build
    echo     OK - Aset di-build ke /public/build
) else (
    echo     SKIP - package.json tidak ditemukan
)
echo.

REM ── 3. Cache config ───────────────────────────────────────
echo [3/8] Cache konfigurasi Laravel...
call php artisan config:clear
call php artisan config:cache
echo     OK - Config cached
echo.

REM ── 4. Cache routes ───────────────────────────────────────
echo [4/8] Cache routes...
call php artisan route:clear
call php artisan route:cache
echo     OK - Routes cached
echo.

REM ── 5. Cache views ────────────────────────────────────────
echo [5/8] Cache views...
call php artisan view:clear
call php artisan view:cache
echo     OK - Views cached
echo.

REM ── 6. Migrasi database ───────────────────────────────────
echo [6/8] Menjalankan migrasi database...
call php artisan migrate --force
if %errorlevel% neq 0 (
    echo [WARNING] Migrasi mungkin ada error, cek manual!
) else (
    echo     OK - Migrasi selesai
)
echo.

REM ── 7. Storage link ───────────────────────────────────────
echo [7/8] Membuat storage symlink...
call php artisan storage:link
echo     OK - Storage link dibuat
echo.

REM ── 8. Optimize ───────────────────────────────────────────
echo [8/8] Optimasi Laravel...
call php artisan optimize
echo     OK - Optimasi selesai
echo.

REM ── Selesai ───────────────────────────────────────────────
echo ╔══════════════════════════════════════════════╗
echo ║   DEPLOYMENT BERHASIL!                       ║
echo ╚══════════════════════════════════════════════╝
echo.
echo PENTING - Langkah setelah deploy:
echo   1. Buka website dan pastikan berjalan normal
echo   2. Login admin: /admin
echo      Email    : admin@sddoplang.sch.id
echo      Password : admin123  ^<-- SEGERA GANTI!
echo.
pause
