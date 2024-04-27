<?php

namespace App\Filament\Resources\ClothTypeResource\Pages;

use App\Filament\Resources\ClothTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClothType extends EditRecord
{
    protected static string $resource = ClothTypeResource::class;
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
