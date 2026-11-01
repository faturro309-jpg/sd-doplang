<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    
    protected static ?string $navigationLabel = 'Berita & Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(Berita::class, 'slug', ignoreRecord: true),
                Forms\Components\RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('berita')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Draft' => 'Draft',
                        'Published' => 'Published',
                    ])
                    ->required()
                    ->default('Draft'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->rounded(),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'Draft',
                        'success' => 'Published',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Draft' => 'Draft',
                        'Published' => 'Published',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->button()
                    ->color('primary')
                    ->successNotificationTitle('Berita berhasil diperbarui'),
                Tables\Actions\Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-m-trash')
                    ->color('danger')
                    ->button()
                    ->requiresConfirmation(false)
                    ->modalHidden(true)
                    ->action(fn ($record) => $record->delete())
                    ->successNotificationTitle('Berita berhasil dihapus')
                    ->extraAttributes([
                        'onclick' => 'return confirmDeleteAction(this, "Hapus Berita", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
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
                        ->successNotificationTitle('Berita terpilih berhasil dihapus')
                        ->extraAttributes([
                            'onclick' => 'return confirmDeleteAction(this, "Hapus yang dipilih", "Apakah Anda yakin ingin melakukan ini?", "Konfirmasi")',
                        ]),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
