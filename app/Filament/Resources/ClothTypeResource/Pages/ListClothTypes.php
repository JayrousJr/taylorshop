<?php

namespace App\Filament\Resources\ClothTypeResource\Pages;

use App\Filament\Resources\ClothTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClothTypes extends ListRecords
{
    protected static string $resource = ClothTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
