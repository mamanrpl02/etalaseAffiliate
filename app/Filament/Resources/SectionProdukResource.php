<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SectionPromo;
use App\Models\SectionProduk;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SectionProdukResource\Pages;
use App\Filament\Resources\SectionProdukResource\RelationManagers;

class SectionProdukResource extends Resource
{
    protected static ?string $model = SectionProduk::class;
    
    protected static ?string $navigationGroup = 'Kelola Header'; // Nama grup navigasi

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                ->label('Judul (H1)')
                ->required()
                ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('judul')->label('Judul'),
            ToggleColumn::make('is_active')
                ->label('Active')
                ->action(function ($record) {
                    // Set semua record lain menjadi tidak aktif
                    \App\Models\SectionProduk::query()->update(['is_active' => false]);

                    // Aktifkan record yang dipilih
                    $record->update(['is_active' => true]);
                }),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSectionProduks::route('/'),
            'create' => Pages\CreateSectionProduk::route('/create'),
            'edit' => Pages\EditSectionProduk::route('/{record}/edit'),
        ];
    }
}
