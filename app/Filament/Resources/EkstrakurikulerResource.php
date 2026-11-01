<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EkstrakurikulerResource\Pages;
use App\Models\Ekstrakurikuler;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EkstrakurikulerResource extends Resource
{
    protected static ?string $model = Ekstrakurikuler::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    
    protected static ?string $navigationLabel = 'Ekstrakurikuler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('icon')
                    ->maxLength(255)
                    ->placeholder('fas fa-star'),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('ekstrakurikuler')
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->rounded(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->button()
                    ->color('primary')
                    ->successNotificationTitle('Ekstrakurikuler berhasil diperbarui'),
                Tables\Actions\Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-m-trash')
                    ->color('danger')
                    ->button()
                    ->requiresConfirmation(false)
                    ->modalHidden(true)
                    ->action(fn ($record) => $record->delete())
                    ->successNotificationTitle('Ekstrakurikuler berhasil dihapus')
                    ->extraAttributes([
                        'onclick' => 'return confirmDeleteAction(this, "Hapus Ekstrakurikuler", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
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
                        ->successNotificationTitle('Ekstrakurikuler terpilih berhasil dihapus')
                        ->extraAttributes([
                            'onclick' => 'return confirmDeleteAction(this, "Hapus yang dipilih", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
                        ]),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEkstrakurikulers::route('/'),
            'create' => Pages\CreateEkstrakurikuler::route('/create'),
            'edit' => Pages\EditEkstrakurikuler::route('/{record}/edit'),
        ];
    }
}
