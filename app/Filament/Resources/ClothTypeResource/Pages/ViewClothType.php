<?php

namespace App\Filament\Resources\ClothTypeResource\Pages;

use App\Filament\Resources\ClothTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClothType extends ViewRecord
{
    protected static string $resource = ClothTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
