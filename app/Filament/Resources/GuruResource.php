<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Data Guru';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nip')
                    ->label('NIP/NUPTK')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('guru')
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP/NUPTK')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable()
                    ->sortable(),
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
                    ->successNotificationTitle('Data Guru berhasil diperbarui'),
                Tables\Actions\Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-m-trash')
                    ->color('danger')
                    ->button()
                    ->requiresConfirmation(false)
                    ->modalHidden(true)
                    ->action(fn ($record) => $record->delete())
                    ->successNotificationTitle('Data Guru berhasil dihapus')
                    ->extraAttributes([
                        'onclick' => 'return confirmDeleteAction(this, "Hapus Data Guru", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
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
                        ->successNotificationTitle('Data guru terpilih berhasil dihapus')
                        ->extraAttributes([
                            'onclick' => 'return confirmDeleteAction(this, "Hapus yang dipilih", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
                        ]),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
