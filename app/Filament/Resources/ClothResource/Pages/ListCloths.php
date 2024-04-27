<?php

namespace App\Filament\Resources\ClothResource\Pages;

use App\Filament\Resources\ClothResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCloths extends ListRecords
{
    protected static string $resource = ClothResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
