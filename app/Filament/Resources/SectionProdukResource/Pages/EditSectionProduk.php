<?php

namespace App\Filament\Resources\SectionProdukResource\Pages;

use App\Filament\Resources\SectionProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionProduk extends EditRecord
{
    protected static string $resource = SectionProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
