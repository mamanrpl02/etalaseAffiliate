<?php

namespace App\Filament\Resources\SectionSosmedResource\Pages;

use App\Filament\Resources\SectionSosmedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionSosmed extends EditRecord
{
    protected static string $resource = SectionSosmedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
