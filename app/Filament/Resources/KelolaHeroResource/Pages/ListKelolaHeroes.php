<?php

namespace App\Filament\Resources\KelolaHeroResource\Pages;

use App\Filament\Resources\KelolaHeroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelolaHeroes extends ListRecords
{
    protected static string $resource = KelolaHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
