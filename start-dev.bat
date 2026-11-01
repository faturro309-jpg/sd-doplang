@echo on
echo Memulai Lingkungan Pengembangan Bengkel Pak Tris...

:: Jalankan Server Laravel di jendela baru
start "Server Laravel" cmd /k "php artisan serve"

:: Jalankan Server Vite di jendela baru
start "Server Vite" cmd /k "npm run dev"

:: Tunggu sebentar (opsional, menggunakan ping karena timeout bermasalah di beberapa terminal)
ping -n 3 127.0.0.1 >nul

:: Buka browser otomatis
echo Membuka website di browser...
start http://127.0.0.1:8000

echo Server sedang dijalankan di jendela baru. Jangan tutup jendela tersebut.
pause
