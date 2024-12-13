<?php

namespace App\Filament\Resources\KelolaHeroResource\Pages;

use App\Filament\Resources\KelolaHeroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelolaHero extends EditRecord
{
    protected static string $resource = KelolaHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
