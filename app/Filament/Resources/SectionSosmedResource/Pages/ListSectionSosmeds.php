<?php

namespace App\Filament\Resources\SectionSosmedResource\Pages;

use App\Filament\Resources\SectionSosmedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectionSosmeds extends ListRecords
{
    protected static string $resource = SectionSosmedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
