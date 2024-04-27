<?php

namespace App\Filament\Resources\FabricResource\Pages;

use App\Filament\Resources\FabricResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFabric extends ViewRecord
{
    protected static string $resource = FabricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
