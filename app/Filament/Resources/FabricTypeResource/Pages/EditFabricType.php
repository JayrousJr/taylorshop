<?php

namespace App\Filament\Resources\FabricTypeResource\Pages;

use App\Filament\Resources\FabricTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFabricType extends EditRecord
{
    protected static string $resource = FabricTypeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
