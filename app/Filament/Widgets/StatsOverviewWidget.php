<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Ppdb;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Pendaftar PPDB', Ppdb::count())
                ->description('Pendaftar calon siswa baru')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
                
            Stat::make('Total Guru & Staf', Guru::count())
                ->description('Tenaga pendidik aktif')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success'),
                
            Stat::make('Artikel Berita', Berita::count())
                ->description('Berita & Informasi dipublikasikan')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),
        ];
    }
}
