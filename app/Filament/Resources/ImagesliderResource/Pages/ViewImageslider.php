<?php

namespace App\Filament\Resources\ImagesliderResource\Pages;

use App\Filament\Resources\ImagesliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImageslider extends ViewRecord
{
    protected static string $resource = ImagesliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
