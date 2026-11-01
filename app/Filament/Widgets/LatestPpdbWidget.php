<?php

namespace App\Filament\Widgets;

use App\Models\Ppdb;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPpdbWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Pendaftar PPDB Terbaru';

    public static function canView(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Ppdb::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Calon Siswa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->label('L/P')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'L' => 'info',
                        'P' => 'success',
                    }),
                Tables\Columns\TextColumn::make('asal_sekolah')
                    ->label('TK Asal'),
                Tables\Columns\TextColumn::make('nama_wali')
                    ->label('Nama Wali'),
                Tables\Columns\TextColumn::make('no_wa')
                    ->label('No. WA'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
