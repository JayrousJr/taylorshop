<?php

namespace App\Filament\Resources\ImagesliderResource\Pages;

use App\Filament\Resources\ImagesliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageslider extends EditRecord
{
    protected static string $resource = ImagesliderResource::class;
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
