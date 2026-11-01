<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbResource\Pages;
use App\Models\Ppdb;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    
    protected static ?string $navigationLabel = 'Pendaftar Baru (PPDB)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Calon Siswa')
                    ->schema([
                        Forms\Components\TextInput::make('nama_lengkap')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nisn')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),
                        Forms\Components\TextInput::make('tempat_lahir')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->required(),
                        Forms\Components\Select::make('jenis_kelamin')
                            ->options([
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('agama')
                            ->required(),
                        Forms\Components\Textarea::make('alamat_lengkap')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('asal_sekolah'),
                    ])->columns(2),
                Forms\Components\Section::make('Data Orang Tua')
                    ->schema([
                        Forms\Components\TextInput::make('nama_ayah')
                            ->required(),
                        Forms\Components\TextInput::make('nama_ibu')
                            ->required(),
                        Forms\Components\TextInput::make('pekerjaan_ayah'),
                        Forms\Components\TextInput::make('pekerjaan_ibu'),
                        Forms\Components\TextInput::make('no_hp_ortu')
                            ->tel()
                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('Status Pendaftaran')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'diproses' => 'Diproses',
                                'diterima' => 'Diterima',
                                'ditolak' => 'Ditolak',
                            ])
                            ->required()
                            ->default('pending'),
                    ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Calon Siswa')
                    ->schema([
                        Infolists\Components\TextEntry::make('nama_lengkap')
                            ->weight('bold')
                            ->size('lg'),
                        Infolists\Components\TextEntry::make('nisn')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('tempat_lahir'),
                        Infolists\Components\TextEntry::make('tanggal_lahir')
                            ->date(),
                        Infolists\Components\TextEntry::make('jenis_kelamin'),
                        Infolists\Components\TextEntry::make('agama'),
                        Infolists\Components\TextEntry::make('alamat_lengkap')
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('asal_sekolah'),
                    ])->columns(2),
                Infolists\Components\Section::make('Informasi Orang Tua')
                    ->schema([
                        Infolists\Components\TextEntry::make('nama_ayah'),
                        Infolists\Components\TextEntry::make('nama_ibu'),
                        Infolists\Components\TextEntry::make('pekerjaan_ayah'),
                        Infolists\Components\TextEntry::make('pekerjaan_ibu'),
                        Infolists\Components\TextEntry::make('no_hp_ortu')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'diproses' => 'info',
                                'diterima' => 'success',
                                'ditolak' => 'danger',
                                default => 'gray',
                            }),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Waktu Pendaftaran')
                            ->dateTime(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('no_hp_ortu')
                    ->label('HP Ortu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'diproses' => 'info',
                        'diterima' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tgl Daftar')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->button()
                    ->color('primary')
                    ->successNotificationTitle('Data berhasil diperbarui'),
                Tables\Actions\Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-m-trash')
                    ->color('danger')
                    ->button()
                    ->requiresConfirmation(false)
                    ->modalHidden(true)
                    ->action(fn ($record) => $record->delete())
                    ->successNotificationTitle('Data pendaftar berhasil dihapus')
                    ->extraAttributes([
                        'onclick' => 'return confirmDeleteAction(this, "Hapus Data Pendaftar", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('delete')
                        ->label('Hapus yang dipilih')
                        ->icon('heroicon-m-trash')
                        ->color('danger')
                        ->requiresConfirmation(false)
                        ->modalHidden(true)
                        ->deselectRecordsAfterCompletion()
                        ->action(fn (\Illuminate\Database\Eloquent\Collection $records) => $records->each->delete())
                        ->successNotificationTitle('Data pendaftar terpilih berhasil dihapus')
                        ->extraAttributes([
                            'onclick' => 'return confirmDeleteAction(this, "Hapus yang dipilih", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
                        ]),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPpdbs::route('/'),
            'create' => Pages\CreatePpdb::route('/create'),
            'edit' => Pages\EditPpdb::route('/{record}/edit'),
        ];
    }
}
