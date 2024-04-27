<?php

namespace App\Filament\Resources\FabricTypeResource\Pages;

use App\Filament\Resources\FabricTypeResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFabricType extends CreateRecord
{
    protected static string $resource = FabricTypeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Fabric Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Fabric has been created Successifully');
    }
}
