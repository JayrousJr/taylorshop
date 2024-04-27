<?php

namespace App\Filament\Resources\FabricTypeResource\Pages;

use App\Filament\Resources\FabricTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFabricTypes extends ListRecords
{
    protected static string $resource = FabricTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
