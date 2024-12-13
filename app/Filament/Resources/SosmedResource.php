<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sosmed;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\SosmedResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SosmedResource\RelationManagers;

class SosmedResource extends Resource
{
    protected static ?string $model = Sosmed::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),
                TextInput::make('tujuan')
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label('Link Sosmed')
                    ->required(),
                ColorPicker::make('warnaText')
                    ->label('Warna Text')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('tujuan'),
                // ->url(fn (Sosmed $record): string => route('index', ['post' => $record->id])), // Pastikan mengirimkan ID
                ColorColumn::make('warnaText')->label('Warna Text'),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Edit
                Tables\Actions\DeleteAction::make(), // Hapus
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Hapus massal
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSosmeds::route('/'),
            'create' => Pages\CreateSosmed::route('/create'),
            'edit' => Pages\EditSosmed::route('/{record}/edit'),
        ];
    }
}
