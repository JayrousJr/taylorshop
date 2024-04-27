<?php

namespace App\Filament\Resources\ClothTypeResource\Pages;

use App\Filament\Resources\ClothTypeResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateClothType extends CreateRecord
{
    protected static string $resource = ClothTypeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Clothes Type Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Cloth Type has been created Successifully');
    }
}
