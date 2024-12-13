<?php

namespace App\Filament\Resources\SectionProdukResource\Pages;

use App\Filament\Resources\SectionProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectionProduks extends ListRecords
{
    protected static string $resource = SectionProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
