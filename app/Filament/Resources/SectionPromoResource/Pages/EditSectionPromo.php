<?php

namespace App\Filament\Resources\SectionPromoResource\Pages;

use App\Filament\Resources\SectionPromoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionPromo extends EditRecord
{
    protected static string $resource = SectionPromoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
