<?php

namespace App\Filament\Resources\ClothResource\Pages;

use App\Filament\Resources\ClothResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCloth extends CreateRecord
{
    protected static string $resource = ClothResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Cloth Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Cloth has been created Successifully');
    }
}
