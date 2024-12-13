<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;
    protected static ?string $modelLabel = 'Kelola Produk';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nomor')
                    ->label('Nomor Produk')
                    ->required()
                    ->numeric()
                    ->maxLength(100),
                TextInput::make('judul')
                    ->label('Judul Produk')
                    ->required()
                    ->maxLength(100),
                TextInput::make('hargaCoret')
                    ->label('Harga Coret Produk')
                    ->required()
                    ->numeric()
                    ->maxLength(100),
                TextInput::make('harga')
                    ->label('Harga Produk')
                    ->required()
                    ->numeric()
                    ->maxLength(100),
                TextInput::make('terjual')
                    ->label('Produk Terjual')
                    ->numeric()
                    ->required()
                    ->maxLength(100),
                TextInput::make('link')
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label('Link')
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
                TextColumn::make('harga')->label('Harga Produk')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('terjual')->label('Produk Terjual'),
                TextColumn::make('link')->label('Link Produk')
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
