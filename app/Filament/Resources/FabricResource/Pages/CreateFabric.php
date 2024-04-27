<?php

namespace App\Filament\Resources\FabricResource\Pages;

use App\Filament\Resources\FabricResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFabric extends CreateRecord
{
    protected static string $resource = FabricResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Fabric Type Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Fabric Type has been created Successifully');
    }
}
