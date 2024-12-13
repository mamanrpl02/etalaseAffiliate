<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Promo;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\PromoResource\Pages;
use App\Filament\Resources\PromoResource\RelationManagers;


class PromoResource extends Resource
{
    protected static ?string $model = Promo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Produk')
                    ->required()
                    ->maxLength(100),
                TextInput::make('hargaCoret')
                    ->label('Harga Coret')
                    ->required()
                    ->numeric()
                    ->maxLength(100),
                TextInput::make('harga')
                    ->label('Harga Produk')
                    ->required()
                    ->numeric()
                    ->maxLength(100),
                TextInput::make('slot')
                    ->label('Slot Produk')
                    ->required()
                    ->numeric()
                    ->maxLength(100),
                TextInput::make('link')
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label('Link')
                    ->required(),
                FileUpload::make('image')
                    ->image() // Hanya menerima file gambar
                    ->directory('uploads/promo') // Lokasi penyimpanan di `storage/app/public`
                    ->label('Gambar Produk')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul'),
                TextColumn::make('hargaCoret')->label('Harga Coret')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('slot')->label('Slot Produk'),
                ImageColumn::make('image')
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromos::route('/'),
            'create' => Pages\CreatePromo::route('/create'),
            'edit' => Pages\EditPromo::route('/{record}/edit'),
        ];
    }
}
