<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\KelolaHero;
use Filament\Tables\Table;
use App\Models\Herosection;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KelolaHeroResource\Pages;
use App\Filament\Resources\KelolaHeroResource\RelationManagers;

class KelolaHeroResource extends Resource
{
    protected static ?string $model = Herosection::class;

    protected static ?string $navigationGroup = 'Kelola Header'; // Nama grup navigasi
    protected static ?int $navigationSort = 1; // Urutan dalam grup
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul (H1)')
                    ->required()
                    ->maxLength(100),
                    TextInput::make('keterangan')
                    ->label('Keterangan (p)')
                    ->maxLength(100)
                    ->required(),
                    TextInput::make('textButton')
                    ->label('Text Didalam Button')
                    ->maxLength(100)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul'),
                TextColumn::make('keterangan')->label('Keterangan')->limit(50),
                TextColumn::make('textButton')->label('Text Button')->limit(50),
                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->action(function ($record) {
                        // Set semua record lain menjadi tidak aktif
                        \App\Models\Herosection::query()->update(['is_active' => false]);

                        // Aktifkan record yang dipilih
                        $record->update(['is_active' => true]);
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListKelolaHeroes::route('/'),
            'create' => Pages\CreateKelolaHero::route('/create'),
            'edit' => Pages\EditKelolaHero::route('/{record}/edit'),
        ];
    }
}
