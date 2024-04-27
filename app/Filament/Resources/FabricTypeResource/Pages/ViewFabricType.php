<?php

namespace App\Filament\Resources\FabricTypeResource\Pages;

use App\Filament\Resources\FabricTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFabricType extends ViewRecord
{
    protected static string $resource = FabricTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
