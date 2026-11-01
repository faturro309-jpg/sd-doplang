<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationLabel = 'Galeri Foto & Video';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('kategori')
                    ->options([
                        'Foto' => 'Foto',
                        'Video' => 'Video',
                    ])
                    ->required()
                    ->reactive(),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('galeri')
                    ->visible(fn (callable $get) => $get('kategori') === 'Foto')
                    ->required(fn (callable $get) => $get('kategori') === 'Foto'),
                Forms\Components\TextInput::make('link_video')
                    ->url()
                    ->placeholder('https://www.youtube.com/watch?v=...')
                    ->visible(fn (callable $get) => $get('kategori') === 'Video')
                    ->required(fn (callable $get) => $get('kategori') === 'Video'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->rounded()
                    ->visible(fn ($record) => $record && $record->kategori === 'Foto'),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('kategori')
                    ->colors([
                        'primary' => 'Foto',
                        'success' => 'Video',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'Foto' => 'Foto',
                        'Video' => 'Video',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->button()
                    ->color('primary')
                    ->successNotificationTitle('Galeri berhasil diperbarui'),
                Tables\Actions\Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-m-trash')
                    ->color('danger')
                    ->button()
                    ->requiresConfirmation(false)
                    ->modalHidden(true)
                    ->action(fn ($record) => $record->delete())
                    ->successNotificationTitle('Galeri berhasil dihapus')
                    ->extraAttributes([
                        'onclick' => 'return confirmDeleteAction(this, "Hapus Galeri", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
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
                        ->successNotificationTitle('Data galeri terpilih berhasil dihapus')
                        ->extraAttributes([
                            'onclick' => 'return confirmDeleteAction(this, "Hapus yang dipilih", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
                        ]),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
