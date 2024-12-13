<?php

namespace App\Filament\Resources\SectionPromoResource\Pages;

use App\Filament\Resources\SectionPromoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectionPromos extends ListRecords
{
    protected static string $resource = SectionPromoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
