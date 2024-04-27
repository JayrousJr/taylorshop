<?php

namespace App\Filament\Resources\ClothResource\Pages;

use App\Filament\Resources\ClothResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCloth extends EditRecord
{
    protected static string $resource = ClothResource::class;
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
