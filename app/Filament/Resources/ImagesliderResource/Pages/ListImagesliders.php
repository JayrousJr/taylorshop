<?php

namespace App\Filament\Resources\ImagesliderResource\Pages;

use App\Filament\Resources\ImagesliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImagesliders extends ListRecords
{
    protected static string $resource = ImagesliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
